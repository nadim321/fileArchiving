<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
?>

  <body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#teacherList').dataTable({
          "paging" : true,
          "ordering" : true,
          "info"  : false,
          "searching" : true 
        }); 
    }); 
</script>

 
 <body>

<?php
// query for get story for logged in user
$sql = "SELECT * FROM teacher where deleted = 0 order by id asc";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute();

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    echo "<div align='center'> <table id='teacherList'  class='table table-striped table-bordered'> <thead><tr><th>SL</th><th>Name</th><th>Email</th><th style='text-align:left'>Phone</th><th>Designation</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["id"];
        $name = $row["name"];
        $email = $row["email"] ;
        $phone = $row["phone"] ;
        $designation = $row["designation"] ;



        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$name</td>";
        echo "<td>$email</td>";
        echo "<td style='text-align:left'>$phone</td>";
        echo "<td>$designation</td>";
        echo "<td><a href='teacher_edit.php?id=$id'>Edit</a></td>";
        echo "<td><div align='center'><i class='fa fa-times-circle' style='font-size: 13px ; color: red' onclick='deleteTeacher($id)'></i></div></td>";
        echo "</tr>";
        $i++;

    }
    echo "</tbody></table></div>";
}else{
    echo "<div width='100%' > No record found! </div>";
}

?>

  </body>
</html>

<script type="text/javascript">
    
    // delete story
    function deleteTeacher(id) {
        if(window.confirm("Do you want to delete the teacher ?")) {
            window.location.href = "teacher_delete.php?teacher_id=" + id;
        }
    }
</script>
