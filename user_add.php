<?php
include "menu.php";
include 'connect.php';
include "user.php";

// logged in user name
    $loggedInUser = $_SESSION["username"];
    $role = $_SESSION["role"];
        // create table for show all data
        
    if(isset($_POST['user_add'])) {
        // get field value from form
        $first_name = FILTER_INPUT(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = FILTER_INPUT(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = FILTER_INPUT(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $username = FILTER_INPUT(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $target_tmp = $_FILES["fileToUpload"]["tmp_name"];
        $role = FILTER_INPUT(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        
        $paramsok = false;
        // null check
        if (
            $first_name !== null && $first_name !== "" &&
            $last_name !== null && $last_name !== "" &&
            $email !== null && $email !== "" &&
            $phone !== null && $phone !== "" &&
            $username !== null && $username !== "" &&
            $password !== null && $password !== "" &&
            $role !== null && $role !== ""
        
        ) {
            // password hash using password bcrypt
            $pwd = password_hash($password, PASSWORD_BCRYPT);
        
            // user profile picture upload
            $target_dir = "profile_pic/";
            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_file = $target_dir . $newfilename;
            $target_Path = "profile_pic/" . $newfilename;
            $uploadOk = 1;
        
        
        // Check if image file is a actual image or fake image
            if (file_exists($target_file)) {
                echo "Sorry, file already exists<br>";
                $uploadOk = 0;
            }
            // check image file size
            if ($_FILES["fileToUpload"]["size"] > 50000000) {
                echo "File size exceeded<br>";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded<br>";
            } else {
                if (move_uploaded_file($target_tmp, $target_file)) {
                    // prepare query for insert data
                    $paramsok = true;
                    $sql = "INSERT into user (firstName,lastName,email,phone,username,password,profile_pic,role) VALUES (?,?,?,?,?,?,?,?)";
                    $stmt = $dbh->prepare($sql);
                    // set value to query
                    $params = [$first_name,$last_name,$email,$phone,$username,$pwd,$target_Path,$role];
        //           print_r($params);
                    $result = $stmt->execute($params);
                } else {
                    echo "Sorry, there was an error uploading your file<br>";
                }
            }
        
        }
        
        // if all parameter ok and execute the query successfully
        if ($paramsok) {
            if ($result) {
                header("location:user_list.php");
            } else {
                header("location:user_add.php");
            }
        } else {
            echo "<p>Something was wrong with your parameters!</p>";
        }
        

    }

?>


    <link rel="stylesheet" href="css/add_page_style.css">



    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Add User</h3>
                        <form name="myform"  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input id="first_name" name="first_name" class="form-control" type="text" required>
                        <span id="error_first_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input id="last_name" name="last_name" class="form-control" type="text" required>
                        <span id="error_last_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" name="email" class="form-control" type="email" required>
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                        <span id="error_phone" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                        <span id="error_username" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <span id="error_password" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="fileToUpload">Profile Image *</label>
                        <input type="file" id="fileToUpload" name="fileToUpload" class="form-control" required>
                        <span id="error_fileToUpload" class="text-danger"></span>
                    </div>                    
                    <div class="form-group">
                        <label for="role">Role *</label>
                            <select id="role" name="role">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        <span id="error_role" class="text-danger"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="user_add" id="user_add">Save</button>
                    
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




  

<!-- <script type="text/javascript">
    function commnetClick(strId) {
        var filedName = "strId_" + strId;
        var storyId = $("#" + filedName).val();
        window.location.href = "story_details.php?strId=" + storyId;
    }

    // $('#story_upload').click(function () {
    //     $( "#myForm" ).submit();
    //     window.location.href = "index.php";
    // });
</script> -->