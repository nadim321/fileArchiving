<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];

$sql = "select * from user where username = ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$loggedInUser];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    while ($row = $stmt->fetch()) {
        $username = $row['username'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $phone = $row['phone'];
        $profile_pic = $row["profile_pic"];
        ?>

        <div style="margin-top: 8%" align="center">

            <?php
            if(isset($_GET['success'])){
                if($_GET['success']=="true"){
                    echo "<span style='color: green'><b>Profile updated successfully</b></span><br/><br/>";
                }
                else if($_GET['success']=="false"){
                    echo "<span style='color: red'><b>Error to update profile !!!</b></span><br/><br/>";
                }
            }
            ?>

            <h3>Edit Profile</h3><br/>
            <form method="POST" action="profile_update.php" enctype="multipart/form-data">

                <table align="center">
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="story_id" value="<?php echo $username; ?>" </td>
                    </tr>
                    <tr>
                        <td colspan="2"><div align="center"><img src ="<?php echo $profile_pic; ?>" width="150px" height="150px" style='border-radius: 50%;'/></div></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>: <input type="text" name="firstName" value="<?php echo $firstName; ?>"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>: <input type="text" name="lastName" value="<?php echo $lastName; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <input type="email" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>: <input type="text" name="phone" value="<?php echo $phone; ?>"></td>
                    </tr>
                    <tr>
                        <td>Profile Picture</td>
                        <td>: <input type="file" name="fileToUpload"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><input type="submit" name="profile_update" value="Update"/></td>
                    </tr>
                </table>

            </form>

            <a href="delete_profile.php" id="profileDlt">Delete Profile</a>
        </div>


        <?php

    }
}
?>

<script type="text/javascript">
    // if profile delete click then
    $('#profileDlt').click(function () {

        if (window.confirm("Do you want to delete your profile. It will remove all of your data. And it can not be restored !!!")) {
            window.location.href = "delete.php";
        }

    });
</script>
