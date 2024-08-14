<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$phongtro = new Phongtro();
$ListPhongtro = $phongtro->getListStt($ma);
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
        <h3>Status Phòng</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header"></div>
                    <div class="box-body overflow-scroll">
                        <table class="table table-bordered table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Mã Phòng Trọ</th>
                                    <th>Tên Phòng Trọ</th>
                                    <th>Giá Phòng</th>
                                    <th>Trạng Thái</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach ($ListPhongtro as $item){
                                    $trangthai = $item['trangthai'] == 0 ? '<span class="text-danger">Trống</span>' : '<span class="text-success">Đang thuê</span>';
                                    //$trangthai = $LAccount['role'] == 0 ? '<span class = "text-success">Acitve</span>':'<span class = "text-danger">Unactive</span>';
                                ?>
                                    <tr>
                                        <td style="width: 20"><?php echo $i; ?></td>
                                        <td><?php echo $item['phongtro_ma']; ?></td>
                                        <td><?php echo $item['tenphongtro']; ?></td>
                                        <td><?php echo $item['giaphong']; ?></td>
                                        <td><?php echo $trangthai ?></td>
                                        <td>
                                            <a href="<?php echo $homeurl;?>/app/phongtro/active.php?ma=<?php echo $item['phongtro_ma'];?>" class="btn-default <?php echo ($item['status'] == 1) ? 'bg-purple' : 'bg-green';?>"> <?php echo ($item['status'] == 0) ? 'Active' : 'Unactive';?> </a>
                                        </td>
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
    <div class="row">
        <div class="col-12">
                <?php
                $demtrang = db_count($DB_PHONGTRO, 'phongtro_ma');
                $config = [
                    'total' => $demtrang,
                    'querys' => $id,
                    'limit' => $limit,
                    'url' => 'app/?m=phongtro&a=liststt'
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
            if(count($ListPhongtro) == 0){
                echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
            }
            ?>
    </div>
</div>