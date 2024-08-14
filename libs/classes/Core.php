<?php
class Core{
    public static $account_id = false;
    public static $get_user = array();

    function __construct(){
        $this->authorize();
    }
    // login
    private function authorize(){
        $account_id = false;
        if(isset($_SESSION['uid'])){
            $account_id = $_SESSION['uid'];
        }
        if($account_id){
            $sql = "SELECT * FROM `db_account` WHERE `account_id` = '{$account_id}' LIMIT 1";
            if(db_get_row($sql)){
                $row = db_get_row($sql);
                self::$account_id = $row['account_id'];
                self::$get_user = $row;
            }
        }
        else{
            $this->user_unset();
        }
    }
    // unset
    private function user_unset(){
        self::$account_id = false;
        self::$get_user = false;
        unset($_SESSION['uid']);
    }
}
?>