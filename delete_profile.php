<?php
include "menu.php";
include 'connect.php';
//if user logged in
if(isset($_SESSION["username"])) {
    $loggedInUser = $_SESSION["username"];

    // query for delete user
        $sql = "Delete from user where username = ?";
        $stmt = $dbh->prepare($sql);
        $params = [$loggedInUser];
        $result = $stmt->execute($params);

//  after delete user also destroy session
        if ($result) {
            session_destroy();
            header("location:login.php");
        } else {
            echo "<p>Fail…</p>";
        }
}

?>