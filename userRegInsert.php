<?php
include "connect.php";

// get field value from form
$first_name = FILTER_INPUT(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
$last_name = FILTER_INPUT(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
$email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$phone = FILTER_INPUT(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$username = FILTER_INPUT(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$target_tmp = $_FILES["fileToUpload"]["tmp_name"];

$paramsok = false;
// null check
if (
    $first_name !== null && $first_name !== "" &&
    $last_name !== null && $last_name !== "" &&
    $email !== null && $email !== "" &&
    $phone !== null && $phone !== "" &&
    $username !== null && $username !== "" &&
    $password !== null && $password !== ""

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
    $role="student";


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
            
            $sql = "INSERT into user (firstName,lastName,email,phone,username,password,profile_pic,role) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$first_name,$last_name,$email,$phone,$username,$pwd,$target_Path,$role];
//           print_r($params);
            $result = $stmt->execute($params);

            $sql = "INSERT into student (name,email,phone,user,deleted) VALUES (?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$first_name.' '.$last_name,$email,$phone,$username,0];
//           print_r($params);
            $result = $stmt->execute($params);

            $paramsok = true;
        } else {
            echo "Sorry, there was an error uploading your file<br>";
        }
    }

}

// if all parameter ok and execute the query successfully
if ($paramsok) {
    if ($result) {
        echo "<script> window.location.href='login.php?success=true'</script>";
    } else {
        echo "<script> window.location.href='login.php?success=false'</script>";
    }
} else {
    echo "<p>Something was wrong with your parameters!</p>";
}

?>