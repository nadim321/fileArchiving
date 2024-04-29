<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
if($loggedInUserRole=="admin"){
?>




  <body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#thesisList').dataTable({
          "paging" : true,
          "ordering" : true,
          "info"  : false,
          "searching" : true 
        }); 
    }); 
</script>

<?php
// query for get story for logged in user
$sql = "SELECT a.*, b.name as teacherName FROM thesis a left join teacher b on  a.teacher_id = b.id where a.status = 0 and a.deleted = 0 order by a.id asc";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute();

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    $str =  "<div align='center'> <table id='thesisList' class='table table-striped table-bordered' > <thead><tr><th>SL</th><th>Title</th><th>Abstract</th><th>Supervisor</th><th>File</th>";
    
        $str .= "<th>Approve</th>";
  
    $str .= "</tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["id"];
        $title = $row["title"];
        $abstract = $row["abstract"];
        $teacherName = $row["teacherName"];
        $file_path = $row["file_path"] ;
        $status = $row["file_path"] ;



        $str .= "<tr>";
        $str .= "<td>$i</td>";
        $str .= "<td>$title</td>";
        $str .= "<td>$abstract</td>";
        $str .= "<td>$teacherName</td>";
        $str .= "<td><a href='$file_path' target='blank'/><i class='fa fa-download'></i></td>";
        $str .= "<td><div align='center'><i class='fa fa-check' style='font-size: 13px ; color: green' onclick='approveThesis($id)'></i></div></td>";

        $str .= "</tr>";
        $i++;

    }
    $str .= "</tbody></table></div>";

    echo $str;
}else{
    echo "<div width='100%' > No record found! </div>";
}
}
?>

  </body>
</html>

<script type="text/javascript">

    // delete story
    function approveThesis(id) {
        if(window.confirm("Do you want to approve this thesis ?")) {
            window.location.href = "thesis_approve.php?thesis_id=" + id;
        }
    }
</script>
