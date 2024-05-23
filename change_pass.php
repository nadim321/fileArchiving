<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
// get data from
    // echo $loggedInUserRole;
    if(isset($_POST["change_pass"])) {
        // get field value from form
        $old_pass = FILTER_INPUT(INPUT_POST, 'old_pass', FILTER_SANITIZE_STRING);
        $new_pass = FILTER_INPUT(INPUT_POST, 'new_pass', FILTER_SANITIZE_STRING);
        $confirm_pass = FILTER_INPUT(INPUT_POST, 'confirm_pass', FILTER_SANITIZE_STRING);

        // null check
        if (
            $old_pass !== null && $old_pass !== "" &&
            $new_pass !== null && $new_pass !== "" &&
            $confirm_pass !== null && $confirm_pass !== ""
        
        ) {

            if($new_pass != $confirm_pass ){
                echo "<div style='color:white'>New password and confirmed password does not match</div>";
            }else{
                $sql = "select password from user where username = ?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$loggedInUser];
//           print_r($params);
            $result = $stmt->execute($params);
            if ($stmt->rowCount()) {
                // if query return any row
                while ($row = $stmt->fetch()) {
                    $hashPassword = $row['password'];
                    if(password_verify($old_pass, $hashPassword)){
                        $sql = "update user set password=? where username = ?";
                        $stmt = $dbh->prepare($sql);
                        // set value to query
                        $params = [password_hash($new_pass, PASSWORD_BCRYPT) , $loggedInUser ];
            //           print_r($params);
                        $result = $stmt->execute($params);

                        session_start();
                        session_destroy();
                        echo "<script> window.location.href='login.php'</script>";

                    }else{
                        echo "<div style='color:white'>Given old password does not match</div>";
                    }
                }
            }        
        }
        
     
    }

    }
?>

<link rel="stylesheet" href="css/add_page_style.css">



    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit User</h3>
                        <form name="change_pass" method="post" >
                            
                            <div class="form-group">
                                <label for="old_pass">Old Password *</label>
                                <input id="old_pass" name="old_pass" class="form-control" type="password" required >
                                <span id="error_old_pass" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="new_pass">New Password *</label>
                                <input id="new_pass" name="new_pass" class="form-control" type="password" required >
                                <span id="error_new_pass" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="confirm_pass">Confirm Password *</label>
                                <input id="confirm_pass" name="confirm_pass" class="form-control" type="password" required >
                                <span id="error_confirm_pass" class="text-danger"></span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="change_pass" id="change_pass">Submit</button>
                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
