<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
// get value from form
$story_id = FILTER_INPUT(INPUT_GET, 'strId', FILTER_SANITIZE_STRING);
// null check
if (
    $story_id !== null && $story_id !== ""

) {

    // query for get story details
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
            $photo_url = $row['photo_url'];
            $username = $row['username'];

            echo "<div style='width: 40% ; margin: auto' >";
            echo "<table align='center'>";

// get user details
            $sql3 = "SELECT * from user where username = ?";
            $stmt3 = $dbh->prepare($sql3);
            $params3 = [$username];
            $stmt3->execute($params3);
            if ($stmt3->rowCount()) {
                while ($row3 = $stmt3->fetch()) {
                    //make a list of data with each row
                    $firstName = $row3["firstName"];
                    $lastName = $row3["lastName"];
                    $profile_pic = $row3["profile_pic"];
                   // show user profile pic and name
                    echo "<tr>";
                    echo "<div style='display: inline-block ;'><img src =$profile_pic height='40' width='40' style='border-radius: 50%;' /></div>";
                    echo "<div style='display: inline-block ;' ><b>$firstName $lastName</b></div><br/>";
                    echo "</tr>";
                }
            }
            // show story description and image
            echo "<tr>";
            echo "<div> $description </div>";
            echo "<img src =$photo_url height='250' width='400'/><br/><hr/>";
            echo "</tr>";

            // query for get story comment
            $sql4 = "SELECT * from comment where story_id = ? order by id asc";
            $stmt4 = $dbh->prepare($sql4);
            $params4 = [$story_id];
            $stmt4->execute($params4);
            if ($stmt4->rowCount()) {
                while ($row4 = $stmt4->fetch()) {
                    $comment = $row4['comment'];
                    $username = $row4['username'];
                    // query for get user details
                    $sql5 = "SELECT * from user where username = ?";
                    $stmt5 = $dbh->prepare($sql5);
                    $params5 = [$username];
                    $stmt5->execute($params5);
                    if ($stmt5->rowCount()) {
                        while ($row5 = $stmt5->fetch()) {
                            //make a list of data with each row
                            $firstName = $row5["firstName"];
                            $lastName = $row5["lastName"];
                            $profile_pic = $row5["profile_pic"];


                            // show comment
                            echo "<tr>";
                            echo "<div style='display: inline-block ; width: 10%' > <img src =$profile_pic height='40' width='40' style='border-radius: 50%;' /> </div>";
                            echo "<div style='display: inline-block; border: 1px solid gray ; width: 80% ; padding: 10px ; border-radius: 20px' > 
                        <div><b>$firstName $lastName</b></div><div>$comment</div> </div><hr/>";
                            echo "</tr>";
                        }
                    }


                }
            }

            // add new comment from same page
            echo "<tr>";
            echo "<input type='hidden' id='story_id' value='$story_id'/>";
            echo "<input type='hidden' id='loggedInUser' value='$loggedInUser'/>";
            echo "<textarea id='commnt' rows='3' cols='70'></textarea>";
            echo "<br/><br/><div align='left'><input type='button' id='submit' value='Comment'/></div>";

            echo "</tr>";

            echo "</table></div>";


        }
    }
}
else{
    echo "<script> window.location.href='index.php'</script>";
}
?>


<script type="text/javascript">
    $('#submit').click(function () {
        var story_id = $('#story_id').val();
        var loggedInUser = $('#loggedInUser').val();
        var comment = $('#commnt').val();
        window.location.href = "comment_add.php?story_id=" + story_id + "&username=" + loggedInUser+"&comment="+comment;
    });
</script>
