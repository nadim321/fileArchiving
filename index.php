<?php
include "menu.php";
include 'connect.php';
include "story.php";

// logged in user name
    $loggedInUser = $_SESSION["username"];

// Prepare and execute the DB query
    $sql = "SELECT * FROM story order by id desc";
    $stmt = $dbh->prepare($sql);
    $success = $stmt->execute();
//$result= $success->fatch();

// Fill an array with User objects based on the results.
    $list = [];
// fetch data from database
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $s_list = new story($row["id"], $row["description"], $row["photo_url"], $row["username"]);
        array_push($list, $s_list);
    }

    if ($success) {
        // create table for show all data
?>
<div style='width: 45% ; margin: auto; padding-left: 2%; padding-right: 2%; border: 1px solid gray' >
        <div align="left"><br/>
            <form method="POST" id="myForm" action="story_upload.php" enctype="multipart/form-data">
                <input type="file" name="fileToUpload"><br/><br/>
                <textarea rows="4" name="description" style="width: 100%;" required ></textarea><br/><br/>
                <input type="submit" name="story_upload" id="story_upload" value="Upload"/><br/><br/>
            </form>
        </div>
        <hr/>

  <?php      // Display each story object using its display method
        foreach ($list as $s_list) {
            $story_id = $s_list->getid();
            $description = $s_list->getDescription();
            $photoUrl = $s_list->getPhotoUrl();
            $username = $s_list->getUsername();
    // query for count like of every story
            $sql2 = "SELECT sum(case when like_dislike = 1 then 1 else 0 end) likeCount FROM likecount 
                      where story_id = ? group by story_id";
            $stmt2 = $dbh->prepare($sql2);
            $params2 = [$story_id];
            $result = $stmt2->execute($params2);
            $like = 0;
            if ($result) {
                while ($row2 = $stmt2->fetch()) {
                    $like = $row2["likeCount"];
                }
            }

            echo "<div>";
            echo "<table align='center'>";
            $sql3 = "SELECT * from user where username = ?";
            $stmt3 = $dbh->prepare($sql3);
            $params3 = [$username];
            $result2 = $stmt3->execute($params3);
            if ($result2) {
                while ($row3 = $stmt3->fetch()) {
                    //access the data from each row
                    $firstName = $row3["firstName"];
                    $lastName = $row3["lastName"];
                    $profile_pic = $row3["profile_pic"];
                    echo "<tr>";
                    echo "<div style='display: inline-block ;'><img src =$profile_pic height='40' width='40' style='border-radius: 50%;' /></div>";
                    echo "<div style='display: inline-block ;'><b>$firstName $lastName</b></div><br/>";
                    echo "</tr>";
                }
            }
            echo "<div><tr>";
            echo "<div> $description </div>";
            echo "<img src =$photoUrl height='250' width='400'/><br/><br/>";

            // get current user like status for a story
            $sql5 = "select * from likecount where story_id = ? and username= ?";
            $stmt5 = $dbh->prepare($sql5);
            // set value to query
            $params5 = [$story_id, $loggedInUser];
            $result5 = $stmt5->execute($params5);
            $status = 1;
            if ($stmt5->rowCount()) {
                while ($row5 = $stmt5->fetch()) {
                    $status = $row5["like_dislike"];
                    if ($status == 0) {
                        $status = 1;
                        echo "<span class='my-like' onclick='like_button($story_id , \"$loggedInUser\" , $status)' title='Like'></span> &nbsp; <span> $like</span>";
                    } else {
                        $status = 0;
                        echo "<span class='my-liked'  onclick='like_button($story_id , \"$loggedInUser\" , $status)' title='Like'></span> &nbsp; <span> $like</span>";
                    }
                }

            } else {
                echo "<span class='my-like'  onclick='like_button($story_id , \"$loggedInUser\" , $status)' title='Like'></span> &nbsp; <span> $like</span>";
            }

            // select total comment count
            $sql6 = "select count(*) commentCount from comment where story_id = ? GROUP by story_id";
            $stmt6 = $dbh->prepare($sql6);
            // set value to query
            $params6 = [$story_id];
            $result6 = $stmt6->execute($params6);
            $count = 0;
            if ($stmt6->rowCount()) {
                while ($row6 = $stmt6->fetch()) {
                    $count = $row6['commentCount'];
                }
            }
            echo "<span id='comment' onclick='commnetClick($story_id)'><input type='hidden' id='strId_$story_id' value='$story_id'><span style='margin-left: 5%'><i class='fa fa-comment' style='color: gray'></i></span> &nbsp; <span> $count</span></span>";

            echo "</tr></div><br/><br/><hr/>";
            echo "</table></div>";
        }
        echo "</div>";
    } else {
        echo "<p>Fail…</p>";
    }

?>


<script type="text/javascript">
    function commnetClick(strId) {
        var filedName = "strId_" + strId;
        var storyId = $("#" + filedName).val();
        window.location.href = "story_details.php?strId=" + storyId;
    }

    $('#story_upload').click(function () {
        $( "#myForm" ).submit();
        window.location.href = "index.php";
    });
</script>