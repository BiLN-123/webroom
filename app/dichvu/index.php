<?php
error_reporting(0);
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath . 'libs/core.php');
$objHoadon = new Hoadon();
$i = 1;
$objDichvu = new Dichvu();
$objDichvu->ghithangmoi();
// check if new month
$afterMonth = date("m")+1;
if($month == $afterMonth){
    $objDichvu->ghithangsau();
}
$dataRac = $objHoadon->tienrrac($month,$year);
$dataNuoc = $objHoadon->sonuoc($month, $year);
$dataDien = $objHoadon->sodien($month, $year);
$dataPhong = $objHoadon->tienphong($month, $year);
$Objphongtro = new Phongtro();

switch ($do) {
    case 'status':
        $objDichvu->trangthai($id);
        redirect($homeurl . "/app/dichvu?month=$month&year=$year");
        break;
    case 'delete':
        $objHoadon->deleteAll($month,$year);
        if($month == $afterMonth){
            $objDichvu->ghithangsau();
        }
        break;
}
include('header.php');
?>
<input type="hidden" value="<?php echo $month; ?>" id="month">
<input type="hidden" value="<?php echo $year; ?>" id="year">
<div class="header">
    <span>Tháng <?php echo $month; ?> năm <?php echo $year; ?></span>
    <h2>Doanh thu: <span id="doanhthu"><?php echo $objHoadon->doanhthu($month, $year); ?></span> đ</h2>
</div>
<div class="block">
    <div class="flex">
        <div class="flex-item">
            <a href="<?php echo $homeurl; ?>/app/?m=dichvu&a=ghiphieu&year=<?php echo $year;?>" class="btn btn-primary btn-sm">Quay lại</a>
            <a href="all-bill.php?month=<?php echo $month; ?>&year=<?php echo $year; ?>" target="_blank" class="btn btn-danger btn-sm">In tất cả hóa đơn</a>
        </div>
        <div class="flex-item font-blue">
            <span>Điện: <span id="sodien"><?php echo $dataDien['sodien']; ?></span> KW = <span id="tiendien"><?php echo number_format($dataDien['sotiendien']); ?></span> VND</span>
            <div class="space-height"></div>
            <span>Nước: <span id="sonuoc"><?php echo $dataNuoc['sonuoc']; ?></span> Khối = <span id="tiennuoc"><?php echo number_format($dataNuoc['sotiennuoc']); ?></span> VND</span>
        </div>
        <div class="flex-item font-blue">
            <span>Phòng đang thuê: <?php echo db_count($DB_PHONGTRO, 'phongtro_ma', array('trangthai' => 1)); ?></span>
            <div class="space-height"></div>
            <span>Phòng trống: <?php echo db_count($DB_PHONGTRO, 'phongtro_ma', array('trangthai' => '0')); ?></span>
        </div>
        <div class="flex-item font-blue">
            <span>Đã thu: <?php echo $objHoadon->trangthai($month, $year, 1); ?></span>
            <div class="space-height"></div>
            <span>Chưa thu: <?php echo $objHoadon->trangthai($month, $year, 0); ?></span>
        </div>
        <div class="flex-item flex-end">
        <?php
        if($month == $afterMonth){
            ?>
            <a href="<?php echo $homeurl;?>/app/dichvu/?month=<?php echo $month;?>&year=<?php echo $year;?>&do=delete" class="btn btn-danger btn-sm">Xóa và cập nhật lại</a>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['edit'])) {
    $hoadonCount = count($_POST['hoadon']);
    for ($i = 0; $i < $hoadonCount; $i++) {
        $hd = $_POST['hoadon'][$i];
        $sodiencu = $_POST['diencu'][$i];
        $sodienmoi = $_POST['dienmoi'][$i];
        $giatiendien = $_POST['giadien'][$i];
        $sonuoccu = $_POST['nuoccu'][$i];
        $sonuocmoi = $_POST['nuocmoi'][$i];
        $giatiennuoc = $_POST['gianuoc'][$i];
        $tienphong = $_POST['giaphong'][$i];
        $giatienrac = $_POST['giarac'][$i];
        $dichvu = $_POST['dichvu'][$i];
        $tienno = $_POST['tienno'][$i];
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
        $giatienrac = trim(str_replace(",", "", $giatienrac));
        $giatienrac = preg_replace('/\s+/', '', $giatienrac);

        $dichvu = trim(str_replace(",", "", $dichvu));
        $dichvu = preg_replace('/\s+/', '', $dichvu);

        $data = array(
            'chisodiencu' => $sodiencu,
            'chisodienmoi' => $sodienmoi,
            'chisonuoccu' => $sonuoccu,
            'chisonuocmoi' => $sonuocmoi,
            'giaphong' => $tienphong,
            'giatiennuoc' => $giatiennuoc,
            'giatiendien' => $giatiendien,
            'giatienrac' => $giatienrac,
            'phidichvu' => $dichvu,
            'tienno' => $tienno,
            'status' => '0'
        );
        if (db_update($DB_HOADON, $data, array('hoadon_id' => $hd))) {
            $hoadon = $objHoadon->getRow($hd);
            // update hoa don sau
            $objDichvu->updateOrder($hd,$sodienmoi,$sonuocmoi);
        }
        $dataNuoc = $objHoadon->sonuoc($month, $year);
        $dataDien = $objHoadon->sodien($month, $year);
        $dataPhong = $objHoadon->tienphong($month, $year);
    }
}
?>
<div class="table">
    <form action="" method="post" autocomplete="off">
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th rowspan="2">STT</th>
                    <th rowspan="2">Phòng</th>
                    <th rowspan="2">Tình trạng</th>
                    <th rowspan="2">Tiền cọc</th>
                    <th colspan="5" class="bg-warning">Điện</th>
                    <th colspan="5" class="bg-success">Nước</th>
                    <th rowspan="2">Tiền phòng</th>
                    <th rowspan="2">Tiền Rác</th>
                    <th rowspan="2">Chi phí khác</th>
                    <th rowspan="2">Tiền nợ</th>
                    <th rowspan="2">Tổng cộng</th>
                    <th rowspan="2">Thao tác</th>
                </tr>
                <tr>
                    <th class="bg-warning">Số cũ</th>
                    <th class="bg-warning">Số mới</th>
                    <th class="bg-warning">Tiêu thụ</th>
                    <th class="bg-warning">Đơn giá</th>
                    <th class="bg-warning">T. tiền</th>
                    <th class="bg-success">Số cũ</th>
                    <th class="bg-success">Số mới</th>
                    <th class="bg-success">Tiêu thụ</th>
                    <th class="bg-success">Đơn giá</th>
                    <th class="bg-success">T. tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $list = $objDichvu->ghidien($month, $year);
                foreach ($list as $row) {
                    $phongtro = $Objphongtro->getRow($row['phongtro_ma']);
                ?>
                    <tr>
                        <td><?php echo $i; ?><input type="hidden" name="hoadon[]" value="<?php echo $row['hoadon_id']; ?>"></td>
                        <td class="ajax-pt" data-pt="<?php echo $row['phongtro_ma'];?>"><?php echo $phongtro['tenphongtro']; ?></td>
                        <?php
                        if ($phongtro['trangthai'] == 1) {
                            echo ' <td class="bg-success">Đang thuê</td>';
                        } else {
                            echo '<td class="bg-danger light-text">Trống</td>';
                        }
                        ?>
                        <td><?php echo number_format($phongtro['tiencoc']); ?></td>
                        <td><input type="number" min="0" name="diencu[]" value="<?php echo $row['chisodiencu']; ?>" size="6"></td>
                        <td><input type="number" min="0" name="dienmoi[]" value="<?php echo $row['chisodienmoi']; ?>"></td>
                        <td><?php echo $row['chisodienmoi'] - $row['chisodiencu']; ?></td>
                        <td><input type="text" min="0" name="giadien[]" value="<?php echo number_format($row['giatiendien']); ?>"></td>
                        <td><?php echo number_format(($row['chisodienmoi'] - $row['chisodiencu']) * $row['giatiendien']); ?></td>
                        <td><input type="number" min="0" name="nuoccu[]" value="<?php echo $row['chisonuoccu']; ?>"></td>
                        <td><input type="number" min="0" name="nuocmoi[]" value="<?php echo $row['chisonuocmoi']; ?>"></td>
                        <td><?php echo $row['chisonuocmoi'] - $row['chisonuoccu']; ?></td>
                        <td><input type="text" name="gianuoc[]" value="<?php echo number_format($row['giatiennuoc']); ?>"></td>
                        <td><?php echo number_format(($row['chisonuocmoi'] - $row['chisonuoccu']) * $row['giatiennuoc']); ?></td>
                        <td><input type="text" min="0" name="giaphong[]" value="<?php echo number_format($row['giaphong']); ?>"></td>
                        <td><input type="text" min="0" name="giarac[]" value="<?php echo number_format($row['giatienrac']); ?>"></td>
                        <td><input type="text" min="0" name="dichvu[]" value="<?php echo number_format($row['phidichvu']); ?>"></td>
                        <td><input type="text" min="0" name="tienno[]" value="<?php echo number_format($row['tienno']); ?>"></td>
                        <td><?php echo number_format($objHoadon->Tinhtienltn($row['hoadon_id'])); ?></td>
                        <td>
                            <a href="<?php echo $homeurl; ?>/app/dichvu/bill.php?id=<?php echo $row['hoadon_id']; ?>" class="btn btn-info" target="_blank">In</a>
                            <a href="?do=status&month=<?php echo $month; ?>&year=<?php echo $year; ?>&id=<?php echo $row['hoadon_id']; ?>" class="btn <?php echo ($row['trangthai'] == 0) ? 'btn-warning' : 'btn-success'; ?>"><?php echo ($row['trangthai'] == 0) ? 'Chưa thu' : 'Đã thu'; ?></a>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
                <tr>
                    <td colspan="4" class="bg-danger bold light-text">Tổng cộng</td>
                    <td colspan="5" class="font-red"><?php echo number_format($dataDien['sotiendien']); ?></td>
                    <td colspan="5" class="font-red"><?php echo number_format($dataNuoc['sotiennuoc']); ?></td>
                    <td class="font-red"><?php echo $dataPhong['tongtien']; ?></td>
                    <td class="font-red"><?php echo $dataRac['giarac']; ?></td>
                    <td class="font-red"><?php echo $dataPhong['dichvu']; ?></td>
                    <td class="font-red"><?php echo $dataPhong['tienno']; ?></td>
                    <td class="font-red"><?php echo $objHoadon->doanhthu($month, $year); ?></td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
        <div class="block">
            <button type="submit" class="btn btn-lg btn-info float-right" name="edit" value="edit" style="margin-right: 20px;">Lưu</button>
        </div>
    </form>
</div>
<!-- start pop ajax -->
<div class="modal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="tenphong">Thông tin</h3>
        </div>
        <div class="modal-body">
            <table class="modal-table" id="infor-phong" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Người thuê</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>Năm sinh</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>Nghề nghiệp</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>Số người ở</td>
                    <td>...</td>
                </tr>
            </table>
            <br>
            <div>
                <button class="btn-scroll">Xem hóa đơn gần đây <i class='bx bx-chevron-down'></i></button>
            </div>
            <div class="scroll-content">
                <div class="center">
                    <h2 id="infoOrder">Hóa đơn tháng 07/2021</h2>
                </div>
                <table class="modal-table" cellpadding="0" cellspacing="0">
                   <tbody id="contentOrder">

                   </tbody>
                </table>
            </div>
        </div>
        <span class="modal-close" title="Đóng">
            <i class='bx bx-x'></i>
        </span>
    </div>
</div>
<script src="<?php echo $homeurl;?>/js/scroll.js"></script>
<?php
include('footer.php');
?>