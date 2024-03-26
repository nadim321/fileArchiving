<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
// get data from

if($loggedInUserRole =="admin"){
    
        $thesis_id = FILTER_INPUT(INPUT_GET, 'thesis_id', FILTER_SANITIZE_STRING);
        // get field value from form


            $sql = "update thesis set status=? where id = ?";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [1, $thesis_id];
            $result = $stmt->execute($params);

            header("location:thesis_upload_request.php");
          

    }
?>