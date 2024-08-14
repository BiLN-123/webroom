<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath . 'libs/core.php');
$data = array();
$id = isset($_POST['id']) ? abs(intval($_POST['id'])) : false;
if ($id) {
    $objHoadon = new Hoadon();
    if ($objHoadon->getRow($id)) {
        $sodiencu = $_POST['sodiencu'];
        $sodienmoi = $_POST['sodienmoi'];
        $giatiendien = $_POST['giatiendien'];
        $sonuoccu = $_POST['sonuoccu'];
        $sonuocmoi = $_POST['sonuocmoi'];
        $giatiennuoc = $_POST['giatiennuoc'];
        $tienphong = $_POST['tienphong'];
        $dichvu = $_POST['dichvu'];
        $ghichu = $_POST['ghichu'];
        $month = intval($_POST['month']);
        $year = intval($_POST['year']);
        // remove space and colon
        $sodiencu = trim(str_replace(",", "", $sodiencu));
        $sodiencu = preg_replace('/\s+/', '', $sodiencu);
        $sodienmoi = trim(str_replace(",", "", $sodienmoi));
        $sodienmoi = preg_replace('/\s+/', '', $sodienmoi);
        $giatiendien = trim(str_replace(",", "", $giatiendien));
        $giatiendien = preg_replace('/\s+/', '', $giatiendien);

        $sonuoccu = trim(str_replace(",", "", $sonuoccu));
        $sonuoccu = preg_replace('/\s+/', '', $sonuoccu);
        $sonuocmoi = trim(str_replace(",", "", $sonuocmoi));
        $sonuocmoi = preg_replace('/\s+/', '', $sonuocmoi);
        $giatiennuoc = trim(str_replace(",", "", $giatiennuoc));
        $giatiennuoc = preg_replace('/\s+/', '', $giatiennuoc);
        $tienphong = trim(str_replace(",", "", $tienphong));
        $tienphong = preg_replace('/\s+/', '', $tienphong);

        $dichvu = trim(str_replace(",", "", $dichvu));
        $dichvu = preg_replace('/\s+/', '', $dichvu);

        $ghichu = $ghichu;

        $data = array(
            'chisodiencu' => $sodiencu,
            'chisodienmoi' => $sodienmoi,
            'chisonuoccu' => $sonuoccu,
            'chisonuocmoi' => $sonuocmoi,
            'giaphong' => $tienphong,
            'giatiennuoc' => $giatiennuoc,
            'giatiendien' => $giatiendien,
            'ghichu' => $ghichu,
            'phidichvu' => $dichvu,
        );

        if (db_update($DB_HOADON, $data, array('hoadon_id' => $id))) {
            $hoadon = $objHoadon->getRow($id);
            $data['id'] = $hoadon['hoadon_id'];
            $data['chisodiencu'] = $hoadon['chisodiencu'];
            $data['chisodienmoi'] = $hoadon['chisodienmoi'];
            $data['dientieuthu'] = $hoadon['chisodienmoi'] - $hoadon['chisodiencu'];
            $data['chisonuoccu'] = $hoadon['chisonuoccu'];
            $data['chisonuocmoi'] = $hoadon['chisonuocmoi'];
            $data['nuoctieuthu'] = $hoadon['chisonuocmoi'] - $hoadon['chisonuoccu'];
            $data['giaphong'] = number_format($hoadon['giaphong']);
            $data['giatiennuoc'] = number_format($hoadon['giatiennuoc']);
            $data['giatiendien'] = number_format($hoadon['giatiendien']);
            $data['tongtiennuoc'] = number_format(($hoadon['chisonuocmoi'] - $hoadon['chisonuoccu']) * $hoadon['giatiennuoc']);
            $data['tongtiendien'] = number_format(($hoadon['chisodienmoi'] - $hoadon['chisodiencu']) * $hoadon['giatiendien']);
            $data['ghichu'] = $hoadon['ghichu'];
            $data['phidichvu'] = number_format($hoadon['phidichvu']);
            $data['tongcong'] = number_format($objHoadon->Tinhtien($hoadon['hoadon_id']));
            $objDichvu = new Dichvu();
            $dataNuoc = $objHoadon->sonuoc($month, $year);
            $dataDien = $objHoadon->sodien($month, $year);
            $data['sonuoc'] = $dataNuoc['sonuoc'];
            $data['sodien'] = $dataDien['sodien'];
            $data['tiendien'] = number_format($dataDien['sotiendien']);
            $data['tiennuoc'] = number_format($dataNuoc['sotiennuoc']);
            $data['doanhthu'] = $objHoadon->doanhthu($month, $year);
            // update dien nuoc phong tro
            Phongtro::updateDienNuoc($hoadon['chisodienmoi'], $hoadon['chisonuocmoi'], $hoadon['phongtro_ma']);
        }
    }
}
die(json_encode($data));
