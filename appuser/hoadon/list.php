<?php
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if (!$phongtro) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objHoadon = new Hoadon();
$listHoadon = $objHoadon->getList($ma);
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Danh Sách Hoá Đơn - <?php echo $phongtro['tenphongtro'].' ('.$phongtro['phongtro_ma'].')';?></h1>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-6">
                <!-- <a href="?m=phongtro&a=details&ma=<?php echo $ma; ?>" class="btn-default bg-blue"><i class='bx bx-arrow-back'></i> Trở lại trang trước</a> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header"><h4 class="text-danger"><b><i class='bx bx-error' ></i> CHÚ Ý: Vui Lòng Đóng Tiền Từ Ngày 15 - 20 tháng <?php echo date("m"); ?> năm <?php echo date("Y"); ?> để hoá đơn của tháng được cập nhật đúng nhất</b></h4></div>
                    <div class="box-body overflow-scroll">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hoá Đơn Tháng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach ($listHoadon as $hoadon) {
                                    $tongtien = $objHoadon->Tinhtien($hoadon['hoadon_id']);
                                    $Lhoadon = $hoadon['trangthai'] == 0 ? '<span class = "text-danger">Chưa Thu</span>':'<span class = "text-success">Đã Thu</span>';
                                ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>Hoá Đơn Tháng <?php echo date("m/Y",strtotime($hoadon['ngaytao']));?></td>
                                        <td><?php echo number_format($tongtien); ?> VND</td>
                                        <td><?php echo $Lhoadon;?></td>
                                        <td><a href="?m=hoadon&a=view&id=<?php echo $hoadon['hoadon_id']; ?>" class="btn-default light-text"><i class='bx bx-info-circle'></i> Chi tiết</a></td>

                                    </tr>
                                <?php
                                $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- pagin -->
        <div class="row">
            <div class="col-12">
                <?php
                $demtrang = db_count($DB_HOADON, 'hoadon_id', array('phongtro_ma' => $ma));
                $config = [
                    'total' => $demtrang,
                    'querys' => $id,
                    'limit' => $limit,
                    'url' => 'app/?m=hoadon&a=all'
                ];
                $page1 = new Pagination($config);
                ?>
                <?php
                if ($demtrang > $limit) {
                    echo '<div><center><ul class="pagination">' . $page1->getPagination() . '</ul></center></div>';
                }
                if (count($listHoadon) == 0) {
                    echo '<div class="empty center">Chưa có hóa đơn nào được tạo!</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>