<?php
class Setting{
    public $table;

    function __construct()
    {
        global $DB_SETTING;
        $this->table = $DB_SETTING;
    }

    // get Row
    public function getRow(){
        $sql = "SELECT `setting_id`,`tiendien`,`tiennuoc`,`tienrac`,`caidatphong` FROM `$this->table` ORDER BY `setting_id` ASC LIMIT 1";
        return db_get_row($sql);
    }
}
?>