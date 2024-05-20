<?php
include "menu.php";
include 'connect.php';

// logged in user name
    $loggedInUser = $_SESSION["username"];
    $role = $_SESSION["role"];
        // create table for show all data
        
    if(isset($_POST['teacher_add'])) {
        // get field value from form
        $name = FILTER_INPUT(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = FILTER_INPUT(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $designation = FILTER_INPUT(INPUT_POST, 'designation', FILTER_SANITIZE_STRING);
        $user = FILTER_INPUT(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        
        $paramsok = false;
        // null check
        if (
            $name !== null && $name !== "" &&
            $email !== null && $email !== "" &&
            $phone !== null && $phone !== "" && 
            $designation !== null && $designation !== "" &&
            $user !== null && $user !== ""
        
        ) {
                    // prepare query for insert data
                    $paramsok = true;
                    $sql = "INSERT into teacher (`name`,email,phone,designation,user,deleted) VALUES (?,?,?,?,?,?)";
                    $stmt = $dbh->prepare($sql);
                    // set value to query
                    $params = [$name,$email,$phone,$designation,$user,0];
                    // print_r($params);
                    $result = $stmt->execute($params);
        
        }
        
        // if all parameter ok and execute the query successfully
        if ($paramsok) {
            if ($result) {
                header("location:teacher_list.php");
            } else {
                header("location:teacher_add.php");
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
                        <h3>Add Teacher</h3>
                        <form name="myform"  method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input id="name" name="name" class="form-control" type="text" required>
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" name="email" class="form-control" type="email" required>
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                        <span id="error_phone" class="text-danger"></span>
                    </div> 
                    <div class="form-group">
                        <label for="designation">Designation *</label>
                        <input type="text" id="designation" name="designation" class="form-control" required>
                        <span id="error_designation" class="text-danger"></span>
                    </div> 

                    <div  class="form-group">
                                <label>User</label>
                                <select name="user" required>
                                    <option value="">Select User</option>
                                    <?php
                                        $sql = "SELECT * FROM user where deleted = 0 and role='teacher' order by id asc";
                                        $stmt = $dbh->prepare($sql);

                                        $result = $stmt->execute();
                                        print_r($result);
                                        //loop
                                        while ($row = $stmt->fetch()) {
                                    ?>
                                            <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                    </div>   <br/>

                    <button type="submit" class="btn btn-primary btn-block" name="teacher_add" id="teacher_add">Save</button>
                    
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