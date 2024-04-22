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
$sql = "SELECT * FROM user where username != 'super_admin' and deleted = 0 order by username asc";
$stmt = $dbh->prepare($sql);
$result = $stmt->execute();

// if query return any row show the story list
if ($stmt->rowCount()) {
    $i=1;
    // show story table
    echo "<div align='center'> <table id='userList'  class='table table-striped table-bordered'> <thead><tr><th>SL</th><th>Username</th><th>Name</th><th>Email</th><th style='text-align:left'>Phone</th><th>Image</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
    while ($row = $stmt->fetch()) {
        //make a list of data with each row
        $id = $row["id"];
        $username = $row["username"];
        $profile_pic = $row["profile_pic"];
        $firstName = $row["firstName"] ;
        $lastName = $row["lastName"] ;
        $email = $row["email"] ;
        $phone = $row["phone"] ;



        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$username</td>";
        echo "<td>$firstName $lastName</td>";
        echo "<td>$email</td>";
        echo "<td style='text-align:left'>$phone</td>";
        echo "<td><img src='$profile_pic' width='70px' height='50px'/></td>";
        echo "<td><a href='user_edit.php?username=$username'>Edit</a></td>";
        echo "<td><div align='center'><i class='fa fa-times-circle' style='font-size: 13px ; color: red' onclick='deleteUser($id)'></i></div></td>";
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
    function deleteUser(id) {
        if(window.confirm("Do you want to delete the user ?")) {
            window.location.href = "delete_user.php?user_id=" + id;
        }
    }
</script>
