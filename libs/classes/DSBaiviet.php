<?php
class DSBaiviet{
    public $table;

    function __construct()
    {
        global $DB_BAIVIET;
        $this->table = $DB_BAIVIET;
    }

    public function getList(){
        global $start;
        global $limit;
        $sql = "SELECT * FROM `$this->table`
        ORDER BY `id` DESC LIMIT $start, $limit";
        return db_get_list($sql);       
    }

    public function getListstatus(){
        global $start;
        global $limit;
        $sql = "SELECT * FROM `$this->table`
        WHERE `status` = '0'
        ORDER BY `id` DESC LIMIT $start, $limit";
        return db_get_list($sql);       
    }

    public function getRow($id){
        $sql = "SELECT * FROM `$this->table`
        WHERE `id` = '{$id}'";
        return db_get_row($sql);
    }
    public function delete($id){
        $sql = "DELETE FROM `$this->table`
        WHERE `id` = '{$id}' ";
        return db_execute($sql);
    }
    public function active($id){
        $sql = "SELECT `status`
                FROM `$this->table`
                WHERE `id` = '{$id}' LIMIT 1";
        $row = db_get_row($sql);
        if($row){
            if($row['status'] == 0){
                $data = array(
                    'status' => 1
                );
                db_update($this->table, $data, array('id' => $id));
            }
            else {
                $data = array(
                    'status' => '0'
                );
                db_update($this->table, $data, array('id' => $id));
            }
        }
    }
}
?>