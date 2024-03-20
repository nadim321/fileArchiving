<?php
// session destory and logout
session_start();
session_destroy();
header("location: login.php");
?>