<?php
class Hopdong{
    function __construct()
    {
        global $DB_HOPDONG;
        $this->table = $DB_HOPDONG;
    }

    //get row 
    public function getRow($id){
        $sql = "SELECT * FROM `$this->table`
        WHERE `id` = '{$id}' LIMIT 1";
        return db_get_row($sql);
    }

    //get List
    public function getList(){
        $sql = "SELECT * FROM `$this->table`
        ORDER BY `id` ASC"; 
        return db_get_list($sql);
    }

    //delete
    public function delete($id){
        $sql = "DELETE FROM `$this->table` 
        WHERE `id` = '{$id}' LIMIT 1";
        return db_execute($sql);
    }
}
?>