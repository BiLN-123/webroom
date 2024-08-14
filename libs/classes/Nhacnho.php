<?php
class Nhacnho{
    public $tb_nhacnho;

    function __construct()
    {
        global $DB_NHACNHO;
        $this->tb_nhacnho = $DB_NHACNHO;
    }

    // get row
    public function getRow($ma){
        $sql = "SELECT `phongtro_ma` FROM `$this->tb_nhacnho` WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        return db_get_row($sql);
    }


    // kiem tra va tao thong bao nhac nho
    public function listCommand(){
        global $start;
        global $limit;
        $time = date('Y-m-d', strtotime('+2 days'));
        $sql = "SELECT `id`, `phongtro_ma`, `message`, `ngaynhac` FROM `$this->tb_nhacnho`
        WHERE `ngaynhac` <= '$time' AND `ngaynhac` != '0000-00-00' AND `mode` = '0' ORDER BY `id` ASC";
        return db_get_list($sql);
    }

    // tao lenh nhac
    public function createCommand($ma, $time){
        $data = array(
            'phongtro_ma' => $ma,
            'message' => 'Thu tiền định kì',
            'ngaynhac' => $time,
            'mode' => '0'
        );
        db_insert($this->tb_nhacnho,$data);
    }
    // sua ngay nhac nho

    public function chinhsua($ma,$ngaythue){
        $sql = "UPDATE `$this->tb_nhacnho` SET `ngaynhac` = '$ngaythue' WHERE `phongtro_ma` = '{$ma}'";
        return db_execute($sql);
    }

    // update 30 days after create new order
    public function updateTime($ma){
        $sqlNhacnho = "SELECT `ngaynhac` FROM `$this->tb_nhacnho` WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        $row = db_get_row($sqlNhacnho);
        if($row){
            $effectiveDate = date('Y-m-d', strtotime("+1 months", strtotime($row['ngaynhac'])));
            $sql = "UPDATE `$this->tb_nhacnho` SET `ngaynhac` = '$effectiveDate' WHERE `phongtro_ma` = '{$ma}'";
            db_execute($sql);
        }
    }

    // edit ngay thue, sua thoi gian nhac neu thay doi ngay thue
    public function capnhatNgaythue($ma){
        $objPhongtro = new Phongtro();
        $phongtro = $objPhongtro->getRow($ma);
        $sqlNhacnho = "SELECT `ngaynhac` FROM `$this->tb_nhacnho` WHERE `phongtro_ma` = '{$ma}' LIMIT 1";
        $row = db_get_row($sqlNhacnho);
        if($row){
            $effectiveDate = date('Y-m-d', strtotime("+1 months", strtotime($phongtro['ngaythue'])));
            $sql = "UPDATE `$this->tb_nhacnho` SET `ngaynhac` = '$effectiveDate' WHERE `phongtro_ma` = '{$ma}'";
            db_execute($sql);
        }
    }

    // dem lenh nhac
    public function count(){
        global $DB_NHACNHO;
        $time = date('Y-m-d', strtotime('+2 days'));
        $sql = "SELECT `id` FROM `$DB_NHACNHO`
        WHERE `ngaynhac` <= '$time' AND `ngaynhac` != '0000-00-00' AND `mode` = '0'";
        return db_count_query($sql);
    }

    // bat tat lenh nhac
    public function mode($ma,$int){
        $nhacho = $this->getRow($ma);
        if($nhacho){
            $sql = "UPDATE `$this->tb_nhacnho` SET `mode` = '{$int}' WHERE `phongtro_ma` = '{$ma}'";
            return db_execute($sql);
        }
    }

}
?>