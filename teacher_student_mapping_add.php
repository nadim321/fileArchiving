<?php
include "menu.php";
include 'connect.php';

// logged in user name
    $loggedInUser = $_SESSION["username"];
    $role = $_SESSION["role"];
        // create table for show all data
        
    if(isset($_POST['teacher_student_mapping_add'])) {
        // get field value from form
        $teacherId =  $_POST['teacherId'];
        $studentId =  $_POST['studentId'];
        
        $paramsok = false;
        // null check
        if (
            $teacherId !== null && $teacherId !== "" &&
            $studentId !== null && $studentId !== "" 
        
        ) {
                    // prepare query for insert data
                    $paramsok = true;
                    $sql = "INSERT into teacher_student_mapping (student_id,teacher_id) VALUES (?,?)";
                    $stmt = $dbh->prepare($sql);
                    // set value to query
                    $params = [$studentId,$teacherId];
                    // print_r($params);
                    $result = $stmt->execute($params);
        
        }
        
        // if all parameter ok and execute the query successfully
        if ($paramsok) {
            if ($result) {
                header("location:teacher_student_mapping_list.php");
            } else {
                header("location:teacher_student_mapping_add.php");
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
                        <h3>Student Assign</h3>
                        <form name="myform"  method="post" >
                    <div  class="form-group">
                                <label>Student</label>
                                <select name="studentId" required>
                                    <option value="">Select Student</option>
                                    <?php
                                        $sql = "SELECT * FROM student where deleted = 0 order by name asc";
                                        $stmt = $dbh->prepare($sql);

                                        $result = $stmt->execute();
                                        print_r($result);
                                        //loop
                                        while ($row = $stmt->fetch()) {
                                    ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                    </div>   <br/>
                    <div  class="form-group">
                                <label>Teacher</label>
                                <select name="teacherId" required>
                                    <option value="">Select Teacher</option>
                                    <?php
                                        $sql = "SELECT * FROM teacher where deleted = 0 order by name asc";
                                        $stmt = $dbh->prepare($sql);

                                        $result = $stmt->execute();
                                        print_r($result);
                                        //loop
                                        while ($row = $stmt->fetch()) {
                                    ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                    </div>   <br/>

                    <button type="submit" class="btn btn-primary btn-block" name="teacher_student_mapping_add" id="teacher_student_mapping_add">Save</button>
                    
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


