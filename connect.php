<?php
try {
    // database credential and connect
    $dbh = new PDO(
        "mysql:host=localhost;dbname=file_archiving",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}

?>