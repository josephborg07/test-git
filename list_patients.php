<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
    <?php
        include 'functions.php';
        session_start();
        $page_fund=new page_fundementals;
        $conn = new consultant_ops;
        $result=$conn->listPatients($_SESSION['user_id']);
        foreach($result as $row){
            $i=0;
            ${'p_id'.$i}=$row['p_id'];
            ${'p_fname'.$i}=$row['p_fname'];
            ${'p_surname'.$i}=$row['p_surname'];
            
            echo '<a href="patient_details.php?p_id='.${'p_id'.$i}.'">'.${'p_id'.$i}.'</a> <br />';
            $i++;
        }
        
        $footer=new userOps;
        $footer->footer($_SESSION['user_id'],$_SESSION['first_name'],$_SESSION['surname'],$_SESSION['role_name'],$_SESSION['logged_in']);
    ?>
    
</body>
<html>