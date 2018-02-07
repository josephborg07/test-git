<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
<body>
<?php

//$array=array('fname','surname','username','email','dob','str_address','locality','postcode');

if(isset($_POST['fname'])&&isset($_POST['surname'])&&isset($_POST['contact_number'])&&isset($_POST['email'])&&isset($_POST['dob'])&&isset($_POST['str_address'])&&isset($_POST['locality'])&&isset($_POST['postcode'])&&isset($_POST['id_card_number'])&&isset($_POST['password']))
{
    $fname=$_POST['fname'];
    $surname=$_POST['surname'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $str_address=$_POST['str_address'];
    $locality=$_POST['locality'];
    $postcode=$_POST['postcode'];
    $id_card_number=$_POST['id_card_number'];
    $password=$_POST['password'];
    if(!empty($_POST['fname'])&&!empty($_POST['surname'])&&!empty($_POST['contact_number'])&&!empty($_POST['email'])&&!empty($_POST['dob'])&&!empty($_POST['str_address'])&&!empty($_POST['locality'])&&!empty($_POST['postcode'])&&!empty($_POST['id_card_number'])&&!empty($_POST['password']))
    {
            include 'functions.php';
            //$rand_salt=mt_rand(10000,99999999999);
            $password_hash=password_hash($password,PASSWORD_BCRYPT);
            $obj=new DB_ops;
            $obj->insertNewUser($fname,$surname,$contact_number,$id_card_number,$email,$str_address,$locality,$postcode,$dob,$password_hash);
            
    }
        else{echo "All fields need to be filled in";}
}


    

?>
<div class="registration_area">
    <div class="reg_form_area">
        <form action="" method="POST">
            <Label>First Name</label>
            <input type="text" name="fname" />
            
            <Label>Surname</label>
            <input type="text" name="surname" />

            <Label>contact_number</label>
            <input type="text" name="contact_number" />

            <Label>email</label>
            <input type="text" name="email" />

            <Label>Date of Birth</label>
            <input type="text" name="dob" />

            <Label>Street Address</label>
            <input type="text" name="str_address" />

            <Label>Locality</label>
            <input type="text" name="locality" />

            <Label>postcode</label>
            <input type="text" name="postcode" />

            <Label>ID Card number</label>
            <input type="text" name="id_card_number" />

            <label>password</label>
            <input type="password" name="password" />

            <input type="submit" name="submit"/>
        </form>
    </div>
</div>
</body>
</html>