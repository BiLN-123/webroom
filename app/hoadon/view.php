<?php
$obj = new Hoadon();
$hoadon = $obj->getRow($id);
if (!$hoadon) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Hóa đơn này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objPhong = new Phongtro();
$phongtro = $objPhong->getRow($hoadon['phongtro_ma']);
$sonuocdung = $hoadon['chisonuocmoi'] - $hoadon['chisonuoccu'];
$sodiendung = $hoadon['chisodienmoi'] - $hoadon['chisodiencu'];
$tongtienNuoc = ($sonuocdung * $hoadon['giatiennuoc']);
$tongtienDien = ($sodiendung * $hoadon['giatiendien']);
$tongthanhtoan = $tongtienNuoc + $hoadon['giatienrac'] + $tongtienDien + $hoadon['giaphong'] + $hoadon['phidichvu'];
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        Chi tiết hóa đơn - <?php echo $phongtro['tenphongtro']; ?>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-6">
            <a href="?m=phongtro&a=list" class="btn btn-default light-text"><i class='bx bx-arrow-back'></i> Trở lại danh sách</a>
        </div>
        <div class="col-6">
            <a href="<?php echo $homeurl; ?>/app/?m=hoadon&a=edit&id=<?php echo $id; ?>" class="btn btn-default bg-blue light-text"><i class='bx bx-pencil'></i> Chỉnh sửa thông tin</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header center">Hóa đơn tháng <?php echo date("m, Y",strtotime($hoadon['ngaytao']));?></div>
                <div class="box-body">
                    <table class="table overflow-scroll">
                        <tr>
                            <td>Mã phòng</td>
                            <td class="text-danger nm-text"><?php echo $phongtro['phongtro_ma']; ?> (<?php echo $phongtro['tenphongtro']; ?>)</td>
                        </tr>
                        <tr>
                            <td>Chỉ số điện tháng trước:
                                <span class="bold"><?php echo number_format($hoadon['chisodiencu']); ?></span>
                            </td>
                            <td>Chỉ số điện tháng này:
                                <span class="bold"><?php echo number_format($hoadon['chisodienmoi']); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Chỉ số nước tháng trước:
                                <span class="bold"><?php echo number_format($hoadon['chisonuoccu']); ?></span>
                            </td>
                            <td>Chỉ số nước tháng này:
                                <span class="bold"><?php echo number_format($hoadon['chisonuocmoi']); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nước dùng tháng này</td>
                            <td class=""><?php echo $sonuocdung; ?> Khối x <?php echo number_format($hoadon['giatiennuoc']); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Điện dùng tháng này</td>
                            <td class=""><?php echo $sodiendung; ?> Kí x <?php echo number_format($hoadon['giatiendien']); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Tiền điện</td>
                            <td class=""><?php echo number_format($tongtienDien); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Tiền nước</td>
                            <td class=""><?php echo number_format($tongtienNuoc); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Tiền phòng</td>
                            <td class=""><?php echo number_format($hoadon['giaphong']); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Tiền Rác</td>
                            <td class=""><?php echo number_format($hoadon['giatienrac']); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Chi phí khác</td>
                            <td class=""><?php echo number_format($hoadon['phidichvu']); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Tiền nợ</td>
                            <td class=""><?php echo number_format($hoadon['tienno']); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Tổng số tiền</td>
                            <td class="bold"><?php echo number_format($tongthanhtoan); ?> VND</td>
                        </tr>
                        <tr>
                            <td>Ghi chú</td>
                            <td class=""><?php echo $hoadon['ghichu']; ?></td>
                        </tr>
                        <tr>
                            <td>Người tạo</td>
                            <td class="nm-text"><?php echo nick($hoadon['nguoitao']); ?></td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td class="nm-text"><?php echo $hoadon['ngaytao']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>