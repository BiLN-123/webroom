<?php
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if (!$phongtro) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objNguoio = new Nguoio();
$listNguoio = $objNguoio->getList($ma);
switch($do){
    case 'xoa':
        $objNguoio->delete($id);
        $listNguoio = $objNguoio->getList($ma);
        break;
}
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
        <h3>Danh Sách Thông Tin Người Ở Phòng (<?php echo $phongtro['tenphongtro']; ?>)</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <a href="?m=phongtro&a=details&ma=<?php echo $ma; ?>" class="btn-default bg-blue"><i class='bx bx-arrow-back'></i> Trở lại trang trước</a>
            <span style="margin-right:20px;"></span>
            <a href="?m=nguoithuetro&a=themnguoio&ma=<?php echo $ma; ?>" class="btn-default bg-green"><i class='bx bx-user-plus'></i> Thêm mới</a>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    Danh sách
                </div>
                <div class="box-body">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Ngày thuê</th>
                                <th>Năm sinh</th>
                                <th>Điện thoại</th>
                                <th>Quê quán</th>
                                <th>Vai trò</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listNguoio as $no) {
                            ?>
                                <tr>
                                    <td><?php echo $no['hoten']; ?></td>
                                    <td><?php echo $no['ngaythue']; ?></td>
                                    <td><?php echo $no['namsinh']; ?></td>
                                    <td><?php echo $no['dienthoai']; ?></td>
                                    <td><?php echo $no['quequan']; ?></td>
                                    <td><?php echo Nguoio::status($no['vaitro']); ?></td>
                                    <td>
                                        <a href="?m=nguoithuetro&a=suanguoio&id=<?php echo $no['cmnd'];?>" class="btn-default bg-yellow">Sửa</a>
                                        <a href="?m=nguoithuetro&a=nguoio&ma=<?php echo $ma;?>&do=xoa&id=<?php echo $no['cmnd'];?>" class="btn-default bg-red" onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a>
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
        <div class="col-12">
        <?php
        if(count($listNguoio) == 0){
            echo '<div class="empty center">Chưa có thông tin người ở phòng này!</div>';
        }
        ?>
        </div>
    </div>
</div>
