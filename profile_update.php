<?php
include "menu.php";
include "connect.php";
$username = $_SESSION["username"];
// if profile update request
if (isset($_POST['profile_update'])) {
// get field value from form
    $firstName = FILTER_INPUT(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = FILTER_INPUT(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phone = FILTER_INPUT(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $target_tmp = $_FILES["fileToUpload"]["tmp_name"];

    $paramsok = false;

// file upload code
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
            $sql = "update user set firstName = ? , lastName = ? , email = ? , phone = ?, profile_pic = ? where username = ?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$firstName, $lastName, $email , $phone , $target_Path , $username];
//           print_r($params);
            $result = $stmt->execute($params);
            header("location:my_story.php");
        } else {
            $paramsok = true;
            $sql = "update user set firstName = ? , lastName = ? , email = ? , phone = ? where username = ?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$firstName, $lastName, $email , $phone , $username];
//           print_r($params);
            $result = $stmt->execute($params);
            header("location:my_story.php");
        }
    }


// if all parameter ok and execute the query successfully
    if ($paramsok) {
        if ($result) {
            header("location:profile.php?success=true");
        } else {
            header("location:profile.php?success=true");
        }
    } else {
        echo "<p>Something was wrong with your parameters!</p>";
    }
}


?>