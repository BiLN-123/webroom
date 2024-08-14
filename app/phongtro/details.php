<?php
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if (!$phongtro) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
 $objNguoio = new Nguoio();
 $nguoio = $objNguoio->count($ma);
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        PHÒNG TRỌ
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Chi Tiết Phòng Trọ - <?php echo $phongtro['tenphongtro']; ?></h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-6">
            <a href="<?php echo $homeurl; ?>/app/?m=phongtro&a=edit&ma=<?php echo $phongtro['phongtro_ma']; ?>" class="btn btn-default bg-blue light-text"><i class='bx bx-pencil'></i> Chỉnh sửa thông tin</a>
        </div>
        <div class="col-6">
            <a href="<?php echo $homeurl; ?>/app/?m=hoadon&a=list&ma=<?php echo $phongtro['phongtro_ma']; ?>" class="btn btn-default bg-purple light-text"><i class='bx bx-time'></i> Xem hóa đơn đã tạo</a>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            Thông tin chi tiết
        </div>
        <div class="box-body overflow-scroll">
            <table class="table" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Mã phòng</td>
                    <td class="text-danger nm-text"><?php echo $phongtro['phongtro_ma']; ?></td>
                </tr>
                <tr>
                    <td>Tên phòng</td>
                    <td><?php echo $phongtro['tenphongtro']; ?></td>
                </tr>
                <tr>
                    <td>Giá phòng</td>
                    <td><?php echo number_format($phongtro['giaphong']); ?> VND</td>
                </tr>
                <tr>
                    <td>Chi phí khác</td>
                    <td><?php echo number_format($phongtro['chiphikhac']); ?> VND</td>
                </tr>
                <tr>
                    <td>Tiền đã cọc</td>
                    <td><?php echo number_format($phongtro['tiencoc']); ?> VND</td>
                </tr>
                <tr>
                    <td>Ngày thuê trọ</td>
                    <td><?php echo date('d/m/Y',strtotime($phongtro['ngaythue'])); ?></td>
                </tr>
                <tr>
                    <td>Thông tin người thuê chung</td>
                    <td><?php echo('Có '. $nguoio. ' người ở  ') ; ?><a href="?m=nguoithuetro&a=nguoio&ma=<?php echo $ma;?>" class="btn-default bg-blue"><i class='bx bx-pointer'></i> Xem thông tin</a></td>
                </tr>
                <!--<tr>
                    <td>Người thuê phòng</td>
                    <td><?php echo $phongtro['nguoithue']; ?></td>
                </tr>
                <tr>
                    <td>Năm sinh</td>
                    <td><?php echo $phongtro['namsinh']; ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?php echo $phongtro['sodienthoai']; ?></td>
                </tr>
                <tr>
                    <td>Quê quán</td>
                    <td><?php echo $phongtro['quequan']; ?></td>
                </tr>
                <tr>
                    <td>Nghề nghiệp</td>
                    <td><?php echo $phongtro['nghenghiep']; ?></td>
                </tr> -->
                <tr>
                    <td>Trạng thái</td>
                    <td><?php echo Phongtro::status($phongtro['trangthai']); ?></td>
                </tr>
                <tr>
                    <td>Ngày tạo</td>
                    <td><?php echo date("H:i:s d-m-Y", $phongtro['ngaytao']); ?></td>
                </tr>
                <tr>
                    <td>Thông tin khác</td>
                    <td><?php echo $phongtro['thongtin']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
            <a href="<?php echo $homeurl; ?>/app/phongtro/delete.php?ma=<?php echo $phongtro['phongtro_ma']; ?>" onclick="return confirm('Bạn có chắc muốn xóa phòng này?')" class="btn btn-default bg-red light-text"><i class='bx bx-trash'></i> Xóa phòng này</a>
        </div>
    </div>
</div>