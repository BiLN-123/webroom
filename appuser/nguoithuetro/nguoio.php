<?php
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if (!$phongtro) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objNguoio = new Nguoio();
$listNguoio = $objNguoio->getList($ma);
?>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Danh Sách Thông Tin Người Ở Phòng (<?php echo $phongtro['tenphongtro']; ?>)</h3>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    Danh sách
                </div>
                <div class="box-body">
                    <table cellspacing="0" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Ngày thuê</th>
                                <th>Năm sinh</th>
                                <th>Điện thoại</th>
                                <th>Quê quán</th>
                                <th>Vai trò</th>
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
