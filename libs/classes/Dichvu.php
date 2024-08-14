<?php
class Dichvu
{
    public $table;

    function __construct()
    {
        global $DB_HOADON;
        $this->table = $DB_HOADON;
    }

    // list ghi dien
    public function ghidien($month, $year)
    {
        global $start;
        global $limit;
        $sql = "SELECT `hoadon_id`,`phongtro_ma`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,`giaphong`,
        `giatiennuoc`,`giatiendien`,`giatienrac`,`ghichu`,`nguoitao`,`ngaytao`,`phidichvu`,`trangthai`,`tienno` 
                FROM `$this->table`
                WHERE MONTH(`ngaytao`) = '$month' AND YEAR(`ngaytao`) = '$year' ORDER BY `phongtro_ma` ASC LIMIT 1000";
        return db_get_list($sql);
    }

    // trang thai thu tien
    public function trangthai($id)
    {
        $sql = "SELECT `trangthai`,`phongtro_ma`,`dathu` 
                FROM `$this->table` 
                WHERE `hoadon_id` = '{$id}' LIMIT 1";
        $row = db_get_row($sql);
        if ($row) {
            if ($row['trangthai'] == 0) {
                $data = array(
                    'trangthai' => '1',
                    'dathu' => '1'
                );
                if ($row['dathu'] == 0) {
                    $objNhacnho = new Nhacnho();
                    $objNhacnho->updateTime($row['phongtro_ma']);
                }
                db_update($this->table, $data, array('hoadon_id' => $id));
            } else {
                $data = array(
                    'trangthai' => '0'
                );
                db_update($this->table, $data, array('hoadon_id' => $id));
            }
        }
    }

    // tao phieu thang moi
    public function ghithangmoi()
    {
        global $DB_PHONGTRO;
        global $user_id;
        $month = date("m");
        $year = date("Y");
        $sql = "SELECT `phongtro_ma`, `chisodien`, `chisonuoc`, `giaphong`, `chiphikhac` FROM `$DB_PHONGTRO`";
        $rows = db_get_list($sql);
        $objSetting = new Setting();
        $st = $objSetting->getRow();
        foreach ($rows as $row) { // lặp qua các phòng
            $gethoadoncu = "SELECT `chisodienmoi`,`chisonuocmoi` FROM `$this->table` WHERE `phongtro_ma` = '".$row['phongtro_ma']."' ORDER BY `hoadon_id` DESC LIMIT 1";
            $doncu = db_get_row($gethoadoncu); // lay don cũ
            $sqlCheck = "SELECT `hoadon_id` FROM `$this->table` WHERE `phongtro_ma` = '" . $row['phongtro_ma'] . "' 
            AND MONTH(`ngaytao`) = '{$month}' AND YEAR(`ngaytao`) = '{$year}'";
            $hoadon = db_get_row($sqlCheck);
            if (!$hoadon) {
                if($doncu){
                    $data = array(
                        'phongtro_ma' => $row['phongtro_ma'],
                        'chisodiencu' => $doncu['chisodienmoi'],
                        'chisonuoccu' => $doncu['chisonuocmoi'],
                        'chisodienmoi' => $doncu['chisodienmoi'],
                        'chisonuocmoi' => $doncu['chisonuocmoi'],
                        'giaphong' => $row['giaphong'],
                        'giatiennuoc' => $st['tiennuoc'],
                        'giatiendien' => $st['tiendien'],
                        'giatienrac' => $st['tienrac'],
                        'phidichvu' => $row['chiphikhac'],
                        'ghichu' => '',
                        'nguoitao' => $user_id,
                        'trangthai' => '0',
                        'dathu' => '0',
                        'tienno' => $doncu['tienno'],
                        'ngaytao' => date('Y-m-d H:m:s')
                    );
                }
                else{
                    $data = array(
                        'phongtro_ma' => $row['phongtro_ma'],
                        'chisodiencu' => $row['chisodien'],
                        'chisonuoccu' => $row['chisonuoc'],
                        'chisodienmoi' => $row['chisodien'],
                        'chisonuocmoi' => $row['chisonuoc'],
                        'giaphong' => $row['giaphong'],
                        'giatiennuoc' => $st['tiennuoc'],
                        'giatiendien' => $st['tiendien'],
                        'giatienrac' => $st['tienrac'],
                        'phidichvu' => $row['chiphikhac'],
                        'ghichu' => '',
                        'nguoitao' => $user_id,
                        'trangthai' => '0',
                        'dathu' => '0',
                        'tienno' => '0',
                        'ngaytao' => date('Y-m-d H:m:s')
                    );
                }
                db_insert($this->table, $data);
            }
        }
    }

    /// get month of year
    public function getMonthofYear($year = 0)
    {
        if ($year == 0) {
            $year = date("Y");
        }
        $sql = "SELECT MONTH(`ngaytao`) as 'month' FROM `$this->table`
        WHERE YEAR(`ngaytao`) = '$year'
        GROUP BY MONTH(`ngaytao`) ORDER BY MONTH(`ngaytao`) DESC";
        return db_get_list($sql);
    }

    // get list year
    public function getListYears()
    {
        $sql = "SELECT YEAR(`ngaytao`) as 'year' FROM `$this->table`
        GROUP BY YEAR(`ngaytao`) ORDER BY YEAR(`ngaytao`) DESC";
        return db_get_list($sql);
    }

    // tao phieu cho thang sau
    public function ghithangsau()
    {
        global $DB_PHONGTRO;
        global $user_id;
        $month = date("m")+1;
        $year = date("Y");
        $sql = "SELECT `phongtro_ma`, `chisodien`, `chisonuoc`, `giaphong`, `chiphikhac` FROM `$DB_PHONGTRO`";
        $rows = db_get_list($sql);
        $objSetting = new Setting();
        $st = $objSetting->getRow();
        foreach ($rows as $row) {
            $gethoadoncu = "SELECT `chisodienmoi`,`chisonuocmoi`,`tienno` FROM `$this->table` WHERE `phongtro_ma` = '".$row['phongtro_ma']."' ORDER BY `hoadon_id` DESC LIMIT 1";
            $doncu = db_get_row($gethoadoncu);
            $sqlCheck = "SELECT `hoadon_id` FROM `$this->table` WHERE `phongtro_ma` = '" . $row['phongtro_ma'] . "' 
            AND MONTH(`ngaytao`) = '{$month}' AND YEAR(`ngaytao`) = '{$year}'";
            $hoadon = db_get_row($sqlCheck);
            if (!$hoadon) { // neu chua co thi tao mới
                if($doncu){
                    $data = array( // nếu có đơn cũ
                        'phongtro_ma' => $row['phongtro_ma'],
                        'chisodiencu' => $doncu['chisodienmoi'],
                        'chisonuoccu' => $doncu['chisonuocmoi'],
                        'chisodienmoi' => $doncu['chisodienmoi'],
                        'chisonuocmoi' => $doncu['chisonuocmoi'],
                        'giaphong' => $row['giaphong'],
                        'giatiennuoc' => $st['tiennuoc'],
                        'giatiendien' => $st['tiendien'],
                        'giatienrac' => $st['tienrac'],
                        'phidichvu' => $row['chiphikhac'],
                        'ghichu' => '',
                        'nguoitao' => $user_id,
                        'trangthai' => '0',
                        'dathu' => '0',
                        'tienno' => $doncu['tienno'],
                        'ngaytao' => date('Y-m-d H:m:s',strtotime("+1 month"))
                    );
                }
                else{
                    $data = array(
                        'phongtro_ma' => $row['phongtro_ma'],
                        'chisodiencu' => $row['chisodien'],
                        'chisonuoccu' => $row['chisonuoc'],
                        'chisodienmoi' => $row['chisodien'],
                        'chisonuocmoi' => $row['chisonuoc'],
                        'giaphong' => $row['giaphong'],
                        'giatiennuoc' => $st['tiennuoc'],
                        'giatiendien' => $st['tiendien'],
                        'giatienrac' => $st['tienrac'],
                        'phidichvu' => $row['chiphikhac'],
                        'ghichu' => '',
                        'nguoitao' => $user_id,
                        'trangthai' => '0',
                        'dathu' => '0',
                        'tienno' => '0',
                        'ngaytao' => date('Y-m-d H:m:s',strtotime("+1 month"))
                    );
                }
                db_insert($this->table, $data);
            }
            // end if neu chua co don
        }
    }

    // nếu chỉnh sửa đơn cũ thì cập nhật vào đơn mới
    public function updateOrder($order_id,$chisodienmoi,$chisonuocmoi){
        $oldOrder = new Hoadon();
        $old = $oldOrder->getRow($order_id);
        $sql = "SELECT `hoadon_id`, `ngaytao` FROM `$this->table` WHERE `phongtro_ma` = '".$old['phongtro_ma']."'
        AND `hoadon_id` > '".$old['hoadon_id']."' AND `ngaytao` > '".$old['ngaytao']."' ORDER BY `hoadon_id` ASC LIMIT 1";
        $row = db_get_row($sql);
       if($row){
           $data = array(
            'chisodiencu' => $chisodienmoi,
            'chisonuoccu' => $chisonuocmoi
           );
           db_update($this->table,$data,array('hoadon_id' => $row['hoadon_id']));
       }
    }

}
