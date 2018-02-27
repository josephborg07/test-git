<?php
    include 'functions.php';
    session_start();
    $p_id=$_GET['p_id'];
    
    $obj=new consultant_ops;
    $patient_details=$obj->get_patient_details($p_id);
    
    foreach($patient_details as $detail){
       print_r($detail);
       echo "<br />";
    }
    ?>