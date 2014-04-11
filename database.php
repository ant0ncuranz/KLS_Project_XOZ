<?php
    $host = "devel-db-master.intranet.xoz";
    $port = "53306";
    $user = "mysql50admin";
    $pass = "Ex0zet";
    $db   = "schulprojekt_anton";
    
    //Verbindung zur Datenbank herstellen
    $mysqli = mysqli_connect($host, $user, $pass, $db, $port) or die ("Verbindung nicht möglich " . mysqli_connect_error());
    
    mysqli_query($mysqli, "SET NAMES 'utf8'");
?>