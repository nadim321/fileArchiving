<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
// get data from
$username = FILTER_INPUT(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

if($loggedInUserRole =="admin"){
    // echo $loggedInUserRole;
    if(isset($_POST["user_edit"])) {
        // get field value from form
        $submittedUsername = FILTER_INPUT(INPUT_POST, 'submittedUsername', FILTER_SANITIZE_STRING);
        $first_name = FILTER_INPUT(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = FILTER_INPUT(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = FILTER_INPUT(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $role = FILTER_INPUT(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

        // null check
        if (
            $first_name !== null && $first_name !== "" &&
            $last_name !== null && $last_name !== "" &&
            $email !== null && $email !== "" &&
            $phone !== null && $phone !== "" &&
            $role !== null && $role !== ""
        
        ) {

            $sql = "update user set firstName=? , lastName=? , email=? , phone=?, role=? where username = ?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$first_name, $last_name , $email, $phone, $role, $submittedUsername ];
//           print_r($params);
            $result = $stmt->execute($params);
            // print_r( $result);
            // if($result->)

            header("location:user_list.php");
        
        }
        
     
        

    }

// get story details
$sql = "select * from user where username = ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$username];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    // if query return any row
    while ($row = $stmt->fetch()) {
        $username = $row['username'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $phone = $row['phone'];
        $role = $row['role'];
        $profile_pic = $row["profile_pic"];
 
?>

<link rel="stylesheet" href="css/add_page_style.css">



    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit User</h3>
                        <form name="user_edit" action="user_edit.php" method="post" >
                            <input type="hidden" id="submittedUsername" name="submittedUsername" class="form-control" required value="<?php echo $username; ?>" >    
                            <div class="form-group">
                                <label for="first_name">First Name *</label>
                                <input id="first_name" name="first_name" class="form-control" type="text" required value="<?php echo $firstName; ?>">
                                <span id="error_first_name" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name *</label>
                                <input id="last_name" name="last_name" class="form-control" type="text" required value="<?php echo $lastName; ?>">
                                <span id="error_last_name" class="text-danger"></span>
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
                                <label for="role">Role *</label>
                                    <select id="role" name="role">
                                        <option value="user" <?php if($role=="user"){ echo "selected";} ?>>User</option>
                                        <option value="admin"<?php if($role=="admin"){ echo "selected";} ?>>Admin</option>
                                    </select>
                                <span id="error_role" class="text-danger"></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="user_edit" id="user_edit">Save</button>
                    
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