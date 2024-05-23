<?php
include "menu.php";
include "connect.php";
$username = $_SESSION["username"];
$role = $_SESSION["role"];

if($role == "admin")
{
$teacher_id = FILTER_INPUT(INPUT_GET, 'teacher_id', FILTER_SANITIZE_STRING);
    // query for delete user
        $sql = "update teacher set deleted = 1 where id = ?";
        $stmt = $dbh->prepare($sql);
        $params = [$teacher_id];
        $result = $stmt->execute($params);

//  after delete user also destroy session
        if ($result) {
            echo "<script> window.location.href='teacher_list.php'</script>";
        } else {
            echo "<p>Failed to delete</p>";
        }

}else{
    echo "<p>You are not allowed to delete teacher</p>";
}

?>