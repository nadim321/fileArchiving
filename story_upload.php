<?php
include "menu.php";
include "connect.php";
$username = $_SESSION["username"];

// if request for new story upload
if(isset($_POST['story_upload'])) {
// get field value from form
    $description = FILTER_INPUT(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $target_tmp = $_FILES["fileToUpload"]["tmp_name"];

    $paramsok = false;
// null check
    if (
        $description !== null && $description !== ""

    ) {
        // image upload for story
        $target_dir = "story_image/";
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $target_Path = "story_image/" . $newfilename;
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
                // query for new story upload
                $sql = "INSERT into story (description,username,photo_url) VALUES (?,?,?)";
                $stmt = $dbh->prepare($sql);
                // set value to query
                $params = [$description, $username, $target_Path];
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
            header("location:index.php");
        } else {
            echo "<p>Failed to upload story.</p>";
        }
    } else {
        echo "<p>Something was wrong with your parameters!</p>";
    }
}



// if  request for story update
if(isset($_POST['story_update'])) {
// get field value from form
    $description = FILTER_INPUT(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $story_id = FILTER_INPUT(INPUT_POST, 'story_id', FILTER_SANITIZE_STRING);
    $target_tmp = $_FILES["fileToUpload"]["tmp_name"];

    $paramsok = false;
// null check
    if (
        $description !== null && $description !== ""

    ) {

        // image upload
        $target_dir = "story_image/";
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $target_Path = "story_image/" . $newfilename;
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
                // query for update story with new image
                $sql = "update story set description = ? , photo_url = ? where id = ?";
                $stmt = $dbh->prepare($sql);
                // set value to query
                $params = [$description, $target_Path , $story_id];
//           print_r($params);
                $result = $stmt->execute($params);
                header("location:my_story.php");
            } else {
                $paramsok = true;

                // query for update story without any new image
                $sql = "update story set description = ? where id = ?";
                $stmt = $dbh->prepare($sql);
                // set value to query
                $params = [$description, $story_id];
//           print_r($params);
                $result = $stmt->execute($params);
                header("location:my_story.php");
            }
        }

    }

// if all parameter ok and execute the query successfully
    if ($paramsok) {
        if ($result) {
            echo "<div align='center'>Story uploaded Successfully</div>";
        } else {
            echo "<p>Failed to upload story.</p>";
        }
    } else {
        echo "<p>Something was wrong with your parameters!</p>";
    }
}


?>