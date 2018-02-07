<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'train');


class DB_con{
 public function __construct(){
        $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        $this->dbh=$con;
        // Check connection
        if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    
    public function insert($fname,$surname,$city)
    {
            $sql="INSERT INTO users(fname,surname,city) VALUES('$fname','$surname','$city')";
            $res = mysqli_query($this->dbh,$sql);
            return ($res);
        
    }
}
?>