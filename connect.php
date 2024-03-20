<?php
try {
    // database credential and connect
    $dbh = new PDO(
        "mysql:host=localhost;dbname=gotravel",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}

?>