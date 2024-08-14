<?php
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if(!$phongtro){
    echo '<div class="alert alert-danger">Bạn đang truy cập vào một trang không có thực</div>';
    exit;
}
$objNguoio = new Nguoio();
$nguoio = $objNguoio->count($ma);
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Phòng Trọ - <?php echo $phongtro['tenphongtro'].' ('.$phongtro['phongtro_ma'].')';?></h1>
    </div>
    <div class="main-content">
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
                    <!-- <tr>
                        <td>Ngày thuê</td>
                        <td><?php echo date('d/m/Y',strtotime($phongtro['ngaythue'])); ?></td>
                    </tr>-->
                    <tr>
                        <td>Thông tin người thuê chung</td>
                        <td><?php echo('Có '. $nguoio. ' người ở  ') ; ?><a href="?m=nguoithuetro&a=nguoio&ma=<?php echo $ma;?>" class="btn-default bg-blue"><i class='bx bx-pointer'></i> Xem thông tin</a></td>
                    </tr>
                    <!-- <tr>
                        <td>Chủ Phòng</td>
                        <td><?php echo $chuphong['hoten']; ?></td>
                    </tr>
                    <tr>
                        <td>Năm sinh</td>
                        <td><?php echo $chuphong['namsinh']; ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo $chuphong['dienthoai']; ?></td>
                    </tr>
                    <tr>
                        <td>Quê quán</td>
                        <td><?php echo $chuphong['quequan']; ?></td>
                    </tr>
                    <tr>
                        <td>Nghề nghiệp</td>
                        <td><?php echo $chuphong['nghenghiep']; ?></td>
                    </tr>  -->
                    <tr>
                        <td>Trạng thái</td>
                        <td><?php echo Phongtro::status($phongtro['trangthai']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>