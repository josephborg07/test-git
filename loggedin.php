<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
    <?php
    session_start();
    var_dump($_SESSION);
        if($_SESSION['role_name']==='administrator'){
            echo 
            '<div class="menu-area">
                <div><a href="insert_patient.php">Insert Patient</a></div>
                <div><a href="list_patients.php">Patients list</a></div>	
                <div><a href="InsertUSer.php">Insert User</a></div>
                <div><a href="logout.php">LogOut</a></div>
            </div>';        
        }
        elseif($_SESSION['role_name']==='consultant'){
            echo 
            '<div class="menu-area">
                <div><a href="insert_patient.php">Insert Patient</a></div>
                <div><a href="list_patients.php">Patients list</a></div>
                <div><a href="logout.php">LogOut</a></div>	
            </div>';
            echo '<style> .admin_menu_items{display:none;}</style>';
        }
        if($_SESSION['logged_in']==='TRUE'){
            echo'<div class="footer">
                <div>'.$_SESSION['first_name'].' '.$_SESSION['surname'].'</div>
                <div>'.$_SESSION['role_name'].'</div>';
        }
    ?>
<body>

</body>
</html>
<?php


?>