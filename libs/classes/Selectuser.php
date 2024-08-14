<?php
class Selectuser{
    public $table;

    function __construct()
    {
        global $DB_ACCOUNT_USER;
        $this->table = $DB_ACCOUNT_USER;
    }
    // get list 
    public function getList($ma){
        $sql = "SELECT `nguoithue_id`, `hoten`, `email`, `phongtro_ma`, `role`
        FROM `$this->table`
        WHERE `phongtro_ma` = '{$ma}'";
        return db_get_list($sql);
    }
    //getrowRCV
    public function getRowRecover($email){
        $sql = "SELECT * FROM `$this->table` 
        WHERE `email` = '{$email}'";
        return db_get_list($sql);
    }
    public function checkIfExists($email){
        $email = Generic::secure($email);
        return db_count($this->table, 'nguoithue_id', array('email' => $email));
    }
    public function getRowPT($ma){
        $ma = Generic::secure($ma);
        $sql = "SELECT `phongtro_ma`,`nguoithue_id`,`hoten`,`email`,
        `phongtro_ma`
        FROM `$this->table`
        WHERE `phongtro_ma` = '$ma' LIMIT 1";
        return db_get_row($sql);
    }
    //get row
    public function getRow($id){
        $sql = "SELECT `nguoithue_id`, `hoten`, `email`, `phongtro_ma`, `role`
        FROM `$this->table`
        WHERE `nguoithue_id` = '{$id}'";
        return db_get_row($sql);
    }
    public function getRowPhong($ma){
        $ma = Generic::secure($ma);
        $sql = "SELECT `nguoithue_id`, `hoten`, `email`, `phongtro_ma`, `role`
        FROM `$this->table`
        WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        return db_get_row($sql);
    }
    public function getListAC(){
        global $start;
        global $limit;
        $sql = "SELECT `nguoithue_id`, `hoten`, `email`, `phongtro_ma`, `role`
        FROM `$this->table`
        ORDER BY `hoten` DESC LIMIT $start,$limit";
        return db_get_list($sql);
    }

    //delete
    public function delete($id){
        $sql = "DELETE FROM `$this->table`
                WHERE `nguoithue_id` = '{$id}' ";
        return db_execute($sql);
    }
    //trạng thái active và none active
    public function active($id){
        $sql = "SELECT `role`
                FROM `$this->table`
                WHERE `nguoithue_id` = '{$id}' LIMIT 1";
        $row = db_get_row($sql);
        if($row){
            if($row['role'] == 0){
                $data = array(
                    'role' => 1
                );
                db_update($this->table, $data, array('nguoithue_id' => $id));
            }
            else {
                $data = array(
                    'role' => '0'
                );
                db_update($this->table, $data, array('nguoithue_id' => $id));
            }
        }
    }

}
?>