<?php

class Role{
    protected $permissions;

    protected function __construct(){

        $this->permission=array();
    }
    public static function getRolePerm($role_id){
        $role = new Role();
        $sql = "SELECT t2.perm_desc FROM role_perm as t1 JOIN permission as t2 on t1.perm_id = t2.perm_id WHERE t1.role_id = :role_id";
        $sth=$GLOBALS["DB"]->prepare($SQL);
    }
}

?>