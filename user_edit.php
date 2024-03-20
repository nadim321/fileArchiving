<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
// get data from
$username = FILTER_INPUT(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
$role = 'admin';
// get story details
$sql = "select * from user where username = ? and role != ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$username, $role];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    // if query return any row
    while ($row = $stmt->fetch()) {
        $username = $row['username'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $name = $firstName. " ". $lastName;
        $profile_pic = $row["profile_pic"];
?>

<div style="margin-top: 8%" align="center">
    <h3>Edit Story</h3><br/>
    <form method="POST" action="story_upload.php" enctype="multipart/form-data">

        <table align="center">
            <tr>
                <td></td>
                <td><input type="hidden" name="username" value="<?php echo $username; ?>" </td>
            </tr>
            <tr>
                <td colspan="2"><img src ="<?php echo $profile_pic; ?>" width="250px" height="150px"/></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>: <input type="file" name="fileToUpload"></td>
            </tr>
            <tr>
                <td>Name :</td>
                <td><textarea rows="3" cols="40" name="description" required><?php echo $name; ?></textarea></td>
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