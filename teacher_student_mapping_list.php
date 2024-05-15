<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
?>

  <body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#teacherStudentMappingList').dataTable({
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
$sql = "SELECT tsm.id mappingId, s.name studentName, t.name teacherName FROM teacher_student_mapping tsm
            LEFT JOIN student s on s.id = tsm.student_id
            LEFT JOIN teacher t on t.id = tsm.teacher_id
            where tsm.deleted = 0 and t.deleted = 0 and s.deleted = 0 order by tsm.id asc";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute();

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    echo "<div align='center'> <table id='teacherStudentMappingList'  class='table table-striped table-bordered'> <thead><tr><th>SL</th><th>Student</th><th>Teacher</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["mappingId"];
        $studentName = $row["studentName"];
        $teacherName = $row["teacherName"] ;



        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$studentName</td>";
        echo "<td>$teacherName</td>";
        echo "<td><a href='teacher_student_mapping_edit.php?id=$id'>Edit</a></td>";
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
            window.location.href = "teacher_student_mapping_delete.php?mappingId=" + id;
        }
    }
</script>
