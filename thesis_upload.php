<?php
include "menu.php";
include "connect.php";
$username = $_SESSION["username"];
$role = $_SESSION["role"];

// if request for new story upload
if(isset($_POST['thesis_upload'])) {
    // echo "RsdfRR";
// get field value from form
    $title = FILTER_INPUT(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $abstract = FILTER_INPUT(INPUT_POST, 'abstract', FILTER_SANITIZE_STRING);
    $target_tmp = $_FILES["fileToUpload"]["tmp_name"];
    $status = 0;

    $paramsok = false;
// null check
    if (        
        $title !== null && $title !== "" && $abstract !== null && $abstract !== "" 

    ) {
        // image upload for story
        $target_dir = "thesis_doc/";
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file = $target_dir . $newfilename;
        $target_Path = "thesis_doc/" . $newfilename;
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
            // echo "EEE";
            if (move_uploaded_file($target_tmp, $target_file)) {
                // prepare query for insert data
                $paramsok = true;
                if($role == 'admin'){
                    $status = 1;
                }

                $titleMatchigPercent = 0;

                // query for get story for logged in user
                $sql = "SELECT * FROM thesis where status = 1 and deleted = 0 order by id asc";
                $stmt = $dbh->prepare($sql);
                $result = $stmt->execute();

                // if query return any row show the story list
                if ($stmt->rowCount()) {
                    $i=1;
                    // show story table
                    while ($row = $stmt->fetch()) {
                        $oldTitle = $row["title"]; 
                        $similarity = similar_text($oldTitle, $title, $percent);
                        if($percent >= $titleMatchigPercent){
                            $titleMatchigPercent = $percent ;
                        }
                    }
                }
                if($titleMatchigPercent > 50){
                    $paramsok = false;
                }else{
                    // query for new story upload
                    $sql = "INSERT into thesis (title, abstract, username, file_path , status) VALUES (?,?,?,?,?)";
                    $stmt = $dbh->prepare($sql);
                    // set value to query
                    $params = [$title, $abstract ,$username, $target_Path, $status];
                    //           print_r($params);
                    $result = $stmt->execute($params);
                }
               
            } else {
                echo "Sorry, there was an error uploading your file<br>";
            }
        }

    }

// if all parameter ok and execute the query successfully
    if ($paramsok) {
        if ($result) {
            header("location:thesis_list.php");
        } else {
            echo "<p>Failed to upload thesis.</p>";
        }
    } else if($titleMatchigPercent > 50){    
        echo "This title is $titleMatchigPercent % mathed with others<br>";
    }
    else {
        echo "<p>Something was wrong with your parameters!</p>";
    }
}



?>