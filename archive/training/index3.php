<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $surname=$_POST['surname'];
    $city=$_POST['city'];

    include 'index2.php';
    $con=new DB_con;
    $con->insert($fname,$surname,$city);

    if($con){
        echo "data inserted";
    }
    else{
        echo "data not inserted";
    }
    
}
?>
<form action="" method="post">
        <label>First Name</label><input type="text" name="fname"/>
        <label>Surname</label><input type="text" name="surname"/>
        <label>City</label><input type="text" name="city"/>
        <input type="submit" name="submit" value="submit" />
    </form>
</body>
</html>