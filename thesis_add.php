<?php
include "menu.php";
include 'connect.php';
include "thesis.php";

// logged in user name
    $loggedInUser = $_SESSION["username"];
    $role = $_SESSION["role"];
        // create table for show all data
?>
    <div style='width: 45% ; margin: auto; padding-left: 2%; padding-right: 2%; border: 1px solid gray' >
        <div align="left"><br/>
            <form method="POST" id="thesis_upload" name="thesis_upload" action="thesis_upload.php" enctype="multipart/form-data">
                <label>Title : </label><input class="form-control" name="title" id="title" required/><br/>
                <label>Abstract : </label><textarea class="form-control" rows="4" name="abstract" style="width: 100%;" required ></textarea><br/><br/>
                <input class="form-control" type="file" id="fileToUpload" name="fileToUpload"><br/><br/>
                <button type="submit" class="btn btn-primary btn-block"  name="thesis_upload" id="thesis_upload" >Upload</button> <br/><br/>
            </form>
        </div>
        <hr/>
    </div>

  

<!-- <script type="text/javascript">
    function commnetClick(strId) {
        var filedName = "strId_" + strId;
        var storyId = $("#" + filedName).val();
        window.location.href = "story_details.php?strId=" + storyId;
    }

    // $('#story_upload').click(function () {
    //     $( "#myForm" ).submit();
    //     window.location.href = "index.php";
    // });
</script> -->