<?php
include "menu.php";
include "connect.php";
$username = $_SESSION["username"];
$role = $_SESSION["role"];

if($role == "admin")
{
$thesis_id = FILTER_INPUT(INPUT_GET, 'thesis_id', FILTER_SANITIZE_STRING);
    // query for delete user
        $sql = "update thesis set deleted = 1 where id = ?";
        $stmt = $dbh->prepare($sql);
        $params = [$thesis_id];
        $result = $stmt->execute($params);

//  after delete user also destroy session
        if ($result) {
            echo "<script> window.location.href='thesis_list.php'</script>";
        } else {
            echo "<p>Failed to delete</p>";
        }

}else{
    echo "<p>You are not allowed to delete thesis</p>";
}

?>