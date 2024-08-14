<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if (!$phongtro) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objHoadon = new Hoadon();
$listHoadon = $objHoadon->getList($ma);
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        <i class='bx bx-book-reader'></i> Lịch sử tính tiền - <?php echo $phongtro['tenphongtro']; ?>
    </div>
</div>

<div class="main-content">
    <div class="row">
        <div class="col-6">
            <a href="?m=phongtro&a=details&ma=<?php echo $ma; ?>" class="btn-default bg-blue"><i class='bx bx-arrow-back'></i> Trở lại trang trước</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">Danh sách hóa đơn</div>
                <div class="box-body overflow-scroll">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th>Lý do thu</th>
                                <th>Ngày tạo</th>
                                <th>Người tạo</th>
                                <th>Tổng tiền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listHoadon as $hoadon) {
                                $tongtien = $objHoadon->Tinhtien($hoadon['hoadon_id']);
                            ?>
                                <tr>
                                    <td>Thu tiền <?php echo date("m/Y",strtotime($hoadon['ngaytao']));?></td>
                                    <td><?php echo $hoadon['ngaytao']; ?></td>
                                    <td><?php echo nick($hoadon['nguoitao']); ?></td>
                                    <td><?php echo number_format($tongtien); ?> VND</td>
                                    <td><a href="?m=hoadon&a=view&id=<?php echo $hoadon['hoadon_id']; ?>" class="btn-default light-text"><i class='bx bx-info-circle'></i> Chi tiết</a></td>

                                </tr>
                            <?php
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