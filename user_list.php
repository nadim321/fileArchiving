<?php
include "menu.php";
include 'connect.php';
$loggedInUser = $_SESSION["username"];
?>

  <body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#userList').dataTable({
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
$sql = "SELECT * FROM user where role != 'admin' and deleted = 0 order by username asc";
$stmt = $dbh->prepare($sql);
$params = [$loggedInUser];
$result = $stmt->execute($params);

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    echo "<div align='center'> <table id='userList'  class='table table-striped table-bordered'> <thead><tr><th>SL</th><th>Username</th><th>Name</th><th>Image</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $username = $row["username"];
        $profile_pic = $row["profile_pic"];
        $firstName = $row["firstName"] ;
        $lastName = $row["lastName"] ;



        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$username</td>";
        echo "<td>$firstName $lastName</td>";
        echo "<td><img src='$profile_pic' width='70px' height='50px'/></td>";
        echo "<td><a href='user_edit.php?username=$username'>Edit</a></td>";
        echo "<td><div align='center'><i class='fa fa-times-circle' style='font-size: 13px ; color: red' onclick='deleteUser($username)'></i></div></td>";
        echo "</tr>";
        $i++;

    }
    echo "</tbody></table></div>";
}

?>

  </body>
</html>

<script type="text/javascript">
    
    // delete story
    function deleteUser(username) {
        if(window.confirm("Do you want to delete the user ???")) {
            window.location.href = "delete_user.php?user_id=" + username;
        }
    }
</script>
