<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
// get data from
$id = FILTER_INPUT(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if($loggedInUserRole =="admin"){
    // echo $loggedInUserRole;
    if(isset($_POST["teacher_edit"])) {
        // get field value from form
        $submittedId = FILTER_INPUT(INPUT_POST, 'submittedId', FILTER_SANITIZE_STRING);
        $name = FILTER_INPUT(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = FILTER_INPUT(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $designation = FILTER_INPUT(INPUT_POST, 'designation', FILTER_SANITIZE_STRING);

        // null check
        if (
            $submittedId !== null && $submittedId !== "" &&
            $name !== null && $name !== "" &&
            $email !== null && $email !== "" &&
            $phone !== null && $phone !== "" &&
            $designation !== null && $designation !== ""
        
        ) {

            $sql = "update teacher set name=? , email=? , phone=?, designation=? where id=?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            
            $params = [$name , $email, $phone, $designation, $submittedId ];
            // print_r($params);
            $result = $stmt->execute($params);
            // print_r($result);
            // if($result->)
            echo "<script> window.location.href='teacher_list.php'</script>";
        
        }       

    }

// get story details
$sql = "select * from teacher where id = ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$id];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    // if query return any row
    while ($row = $stmt->fetch()) {
        $r_id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $designation = $row['designation'];
 
?>

<link rel="stylesheet" href="css/add_page_style.css">



    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit Teacher</h3>
                        <form name="teacher_edit" action="teacher_edit.php" method="post" >
                            <input type="hidden" id="submittedId" name="submittedId" class="form-control" required value="<?php echo $r_id; ?>" >    
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input id="name" name="name" class="form-control" type="text" required value="<?php echo $name; ?>">
                                <span id="error_name" class="text-danger"></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input id="email" name="email" class="form-control" type="email" required value="<?php echo $email; ?>">
                                <span id="error_email" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="text" id="phone" name="phone" class="form-control" required value="<?php echo $phone; ?>">
                                <span id="error_phone" class="text-danger"></span>
                            </div>              
                            <div class="form-group">
                                <label for="designation">Designation *</label>
                                <input type="text" id="designation" name="designation" class="form-control" required value="<?php echo $designation; ?>">
                                <span id="error_designation" class="text-danger"></span>
                            </div>  
                            <button type="submit" class="btn btn-primary btn-block" name="teacher_edit" id="teacher_edit">Save</button>
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
    }
    }
}
?>