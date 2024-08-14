<?php
$obj = new Hoadon();
$hoadon = $obj->getRow($id);
if (!$hoadon) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
}
$objPhong = new Phongtro();
$phongtro = $objPhong->getRow($hoadon['phongtro_ma']);
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        <i class='bx bx-book-reader'></i> Chỉnh sửa hóa đơn - <?php echo $phongtro['tenphongtro']; ?>
    </div>
</div>
<?php
$error = array();
if (isset($_POST['create'])) {
    $giaphong = isset($_POST['giaphong']) ? abs(intval($_POST['giaphong'])) : 0;
    $dichvu = isset($_POST['dichvu']) ? abs(intval($_POST['dichvu'])) : 0;
    $sodien = isset($_POST['sodien']) ? abs(intval($_POST['sodien'])) : 0;
    $sonuoc = isset($_POST['sonuoc']) ? abs(intval($_POST['sonuoc'])) : 0;
    $giadien = isset($_POST['giadien']) ? abs(intval($_POST['giadien'])) : 0;
    $gianuoc = isset($_POST['gianuoc']) ? abs(intval($_POST['gianuoc'])) : 0;
    $giarac = isset($_POST['giarac']) ? abs(intval($_POST['giarac'])) : 0;
    $ghichu = input_post('note');
    if (empty($giaphong)) {
        $error['giaphong'] = 'Vui lòng nhập giá phòng';
    }
    if (empty($sodien)) {
        $error['sodien'] = 'Vui lòng nhập chỉ số điện mới';
    }
    if (empty($sonuoc)) {
        $error['sonuoc'] = 'Vui lòng chỉ số nước mới';
    }
    if (empty($giadien)) {
        $error['giadien'] = 'Vui lòng nhập giá tiền điện';
    }
    if (empty($gianuoc)) {
        $error['gianuoc'] = 'Vui lòng nhập giá tiền nước';
    }
    if (empty($giarac)) {
        $error['giarac'] = 'Vui lòng nhập giá tiền rác của tháng';
    }
    if (empty($error)) {
        $data = array(
            'chisodienmoi' => $sodien,
            'chisonuocmoi' => $sonuoc,
            'giaphong' => $giaphong,
            'giatiennuoc' => $gianuoc,
            'giatiendien' => $giadien,
            'giatienrac' => $giarac,
            'ghichu' => $ghichu,
            'phidichvu' => $dichvu,
            'ngaytao' => date('Y-m-d H:m:s')
        );
        if (db_update($DB_HOADON, $data, array('hoadon_id' => $id))) {
            echo '<div class="alert alert-success">Chỉnh sửa thông tin hóa đơn thành công.
            <a href="' . $homeurl . '/app/?m=hoadon&a=view&id=' . $id . '" class="udl">Nhấn vào đây để xem chi tiết hóa đơn</a></div>';
            exit;
        } else {
            echo '<div class="alert alert-danger">Có lỗi xảy ra trong quá trình cập nhật thông tin hóa đơn.</div>';
        }
    }
}
?>
<div class="main-content">
    <div class="row">
        <div class="col-6">
            <a href="?m=hoadon&a=view&id=<?php echo $id;?>" class="bg-blue btn-default light-text"><i class='bx bx-arrow-back'></i> Trở lại trang trước</a>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Giá phòng trọ
                    </div>
                    <input type="text" name="giaphong" class="form-control" value="<?php echo $hoadon['giaphong'] ?>" required>
                    <?php echo showError($error, 'giaphong'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Chi phí khác (Ví dụ Wifi)
                    </div>
                    <input type="text" name="dichvu" class="form-control" value="<?php echo $hoadon['phidichvu']; ?>">
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-sun'></i> Chỉ số điện mới
                    </div>
                    <input type="text" name="sodien" class="form-control" value="<?php echo $hoadon['chisodienmoi']; ?>">
                    <?php echo showError($error, 'sodien'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-water'></i> Chỉ số nước mới
                    </div>
                    <input type="text" name="sonuoc" class="form-control" value="<?php echo $hoadon['chisonuocmoi']; ?>">
                    <?php echo showError($error, 'sonuoc'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Giá tiền điện mỗi kí (Ví dụ 4000)
                    </div>
                    <input type="text" name="giadien" class="form-control" value="<?php echo $hoadon['giatiendien']; ?>">
                    <?php echo showError($error, 'gianuoc'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Giá tiền nước mỗi khối (Ví dụ 9000)
                    </div>
                    <input type="text" name="gianuoc" class="form-control" value="<?php echo $hoadon['giatiennuoc'];  ?>">
                    <?php echo showError($error, 'giadien'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Giá tiền rác của tháng
                    </div>
                    <input type="text" name="giarac" class="form-control" value="<?php echo $hoadon['giatienrac'];  ?>">
                    <?php echo showError($error, 'giarac'); ?>
                </div>
            </div>

            <div class="col-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-info-circle'></i> Ghi chú thêm (Có thể bỏ qua)
                    </div>
                    <textarea name="note" rows="5" class="form-control"><?php echo $hoadon['ghichu']; ?></textarea>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-default btn-add bg-blue" type="submit" name="create" value="add"><i class='bx bx-calculator'></i> Chỉnh sửa lại hóa đơn</button>
            </div>
        </div>
    </form>

    <div class="space-heigh"></div>

    <div class="row">
        <div class="col-12">
            <ul class="ghichu">
                <li>Đối với các yêu cầu nhập số ở trên chỉ nhập số và không có khoảng trắng hay ký tự đặc biệt</li>
                <li>Kiểm tra kĩ lưỡng các thông tin trước khi nhấn nút tạo hóa đơn</li>
            </ul>
        </div>
    </div>
</div>