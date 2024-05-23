<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
// get data from
$id = FILTER_INPUT(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if($loggedInUserRole =="admin"){
    // echo $loggedInUserRole;
    if(isset($_POST["caegory_edit"])) {
        // get field value from form
        $submittedId = FILTER_INPUT(INPUT_POST, 'submittedId', FILTER_SANITIZE_STRING);
        $name = FILTER_INPUT(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

        // null check
        if (
            $submittedId !== null && $submittedId !== "" &&
            $name !== null && $name !== "" 
        
        ) {

            $sql = "update category set name=? where id=?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            
            $params = [$name , $submittedId ];
            // print_r($params);
            $result = $stmt->execute($params);
            // print_r($result);
            // if($result->)
            echo "<script> window.location.href='category_list.php'</script>";
        
        }       

    }

// get story details
$sql = "select * from category where id = ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$id];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    // if query return any row
    while ($row = $stmt->fetch()) {
        $r_id = $row['id'];
        $name = $row['name'];
 
?>

<link rel="stylesheet" href="css/add_page_style.css">



    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit Category</h3>
                        <form name="category_edit" action="category_edit.php" method="post" >
                            <input type="hidden" id="submittedId" name="submittedId" class="form-control" required value="<?php echo $r_id; ?>" >    
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input id="name" name="name" class="form-control" type="text" required value="<?php echo $name; ?>">
                                <span id="error_name" class="text-danger"></span>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block" name="category_edit" id="category_edit">Save</button>
                    
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