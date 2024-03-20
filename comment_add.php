<?php
include "menu.php";
include "connect.php";
$username = $_SESSION["username"];
// get field value from form
$story_id = FILTER_INPUT(INPUT_GET, 'story_id', FILTER_SANITIZE_STRING);
$username = FILTER_INPUT(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
$comment = FILTER_INPUT(INPUT_GET, 'comment', FILTER_SANITIZE_STRING);

$paramsok = false;
// null check
if (
    $story_id !== null && $story_id !== "" &&
    $username !== null && $username !== "" &&
    $comment !== null && $comment !== ""

) {

            // prepare query for insert data
            $paramsok = true;
            $sql = "INSERT into comment (story_id,comment,username) VALUES (?,?,?)";
            $stmt = $dbh->prepare($sql);
            // set value to query
            $params = [$story_id,$comment,$username];
//           print_r($params);
            $result = $stmt->execute($params);
}

// if all parameter ok and execute the query successfully
if ($paramsok) {
    if ($result) {
        header("location:story_details.php?strId=$story_id");
    } else {
        echo "<p>Failed to add comment.</p>";
    }
} else {
    echo "<p>Something was wrong with your parameters!</p>";
}

?>