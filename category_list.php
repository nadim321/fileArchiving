<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
?>

  <body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#categoryList').dataTable({
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
$sql = "SELECT * FROM category where deleted = 0 order by id asc";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute();

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    echo "<div align='center'> <table id='teacherList'  class='table table-striped table-bordered'> <thead><tr><th>SL</th><th>Name</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["id"];
        $name = $row["name"];



        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$name</td>";
        echo "<td><a href='category_edit.php?id=$id'>Edit</a></td>";
        echo "<td><div align='center'><i class='fa fa-times-circle' style='font-size: 13px ; color: red' onclick='deleteCategory($id)'></i></div></td>";
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
    function deleteCategory(id) {
        if(window.confirm("Do you want to delete the category ?")) {
            window.location.href = "category_delete.php?category_id=" + id;
        }
    }
</script>
