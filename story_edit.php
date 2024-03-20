<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
// get data from
$story_id = FILTER_INPUT(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
// get story details
$sql = "select * from story where id = ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$story_id];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    // if query return any row
    while ($row = $stmt->fetch()) {
        $id = $row['id'];
        $description = $row['description'];
        $photo_url = $row["photo_url"];
?>

<div style="margin-top: 8%" align="center">
    <h3>Edit Story</h3><br/>
    <form method="POST" action="story_upload.php" enctype="multipart/form-data">

        <table align="center">
            <tr>
                <td></td>
                <td><input type="hidden" name="story_id" value="<?php echo $story_id; ?>" </td>
            </tr>
            <tr>
                <td colspan="2"><img src ="<?php echo $photo_url; ?>" width="250px" height="150px"/></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>: <input type="file" name="fileToUpload"></td>
            </tr>
            <tr>
                <td>Description :</td>
                <td><textarea rows="3" cols="40" name="description" required><?php echo $description; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td align="right"><input type="submit" name="story_update" value="Update"/></td>
            </tr>
        </table>

    </form>
</div>


<?php

    }
}
?>