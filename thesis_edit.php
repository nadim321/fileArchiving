<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
if($loggedInUserRole =="admin"){
// get data from
$thesis_id = FILTER_INPUT(INPUT_GET, 'thesis_id', FILTER_SANITIZE_STRING);
// get story details
$sql = "select * from thesis where id = ?";
$stmt = $dbh->prepare($sql);
// set value to query
$params = [$thesis_id];
$result = $stmt->execute($params);
if ($stmt->rowCount()) {
    // if query return any row
    while ($row = $stmt->fetch()) {
        $id = $row['id'];
        $title = $row['title'];
        $abstract = $row["abstract"];
        $file_path = $row["file_path"];
?>

<!-- <div style="margin-top: 8%" align="center">
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
</div> -->


    <link rel="stylesheet" href="css/add_page_style.css">

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items" style='width: 45% ; margin: auto; padding-left: 2%; padding-right: 2%; border: 1px solid gray' >
                        <h3>Edit Thesis</h3><br/>   
                        <div align="left"><br/>
                            <form method="POST" id="thesis_upload" name="thesis_upload" action="thesis_upload.php" enctype="multipart/form-data">
                                <input type="hidden" name="thesis_id" value="<?php echo $thesis_id; ?>" />
                                <label>Title : </label><input class="form-control" name="title" id="title"  value="<?php echo $title; ?>"required/><br/>
                                <label>Abstract : </label><textarea class="form-control" rows="4" name="abstract" style="width: 100%;" required ><?php echo $abstract; ?> </textarea><br/><br/>
                                <object data="<?php echo $file_path; ?>" type="application/pdf" width="100%" height="500px" ></object><br/><br/>
                                <input class="form-control" type="file" id="fileToUpload" name="fileToUpload"><br/><br/>
                                <button type="submit" class="btn btn-primary btn-block"  name="thesis_update" id="thesis_update" >Update</button> <br/><br/>
                            </form>
                        </div>
                        <hr/>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>


<?php
    }
    }
}else{
    echo "You are not allowed to edit thesis!";
}
?>