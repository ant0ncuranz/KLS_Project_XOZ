<?php
    $host = "rdbms.strato.de";
    $port = "53306";
    $user = "U1660543";
    $pass = "mysqlpasswort123";
    $db   = "DB1660543";
    
    //Verbindung zur Datenbank herstellen
    $mysqli = mysqli_connect($host, $user, $pass, $db, $port) or die ("Verbindung nicht möglich " . mysqli_connect_error());
    
    mysqli_query($mysqli, "SET NAMES 'utf8'");
?>