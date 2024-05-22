<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
$loggedInUserRole = $_SESSION["role"];
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
if($loggedInUserRole=="teacher"){
    $sql = "SELECT a.*,a.status as status, b.name as teacherName, c.name as categoryName FROM thesis a 
        left join teacher b on  a.teacher_id = b.id 
        LEFT JOIN category c on a.category_id = c.id
        where a.status = 1 and a.deleted = 0 and c.deleted=0 and b.user = ? order by a.id desc";
    $stmt = $dbh->prepare($sql);
    $params = [$loggedInUser];
    $result = $stmt->execute($params);
}else{
    $sql = "SELECT a.*,a.status as status, b.name as teacherName, c.name as categoryName FROM thesis a 
        left join teacher b on  a.teacher_id = b.id 
        left join category c on a.category_id = c.id                                 
        where a.deleted = 0 and c.deleted = 0 order by a.id desc";
    $stmt = $dbh->prepare($sql);
    $result = $stmt->execute();
}

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    $str =  "<div align='center'> <table id='thesisList' class='table table-striped table-bordered' > <thead><tr><th>SL</th><th>Title</th><th>Abstract</th><th>Supervisor</th><th>Category</th><th>Summary</th><th>Deadline</th><th>File</th>";
    if($loggedInUserRole=="admin" || $loggedInUserRole=="teacher"){
        $str .= "<th>Edit</th><th>Delete</th>";
    }else if($loggedInUserRole=="student" ){
        $str .= "<th>Edit</th>";
    };
    $str .= "</tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["id"];
        $title = $row["title"];
        $abstract = $row["abstract"];
        $teacherName = $row["teacherName"];
        $file_path = $row["file_path"] ;
        $categoryName = $row["categoryName"] ;
        $deadline = $row["deadline"] ;
        $summary = $row["summary"] ;
        $status = $row["status"] ;



        $str .= "<tr>";
        $str .= "<td>$i</td>";
        $str .= "<td>$title</td>";
        $str .= "<td>$abstract</td>";
        $str .= "<td>$teacherName</td>";
        $str .= "<td>$categoryName</td>";
        $str .= "<td>$summary</td>";
        $str .= "<td>$deadline</td>";
        $str .= "<td><a href='$file_path' target='blank'/><i class='fa fa-download'></i></td>";
        if($loggedInUserRole=="admin" || $loggedInUserRole=="teacher"){
            $str .= "<td><a href='thesis_edit.php?thesis_id=$id'>Edit</a></td>";
            $str .= "<td><div align='center'><i class='fa fa-times-circle' style='font-size: 13px ; color: red' onclick='deleteThesis($id)'></i></div></td>";
        }
        else if($loggedInUserRole=="student" && $status == '0'){
            $str .= "<td><a href='thesis_edit.php?thesis_id=$id'>Edit</a></td>";
        }
        $str .= "</tr>";
        $i++;

    }
    $str .= "</tbody></table></div>";

    echo $str;
}else{
    echo "<div width='100%' > No record found! </div>";
}

?>

  </body>
</html>

<script type="text/javascript">

    // delete story
    function deleteThesis(id) {
        if(window.confirm("Do you want to delete this thesis ???")) {
            window.location.href = "thesis_delete.php?thesis_id=" + id;
        }
    }
</script>
