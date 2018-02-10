<?php

session_start();
if(isset($_SESSION['role_name'])){
    echo"user id is set to ".$_SESSION['role_name'];
}
?>