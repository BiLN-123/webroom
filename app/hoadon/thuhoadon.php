<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$objHoadon = new Hoadon();
$listHoadon = $objHoadon->getAllhd($type);
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        <i class='bx bx-book-reader'></i> TỔNG HÓA ĐƠN
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Danh Sách Hóa Đơn Phòng Chưa Thu</h3>
    </div>
</div>

<div class="main-content">
<div class="row">
    <div class="col-6">
    <select name="select" id="select" class="form-control">
    <option value="" disabled>Chọn tháng, năm</option>
    <option value="0-0-0">Tất cả</option>
    <?php
    $hoadon = new Hoadon();
    $doanhthu = $hoadon->getSelect();
    foreach($doanhthu as $dt){
        ?>
        <option value="<?php echo $dt['month']."-".$dt['year'];?>-1" <?php echo ($month == $dt['month'] && $year == $dt['year']) ? 'selected' : '';?>>Tháng <?php echo $dt['month']." năm ".$dt['year'];?></option>
        <?php
    }
    ?>
    </select>
    </div>
</div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">Danh Sách Hóa Đơn Phòng Chưa Thu</div>
                <div class="box-body overflow-scroll">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th>Phòng</th>
                                <th>Ngày thuê</th>
                                <th>Hóa đơn tháng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                                <th>Hiển thị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listHoadon as $hoadon) {
                                $trangthai = $hoadon['trangthai'] == 0 ? '<span class = "text-danger">Chưa Thu</span>':'<span class = "text-success">Đã Thu</span>';
                                $tongtien = $objHoadon->Tinhtien($hoadon['hoadon_id']);
                            ?>
                                <tr>
                                    <td><a href="?m=phongtro&a=details&ma=<?php echo $hoadon['phongtro_ma'];?>" class="btn-default bg-purple"><?php echo $hoadon['tenphongtro'];?></a></td>
                                    <td><?php echo date("d", strtotime($hoadon['ngaythue'])) ;?></td>
                                    <td> <?php echo date("m/ Y",strtotime($hoadon['ngaytao']));?></div> </td>
                                    <td><?php echo number_format($tongtien);?> VND</td>
                                    <td><?php echo $trangthai; ?></td>
                                    <td><a href="?m=hoadon&a=view&id=<?php echo $hoadon['hoadon_id']; ?>" class="btn-default light-text"><i class='bx bx-info-circle'></i> Chi tiết</a></td>
                                    <td>
                                        <a href="<?php echo $homeurl;?>/app/hoadon/active.php?id=<?php echo $hoadon['hoadon_id'];?>" class="btn-default <?php echo ($hoadon['status'] == 1) ? 'bg-blue' : 'bg-red';?>"> <?php echo ($hoadon['status'] == 0) ? 'Tắt' : 'Hiển thị';?> </a>
                                    </td>
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
    <div class="row">
        <div class="col-12">
            <?php
            $demtrang = 0;
            if($type == 0){
                $demtrang = db_count($DB_HOADON,'hoadon_id');
            }
            else{
                $demtrang = db_count_query("SELECT `hoadon_id` FROM `$DB_HOADON` WHERE MONTH(`ngaytao`) = '{$month}' AND YEAR(`ngaytao`) = '$year'");
            }
            $config = [
                'total' => $demtrang,
                'querys' => $id,
                'limit' => $limit,
                'url' => 'app/?m=hoadon&a=thuhoadon&type='.$type
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
            if(count($listHoadon) == 0){
                echo '<div class="col-12"><div class="empty center">Chưa có dữ liệu!</div></div>';
            }
        ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        // change year
        $('#select').on('change', function() {
            var value = this.value;
            var month = value.split("-")[0];
            var year = value.split("-")[1];
            var type = value.split("-")[2];
            var url = $("#url").val();
            window.location.href = url + "/app/?m=hoadon&a=thuhoadon&type="+type+"&month=" + month+"&year="+year;
        });
    });
</script>