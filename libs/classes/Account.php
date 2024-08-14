<?php
class Account{
    public $table;
    public $table_follow;
    public $account_id = '';


    public function __construct()
    {
        // call global variables
        global $DB_ACCOUNT;
        // set value
        $this->table = $DB_ACCOUNT;
    }


    // get info of account
    public function getRow($id){
        $id = Generic::secure($id);
        $sql = "SELECT `account_id`,`username`,`fullname`
        FROM `$this->table` WHERE `account_id` = '{$id}' LIMIT 1";
        return db_get_row($sql);
    }
    // check if user exists
    public function checkIfExists($username){
        $username = Generic::secure($username);
        return db_count($this->table,'account_id',array('username' => $username));
    }
    // sử dụng để không cho login 
    // WHERE `role` = '0' AND `username` = '{$username}' LIMIT 1";
    public function checkLogin($username,$password){
        $username = Generic::secure($username);
        $password = Generic::secure($password);
        $sql = "SELECT `account_id`,`username`,`password` FROM `$this->table` 
        WHERE `role` = '0' AND `username` = '{$username}' LIMIT 1";
        $row = db_get_row($sql);
        if(password_verify($password,$row['password']) == false){
            return false;
        }
        $this->account_id = $row['account_id'];
        return true;
    }

}
?>
