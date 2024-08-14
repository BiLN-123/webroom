<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath . 'libs/core.php');
$data = array();
$objHoadon = new Hoadon();
$objNguoio = new Nguoio();
if($ma){
    $phongtro = new Phongtro();
    $objPhongtro = $phongtro->getRow($ma);
    if($objPhongtro){
        $data['phongtro'] = $objPhongtro;
        $data['phongtro']['songuoio'] = $objNguoio->count($ma);
        $order = "SELECT `hoadon_id`,`chisonuoccu`,`chisonuocmoi`,`chisodiencu`,`chisodienmoi`,`giaphong`,`giatiennuoc`,
        `giatiendien`,`ngaytao`,`phidichvu`,`tienno` FROM `$DB_HOADON` WHERE `phongtro_ma` = '{$ma}' ORDER BY `phongtro_ma` DESC LIMIT 1,1";
        $hoadon = db_get_row($order);
        $data['hoadon'] = $hoadon;
        $data['hoadon']['tongtien'] = number_format($objHoadon->Tinhtien($hoadon['hoadon_id']));
        $data['hoadon']['thangghi'] = "Hóa đơn tháng ".date("m/Y", strtotime($hoadon['ngaytao']));
    }
}
die(json_encode($data));
?>