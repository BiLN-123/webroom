<?php
class Accountuser{
    public $table;
    public $table_follow;
    public $nguoithue_id = '';


    function __construct()
    {
        global $DB_ACCOUNT_USER;
        $this->table = $DB_ACCOUNT_USER;
    }

    //get info account
    public function getRow($id){
        $id = Generic::secure($id);
        $sql = "SELECT `nguoithue_id`, `email`, `hoten`
        FROM `$this->table` WHERE `nguoithue_id` = '{$id}' LIMIT 1";
        return db_get_row($sql);
    }
    // check if user exists
    public function checkIfExists($username){
        $username = Generic::secure($username);
        return db_count($this->table, 'nguoithue_id', array('email' => $username));
    }
    // check login(kiểm tra login)
    public function checkLogin($username, $password){
        $username = Generic::secure($username);
        $password = Generic::secure($password);
        $sql = "SELECT `nguoithue_id`, `email`, `password`
        FROM `$this->table` 
        WHERE `role` = '0' AND `email` = '{$username}' LIMIT 1";
        $row = db_get_row($sql);
        if(password_verify($password, $row['password']) == false){
            return false;
        }
        $this -> nguoithue_id = $row['nguoithue_id'];
        return true;
    }
    

}
?>