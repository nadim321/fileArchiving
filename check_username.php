<?php
// db connection
include 'connect.php';
// get username from get request
$username = FILTER_INPUT(INPUT_GET, 'user', FILTER_SANITIZE_STRING);

// query for check username existence
$sql = "SELECT * FROM user where username = ?";
$stmt = $dbh->prepare($sql);
$params = [$username];
$success = $stmt->execute($params);
// return response
    if ($stmt->rowCount()) {
        echo "<span style='color: red'>Username already Exists</span>";
    }
    else{
        echo "<span style='color: green'>Ok</span>";
    }

?>