<?php
include 'connect.php';
$username = FILTER_INPUT(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$paramsok = false;

// Prepare and execute the DB query
$paramsok = true;
$sql = "SELECT password, role FROM user where username = ?";
$stmt = $dbh->prepare($sql);
$params = [$username];
$success = $stmt->execute($params);
if ($paramsok) {
    // if query return any row
    if ($stmt->rowCount()) {
        while ($row = $stmt->fetch()) {
            $pass = $row['password'];
            $role = $row['role'];

            // verify the saved and user given password
            if (password_verify($password, $pass)) {
                session_start();
                // if username and password is ok then set a status to as logged in into the session
                $_SESSION["username"] = $username;
                $_SESSION["role"] = $role;
                $_SESSION["isLoggedIn"] = true;

                header("location: index.php");
            }
        }

    } 
    else {
        header("location: login.php");
    }
} else {
    echo "<p>Something was wrong with your parameters!</p>";
}

?>