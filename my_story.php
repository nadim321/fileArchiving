<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];

// query for get story for logged in user
$sql = "SELECT * FROM story where username = ? order by id asc";
$stmt = $dbh->prepare($sql);
$params = [$loggedInUser];
$result = $stmt->execute($params);

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    echo "<div align='center'> <table border='1px solid gray' width='70%'> <tr><th>SL</th><th>Description</th><th>Image</th><th>Edit</th><th>Delete</th></tr>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["id"];
        $description = $row["description"];
        $photo_url = $row["photo_url"];



        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$description</td>";
        echo "<td><img src='$photo_url' width='70px' height='50px'/></td>";
        echo "<td><a href='story_edit.php?id=$id'>Edit</a></td>";
        echo "<td><div align='center'><i class='fa fa-times-circle' style='font-size: 13px ; color: red' onclick='deleteStory($id)'></i></div></td>";
        echo "</tr>";
        $i++;

    }
    echo "</table></div>";
}

?>


<script type="text/javascript">

    // delete story
    function deleteStory(id) {
        if(window.confirm("Do you want to delete your story ???")) {
            window.location.href = "delete_story.php?story_id=" + id;
        }
    }
</script>
