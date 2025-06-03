<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "store_database";

    $connection = mysqli_connect($host,$username,$pass,$dbname);

    if(!$connection){
        die("Connection Error");
    }
?>