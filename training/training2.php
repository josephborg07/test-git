<?php

class myClass{
    public $prop="This is a new property";
    
    public function __construct(){
        echo "The class, " . __CLASS__ ." has been initiated.<br />";
    }

    public function __destruct(){
        echo "The class ".__class__." is now destroyed. <br />"; 
    }

    public function GetValue(){
        return $this->prop."<br />";
    }

    public function SetNewVal($NewVal){
        $this->prop=$NewVal;
    }
}

$NewObject=new myClass;
echo $NewObject->prop."<br />";
unset($NewObject);
echo "End of file.";
?>