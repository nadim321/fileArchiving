<?php
include "menu.php";
include 'connect.php';

$story_id = FILTER_INPUT(INPUT_GET, 'story_id', FILTER_SANITIZE_STRING);
    // query for delete user
        $sql = "Delete from story where id = ?";
        $stmt = $dbh->prepare($sql);
        $params = [$story_id];
        $result = $stmt->execute($params);

//  after delete user also destroy session
        if ($result) {
            header("location:my_story.php");
        } else {
            echo "<p>Fail…</p>";
        }


?>