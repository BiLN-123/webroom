<?php
class Hoadon{
    public $table;
    public $table_phongtro;

    function __construct()
    {
        global $DB_HOADON;
        global $DB_PHONGTRO;
        $this->table = $DB_HOADON;
        $this->table_phongtro = $DB_PHONGTRO;
    }

    // get row
    public function getRow($id){
        $sql = "SELECT `hoadon_id`,`phongtro_ma`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,`giaphong`,
        `giatiennuoc`,`giatiendien`, `giatienrac` ,`ghichu`,`nguoitao`,`ngaytao`,`phidichvu`,`tienno` FROM `$this->table` WHERE `hoadon_id` = '{$id}' LIMIT 1";
        return db_get_row($sql);
    }

    // get row 1
    public function getRowtinhtien($id){
        $sql = "SELECT `hoadon_id`, h.`phongtro_ma`, `chisonuoccu`, `chisonuocmoi`, `chisodiencu`, `chisodienmoi`, h.`giaphong`,
        `giatiennuoc`, `giatiendien`, `ghichu`, `nguoitao`, h.`ngaytao`, `phidichvu`, `tienno`, `giatienrac`
        FROM `$this->table` h JOIN `$this->table_phongtro` p
        ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE p.`trangthai` = 1 AND `hoadon_id` = '{$id}' LIMIT 1";
        return db_get_row($sql);
    }

    // get list in room
    public function getList($ma){
        global $start;
        global $limit;
        $ma = Generic::secure($ma);
        $sql = "SELECT `hoadon_id`,`phongtro_ma`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,`giaphong`, `giatienrac`,
        `giatiennuoc`,`giatiendien`,`ghichu`,`nguoitao`,`ngaytao`,`phidichvu`,`tienno`, `trangthai` FROM `$this->table`
         WHERE `phongtro_ma` = '{$ma}' AND `giaphong` > '0' ORDER BY `hoadon_id` DESC LIMIT $start,$limit";
        return db_get_list($sql);
    }

    //phia user
    public function getListUser($ma){
        global $start;
        global $limit;
        $ma = Generic::secure($ma);
        $sql = "SELECT `hoadon_id`,`phongtro_ma`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,`giaphong`, `giatienrac`,
        `giatiennuoc`,`giatiendien`,`ghichu`,`nguoitao`,`ngaytao`,`phidichvu`,`tienno`, `trangthai` FROM `$this->table`
         WHERE `phongtro_ma` = '{$ma}' AND `status` = 1 ORDER BY `hoadon_id` DESC LIMIT $start,$limit";
        return db_get_list($sql);
    }

    // get all
    public function getAll($type = 0){
        global $start;
        global $limit;
        global $month;
        global $year;

        $sql = "";
        if($type == 0){
            $sql = "SELECT `hoadon_id`,p.`phongtro_ma`,p.`tenphongtro`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,h.`giaphong`,
        `giatiennuoc`,`giatiendien`,`ghichu`,`nguoitao`,h.`ngaytao`,`phidichvu`, `giatienrac` FROM `$this->table` h
        INNER JOIN `$this->table_phongtro` p ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE h.`giaphong` > '0'
        ORDER BY `hoadon_id` ASC LIMIT $start,$limit";
        }
        else{
            $sql = "SELECT `hoadon_id`,p.`phongtro_ma`,p.`tenphongtro`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,h.`giaphong`,
        `giatiennuoc`,`giatiendien`,`ghichu`,`nguoitao`,h.`ngaytao`,`phidichvu`, `giatienrac` FROM `$this->table` h
        INNER JOIN `$this->table_phongtro` p ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE h.`giaphong` > '0' AND MONTH(h.`ngaytao`) = '{$month}' AND YEAR(h.`ngaytao`) = '$year' 
        ORDER BY `hoadon_id` ASC LIMIT $start,$limit";
        }
        return db_get_list($sql);
    }

    public function getAllhd($type = 0){
        global $start;
        global $limit;
        global $month;
        global $year;

        $sql = "";
        if($type == 0){
            $sql = "SELECT `hoadon_id`,p.`phongtro_ma`,p.`tenphongtro`, p.`ngaythue`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,h.`giaphong`,
        `giatiennuoc`,`giatiendien`,`ghichu`,`nguoitao`,h.`ngaytao`,`phidichvu`, h.`trangthai`, h.`status` FROM `$this->table` h
        INNER JOIN `$this->table_phongtro` p ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE h.`giaphong` > '0' AND h.`trangthai` = '0'
        ORDER BY `hoadon_id` DESC LIMIT $start,$limit";
        }
        else{
            $sql = "SELECT `hoadon_id`,p.`phongtro_ma`,p.`tenphongtro`, p.`ngaythue`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,h.`giaphong`,
        `giatiennuoc`,`giatiendien`,`ghichu`,`nguoitao`,h.`ngaytao`,`phidichvu`, h.`trangthai`, h.`status` FROM `$this->table` h
        INNER JOIN `$this->table_phongtro` p ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE h.`giaphong` > '0' AND h.`trangthai` = '0' AND MONTH(h.`ngaytao`) = '{$month}' AND YEAR(h.`ngaytao`) = '$year' 
        ORDER BY DAY(p.`ngaythue`) ASC LIMIT $start,$limit";
        }
        return db_get_list($sql);
    }

    // delete
    public function delete($id){
        $sql = "DELETE FROM `$this->table` WHERE `hoadon_id` = '{$id}' LIMIT 1";
        return db_execute($sql);
    }
    // delete all
    public function deleteAll($month,$year){
        $sql = "DELETE FROM `$this->table` WHERE YEAR(`ngaytao`) = '$year' AND MONTH(`ngaytao`) = '$month'";
        return db_execute($sql);
    }

    // kiem tra xem thang nay da tao hoa don chua
    public function checkIfExists($ma){
        $year = date("Y");
        $month = date("m");
        $sql = "SELECT `hoadon_id` FROM `$this->table` WHERE YEAR(`ngaytao`) = '$year' AND MONTH(`ngaytao`) = '$month'
        AND `phongtro_ma` = '{$ma}' LIMIT 1";
        $row = db_get_row($sql);
        if($row){
            return true;
        }
        else{
            return false;
        }
    }

    // get month and year
    public function getSelect(){
        $year = date("Y");
        $sql = "SELECT MONTH(`ngaytao`) as 'month', YEAR(`ngaytao`) as 'year' FROM `$this->table`
        WHERE YEAR(`ngaytao`) = '$year'
        GROUP BY MONTH(`ngaytao`), YEAR(`ngaytao`)
        ORDER BY `ngaytao` DESC";
        return db_get_list($sql);
    }


    /// thong ke doanh thu
    public function thongke(){
        global $start;
        global $limit;
        $sql = "SELECT MONTH(`ngaytao`) as 'month', YEAR(`ngaytao`) as 'year' FROM `$this->table`
        GROUP BY MONTH(`ngaytao`), YEAR(`ngaytao`)
        ORDER BY `ngaytao` DESC LIMIT $start,$limit";
        return db_get_list($sql);
    }

    public function thongke1(){
        global $start;
        global $limit;
        $sql = "SELECT MONTH(`ngaytao`) as 'month', YEAR(`ngaytao`) as 'year' FROM `$this->table`
        GROUP BY MONTH(`ngaytao`), YEAR(`ngaytao`)
        ORDER BY `ngaytao` DESC ";
        return db_get_list($sql);
    }

    // tinh so tien trong thang
    public function doanhthu($month,$year){
        $total = 0;
        $sql = "SELECT `hoadon_id` FROM `$this->table` WHERE MONTH(`ngaytao`) = '$month' AND YEAR(`ngaytao`) = '$year'";
        $list = db_get_list($sql);
        foreach($list as $item){
            $total += $this->Tinhtien($item['hoadon_id']);
        }
        return number_format($total);
    }

    // tinh so nuoc va tien
    public function sonuoc($month,$year){
        $total = 0;
        $nuocdung = 0;
        $data = array();
        $sql = "SELECT `chisonuoccu`,`chisonuocmoi`,`giatiennuoc`
        FROM `$this->table` h JOIN `$this->table_phongtro` p 
        ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE MONTH(h.`ngaytao`) = '$month' AND YEAR(h.`ngaytao`) = '$year' AND p.`trangthai` =  1";
        $rows = db_get_list($sql);
        foreach($rows as $row){
            $nuocdung += ($row['chisonuocmoi'] - $row['chisonuoccu']);
            $total += ($row['chisonuocmoi'] - $row['chisonuoccu']) * $row['giatiennuoc'];
        }
        $data['sonuoc'] = $nuocdung;
        $data['sotiennuoc'] = $total;
        return $data;
    }

    // tinh so dien va tien
    public function sodien($month,$year){
        $total = 0;
        $nuocdung = 0;
        $data = array();
        $sql = "SELECT `chisodiencu`,`chisodienmoi`,`giatiendien`
        FROM `$this->table` h JOIN `$this->table_phongtro` p 
        ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE MONTH(h.`ngaytao`) = '$month' AND YEAR(h.`ngaytao`) = '$year' AND p.`trangthai` =  1";
        $rows = db_get_list($sql);
        foreach($rows as $row){
            $nuocdung += ($row['chisodienmoi'] - $row['chisodiencu']);
            $total += ($row['chisodienmoi'] - $row['chisodiencu']) * $row['giatiendien'];
        }
        $data['sodien'] = $nuocdung;
        $data['sotiendien'] = $total;
        return $data;
    }
    //tính số tiền rác
    public function tienrrac($month, $year){
        $sql = "SELECT SUM(h.`giatienrac`) as'giaatienrac' FROM `$this->table` h JOIN `$this->table_phongtro` p
        ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE MONTH(h.`ngaytao`) = '$month' AND YEAR(h.`ngaytao`) = '$year' AND p.`trangthai` =  1";
        $row = db_get_row($sql);
        $data = array(
            'giarac' => number_format($row['giaatienrac'])
        );
        return $data;
    }

    // tien phong
    public function tienphong($month,$year){
        $sql = "SELECT SUM(h.`giaphong`) as 'tongphong', SUM(h.`phidichvu`) as 'dichvu', SUM(h.`tienno`) as 'tienno' 
        FROM `$this->table` h JOIN `$this->table_phongtro` p
        ON h.`phongtro_ma` = p.`phongtro_ma`
        WHERE MONTH(h.`ngaytao`) = '$month' AND YEAR(h.`ngaytao`) = '$year' AND p.`trangthai` =  1 ";
        $row = db_get_row($sql);
        $data = array(
            'tongtien' => number_format($row['tongphong']),
            'dichvu' => number_format($row['dichvu']),
            'tienno' => number_format($row['tienno'])
        );
        return $data;
    }
    

    // thong ke phong da thu va chua thu
    public function trangthai($month,$year,$status){
        $sql = "SELECT `hoadon_id` FROM `$this->table`
        WHERE MONTH(`ngaytao`) = '$month' AND YEAR(`ngaytao`) = '$year' AND `trangthai` = '{$status}'";
        return db_count_query($sql);
    }

    // tinh tong so tien
    public function tongdoanhthu(){
        $total = 0;
        $sql = "SELECT `hoadon_id` FROM `$this->table`";
        $list = db_get_list($sql);
        foreach($list as $item){
            $total += $this->Tinhtien($item['hoadon_id']);
        }
        return number_format($total);
    }
    
        // tinh tien
        public function Tinhtien($id) {
            $hoadon = $this->getRow($id);
            $sonuocdung = $hoadon['chisonuocmoi'] - $hoadon['chisonuoccu'];
            $sodiendung = $hoadon['chisodienmoi'] - $hoadon['chisodiencu'];
            $tongtienNuoc = ($sonuocdung * $hoadon['giatiennuoc']);
            $tongtienDien = ($sodiendung * $hoadon['giatiendien']);
            $tongthanhtoan = $tongtienNuoc + $tongtienDien + $hoadon['giaphong'] + $hoadon['phidichvu'] + $hoadon['giatienrac'] + $hoadon['tienno'];
            return $tongthanhtoan;
        }


        public function Tinhtienltn($id) {
            $hoadon = $this->getRowtinhtien($id);
            $sonuocdung = $hoadon['chisonuocmoi'] - $hoadon['chisonuoccu'];
            $sodiendung = $hoadon['chisodienmoi'] - $hoadon['chisodiencu'];
            $tongtienNuoc = ($sonuocdung * $hoadon['giatiennuoc']);
            $tongtienDien = ($sodiendung * $hoadon['giatiendien']);
            $tongthanhtoan = $tongtienNuoc + $tongtienDien + $hoadon['giaphong'] + $hoadon['phidichvu'] + $hoadon['giatienrac'] + $hoadon['tienno'];
            return $tongthanhtoan;
        }


        public function active($id){
            $sql = "SELECT `status`
                    FROM `$this->table`
                    WHERE `hoadon_id` = '{$id}' LIMIT 1";
            $row = db_get_row($sql);
            if($row){
                if($row['status'] == 0){
                    $data = array(
                        'status' => 1
                    );
                    db_update($this->table, $data, array('hoadon_id' => $id));
                }
                else {
                    $data = array(
                        'status' => '0'
                    );
                    db_update($this->table, $data, array('hoadon_id' => $id));
                }
            }
        }
}
?>

