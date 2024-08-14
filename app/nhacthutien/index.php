<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        Nhắc thu tiền
    </div>
</div>
<?php
$objNhacnho = new Nhacnho();
$list = $objNhacnho->listCommand();
?>
<div class="main-content">
    <div class="box">
        <div class="box-header">Nhắc thu tiền</div>
        <div class="box-body">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Phòng</th>
                        <th>Nội dung</th>
                        <th>Ngày thu</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $objPhongtro = new Phongtro();
                    foreach ($list as $lenh) {
                        $pt = $objPhongtro->getRow($lenh['phongtro_ma']);
                        $month = date("m",strtotime($lenh['ngaynhac']));
                        $year = date("Y",strtotime($lenh['ngaynhac']));
                    ?>
                        <tr>
                            <td><a href="?m=phongtro&a=details&ma=<?php echo $lenh['phongtro_ma'];?>" class="btn-default bg-purple"><?php echo $pt['tenphongtro']; ?></a></td>
                            <td><?php echo $lenh['message'];?> (Tháng <?php echo date("m",strtotime($lenh['ngaynhac']));?>)</td>
                            <td><?php echo date("d/m/Y",strtotime($lenh['ngaynhac']));?></td>
                            <td><a href="<?php echo $homeurl;?>/app/dichvu/?month=<?php echo $month;?>&year=<?php echo $year;?>" class="btn-default bg-blue">Xem hóa đơn</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
    <div class="col-12">
    <?php
    if(count($list) == 0)
    {
        echo '<div class="empty center">Không có dữ liệu nào để hiển thị!</div>';
    }
    ?>
    </div>
    </div>
</div>