<?php
    include_once 'psl-config.php';
    $mysql = new mysqli(HOST, USER, PASSWORD, DATABASE);

    if($mysql->connect_errno > 0){
        echo "Not connected";
    }
   
?>