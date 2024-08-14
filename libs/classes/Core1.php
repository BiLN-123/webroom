<?php
class Core1{
    public static $nguoithue_id = false;
    public static $get_user = array();

    function __construct(){
        $this->authorize();
    }
    // login
    private function authorize(){
        $nguoithue_id = false;
        if(isset($_SESSION['uid'])){
            $nguoithue_id = $_SESSION['uid'];
        }
        if($nguoithue_id){
            $sql = "SELECT * FROM `db_tknguoithue` WHERE `nguoithue_id` = '{$nguoithue_id}' LIMIT 1";
            if(db_get_row($sql)){
                $row = db_get_row($sql);
                self::$nguoithue_id = $row['nguoithue_id'];
                self::$get_user = $row;
            }
        }
        else{
            $this->user_unset();
        }
    }
    // unset
    private function user_unset(){
        self::$nguoithue_id = false;
        self::$get_user = false;
        unset($_SESSION['uid']);
    }
}
?>