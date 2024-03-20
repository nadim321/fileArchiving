<?php
include 'connect.php';
include "menu.php";

//get from request param
$storyId = FILTER_INPUT(INPUT_GET, 'storyId', FILTER_SANITIZE_STRING);
$username = FILTER_INPUT(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
$status = FILTER_INPUT(INPUT_GET, 'status', FILTER_SANITIZE_STRING);

$paramsok = false;

//null check
if (
    $storyId !== null && $storyId !== "" &&
    $username !== null && $username !== "" &&
    $status !== null && $status !== ""
) {
    $paramsok = true;
    // query for get like
    $sql = "select * from likecount where story_id = ? and username= ?";
    $stmt = $dbh->prepare($sql);
    // set value to query
    $params = [$storyId,$username];
    $result = $stmt->execute($params);
}


if ($paramsok) {
    // if query return any result
    if ($stmt->rowCount()) {
        // update query for like update
        $sql = "update likecount set like_dislike=? where story_id = ? and username= ?";
        $stmt = $dbh->prepare($sql);
        // set value to query
        $params = [$status,$storyId,$username];
        $result2 = $stmt->execute($params);
    } else {
        // if new like it will insert to database
        $sql = "insert into likecount (like_dislike,story_id,username) values (?,?,?)";
        $stmt = $dbh->prepare($sql);
        // set value to query
        $params = [$status,$storyId,$username];
        $result2 = $stmt->execute($params);
    }
} else {
    echo "<p>Something was wrong with your parameters!</p>";
}

?>