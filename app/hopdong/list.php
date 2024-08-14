<?php
$limit = 12;
$start = abs(intval($limit*$page)-$limit);
$hopdong = new Hopdong();
$listHopDong = $hopdong->getList();
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        HỢP ĐỒNG
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Danh Sách Hợp Đồng</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12" >
            <a href="<?php echo $homeurl; ?>app/?m=hopdong&a=add" class="btn btn-default bg-blue light-text">
            <i class='bx bx-plus-circle'></i>  Tạo Hợp Đồng Mới</a>    
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    Danh Sách Hợp Đồng
                </div>
                <div class="box-body overflow-scroll">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Mã Phòng</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($listHopDong as $LHopDong){
                                //$trangthai = $LAccount['role'] == 0 ? '<span class = "text-success">Acitve</span>':'<span class = "text-danger">Unactive</span>';
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $LHopDong['phongtro_ma']; ?></td>
                                    <td><?php echo $LHopDong['tungay']; ?></td>
                                    <td><?php echo $LHopDong['toingay']; ?></td>
                                    <td>
                                        <a href="<?php echo $homeurl; ?>/app/hopdong/in.php?id=<?php echo $LHopDong['id']; ?>" class="btn-default bg-yellow" target="_blank">In</a>
                                        <a href="<?php echo $homeurl;?>/app/hopdong/delete.php?id=<?php echo $LHopDong['id'];?>" onclick="return confirm('Bạn có chắc muốn xóa hợp đồng này?')" class="btn-default bg-red"> Xoá </a>
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
</div>