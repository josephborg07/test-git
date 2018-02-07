<?php

class BankAccount{
    public $balance=3500;

    public function DisplayBalance(){
        return $this->balance;
    }
}

$joe=new BankAccount;
echo $joe->balance;
?>