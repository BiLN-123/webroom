<?php
class Phongtro{

    public $table;

    function __construct()
    {
        global $DB_PHONGTRO;
        $this->table = $DB_PHONGTRO;
    }

    // get row
    public function getRow($ma){
        $ma = Generic::secure($ma);
        $sql = "SELECT `phongtro_ma`,`tenphongtro`,`chisodien`,`chisonuoc`, `ngaythue`,
        `thongtin`,`giaphong`,`chiphikhac`,`tiencoc`,`trangthai`,`ngaytao` FROM `$this->table`
        WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        return db_get_row($sql);
    }

    public function getListMa(){
        global $start;
        global $limit;
        $sql = "SELECT `phongtro_ma`
        FROM $this->table
        ORDER BY `phongtro_ma` ASC LIMIT $start,$limit";
        return db_get_list($sql);
    }

    public function getRow1($mma){
        $mma = Generic::secure($mma);
        $sql = "SELECT `phongtro_ma`, `tenphongtro`, `giaphong`, `chisodien`,`chisonuoc`, `ngaythue`,
        `chiphikhac`, `thongtin`, `tiencoc`, `trangthai`, `ngaytao` FROM `$this->table`
        WHERE `trangthai` = '1' AND `phongtro_ma` = '{$mma}' LIMIT 1";
        return db_get_row($sql);
    }

    // get list
    public function getList($type = 0){
        global $start;
        global $limit;
        $sql = "";
        if($type == 0){
            $sql = "SELECT `phongtro_ma`,`tenphongtro`,`trangthai`, `thongtin` FROM `$this->table`
        ORDER BY `tenphongtro` ASC LIMIT $start,$limit";
        }
        else if($type == 1){
            $sql = "SELECT `phongtro_ma`,`tenphongtro`,`trangthai`, `thongtin` FROM `$this->table`
            WHERE `trangthai` = '0'
        ORDER BY `tenphongtro` ASC LIMIT $start,$limit";
        }
        else if($type == 2){
            $sql = "SELECT `phongtro_ma`,`tenphongtro`,`trangthai`, `thongtin` FROM `$this->table`
            WHERE `trangthai` = '1'
        ORDER BY `tenphongtro` ASC LIMIT $start,$limit";
        }
        else{
            $sql = "SELECT `phongtro_ma`,`tenphongtro`,`trangthai`, `thongtin` FROM `$this->table`
        ORDER BY `tenphongtro` ASC LIMIT $start,$limit";
        }
        return db_get_list($sql);
    }

    public function getListStt(){
        global $start;
        global $limit;
        $sql = "SELECT * FROM `$this->table`
        ORDER BY `tenphongtro` ASC LIMIT $start, $limit";
        return db_get_list($sql);       
    }

    public function getListStt1(){
        global $start;
        global $limit;
        $sql = "SELECT * FROM `$this->table`
        WHERE `status` = '0'
        ORDER BY `tenphongtro` ASC LIMIT $start, $limit";
        return db_get_list($sql);       
    }

    // check if exists 
    static function checkMa($code){
        global $DB_PHONGTRO;
        return db_count($DB_PHONGTRO,'phongtro_ma',array('phongtro_ma' => $code));
    }

    /// status
    static function status($int){
        if($int == 0){
            echo '<span class="text-danger bold">Trống</span>';
        }
        else if($int == 1){
            echo '<span class="text-success bold">Đang cho thuê</span>';
        }
        else{
            echo '<span class="bold">N/A</span>';
        }
    }

    // cap nhat chi so moi
    static function updateDienNuoc($dien,$nuoc,$ma){
        global $DB_PHONGTRO;
        $sql = "UPDATE `$DB_PHONGTRO` SET `chisodien` = '$dien', `chisonuoc` = '$nuoc'
        WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        return db_execute($sql);

    }

    // delete
    public function delete($ma){
        $sql = "DELETE FROM `$this->table` WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        return db_execute($sql);
    }

    //update hiển thị với người xem
    public function active($ma){
        $sql = "SELECT `status`
                FROM `$this->table`
                WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        $row = db_get_row($sql);
        if($row){
            if($row['status'] == 0){
                $data = array(
                    'status' => 1
                );
                db_update($this->table, $data, array('phongtro_ma' => $ma));
            }
            else {
                $data = array(
                    'status' => '0'
                );
                db_update($this->table, $data, array('phongtro_ma' => $ma));
            }
        }
    }
}
?>