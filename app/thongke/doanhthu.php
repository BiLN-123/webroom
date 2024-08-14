<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        Thống kê doanh thu
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Doanh Thu Theo Tháng</h3>
    </div>
</div>
<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$hoadon = new Hoadon();
$doanhthu = $hoadon->thongke();
?>
<div class="main-content">
    <div class="box">
        <div class="box-header">Doanh thu</div>
        <div class="box-body">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Thời gian</th>
                        <th>Số điện</th>
                        <th>Số nước</th>
                        <th>Tiền phòng</th>
                        <th>Dịch vụ</th>
                        <th>Tổng số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($doanhthu as $tk) {
                        $dataNuoc = $hoadon->sonuoc($tk['month'], $tk['year']);
                        $dataDien = $hoadon->sodien($tk['month'], $tk['year']);
                        $dataPhong = $hoadon->tienphong($tk['month'], $tk['year']);
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $tk['month'] . "/" . $tk['year']; ?></td>
                            <td><?php echo $dataDien['sodien']; ?> Kw = <?php echo number_format($dataDien['sotiendien']); ?></span></td>
                            <td><?php echo $dataNuoc['sonuoc']; ?> Khối = <?php echo number_format($dataNuoc['sotiennuoc']); ?></span></td>
                            <td><?php echo $dataPhong['tongtien'];?></td>
                            <td><?php echo $dataPhong['dichvu'];?></td>
                            <td style="color:#ff5159;font-weight:800"><?php echo $hoadon->doanhthu($tk['month'], $tk['year']); ?> VND</td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            $demtrang = db_count_query("SELECT MONTH(`ngaytao`) as 'month', YEAR(`ngaytao`) as 'year' FROM `$DB_HOADON`
            GROUP BY MONTH(`ngaytao`), YEAR(`ngaytao`)");
            $config = [
                'total' => $demtrang,
                'querys' => $id,
                'limit' => $limit,
                'url' => 'app/?m=thongke&a=doanhthu'
            ];
            $page1 = new Pagination($config);
            ?>
            <?php
            if ($demtrang > $limit) {
                echo '<div><center><ul class="pagination">' . $page1->getPagination() . '</ul></center></div>';
            }
            ?>
        </div>
        <?php
        if(count($doanhthu) == 0){
            echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
        }
        ?>
    </div>
</div>