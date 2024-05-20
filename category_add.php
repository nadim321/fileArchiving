<?php
include "menu.php";
include 'connect.php';

// logged in user name
    $loggedInUser = $_SESSION["username"];
    $role = $_SESSION["role"];
        // create table for show all data
        
    if(isset($_POST['category_add'])) {
        // get field value from form
        $name = FILTER_INPUT(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        
        $paramsok = false;
        // null check
        if (
            $name !== null && $name !== ""
        
        ) {
                    // prepare query for insert data
                    $paramsok = true;
                    $sql = "INSERT into category (name,deleted) VALUES (?,?)";
                    $stmt = $dbh->prepare($sql);
                    // set value to query
                    $params = [$name,0];
                    // print_r($params);
                    $result = $stmt->execute($params);
        
        }
        
        // if all parameter ok and execute the query successfully
        if ($paramsok) {
            if ($result) {
                header("location:category_list.php");
            } else {
                header("location:category_add.php");
            }
        } else {
            echo "<p style='color:#fff;'>Something was wrong with your parameters!</p>";
        }
        

    }

?>


    <link rel="stylesheet" href="css/add_page_style.css">



    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Add Catregory</h3>
                        <form name="category_add"  method="post" >
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input id="name" name="name" class="form-control" type="text" required>
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="category_add" id="category_add">Save</button>
                    
                </form>
                    </div>
                </div>
            </div>
        </div>
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