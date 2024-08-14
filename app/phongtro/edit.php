<?php
$obj = new Phongtro();
$phongtro = $obj->getRow($ma);
if (!$phongtro) {
    echo '<div class="alert alert-danger">Bạn đang truy cập vào 1 trang không có thực. Phòng này đã được gỡ bỏ hoặc không tồn tại!</div>';
    exit;
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
        <h3>Chỉnh Sửa Phòng Trọ - <?php echo $phongtro['tenphongtro']; ?></h3>
    </div>
</div>
<?php
$error = array();
if(isset($_POST['themvao'])) {
    $tenphong = input_post('ten');
    $trangthai = input_post('trangthai');
    $chisonuoc = input_post('sonuoc');
    $chisodien = input_post('sodien');
    $thongtin = input_post('thongtin');
    $giaphong = input_post('giaphong');
    $tiencoc = input_post('tiencoc');
    $dichvu = input_post('dichvu');
    $ngaythue = input_post('ngaythue');

 
    if (empty($tenphong)){
        $error['ten'] = 'Vui lòng nhập tên phòng';
    }
    if(empty($chisonuoc)){
        $error['sonuoc'] = 'Vui lòng nhập vào chỉ số nước';
    }
    if(empty($chisodien)){
        $error['sodien'] = 'Vui lòng nhập vào chỉ số nước';
    }
    if(empty($error)){
        $data = array(
            'tenphongtro' => $tenphong,
            'chisodien' => $chisodien,
            'chisonuoc' => $chisonuoc,
            'trangthai' => $trangthai,
            'thongtin' => $thongtin,
            'tiencoc' => $tiencoc,
            'giaphong' => $giaphong,
            'ngaythue' => $ngaythue,
            'chiphikhac' => $dichvu
        );
        if (db_update($DB_PHONGTRO, $data, array('phongtro_ma' => "$ma"))){
            echo '<div class="alert alert-success">Chỉnh sửa thông tin phòng trọ mới thành công.
            <a href="' . $homeurl . '/app/?m=phongtro&a=details&ma=' . $ma . '" class="udl">Nhấn vào đây để trở về trang trước</a></div>';
        }
        else{
            echo '<div class="alert alert-danger">Có lỗi xảy ra trong quá trình cập nhật thông tin phòng này.</div>';
        }
    }
}  
?>
<div class="main-content">
    <form action="" method="post" autocomplete="off">
        <div class="row">
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        Tên phòng trọ
                    </div>
                    <input type="text" name="ten" class="form-control" value="<?php echo $phongtro['tenphongtro']; ?>">
                    <?php echo showError($error, 'ten'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-calendar'></i> Ngày bắt đầu thuê
                    </div>
                    <input type="date" name="ngaythue" class="form-control" value="<?php echo $phongtro['ngaythue']; ?>">
                    <?php echo showError($error, 'ngaythue'); ?>
                </div>
            </div>

            <!--<div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-edit-alt'></i>Tên người thuê
                    </div>
                    <input type="text" name="nguoithue" class="form-control" value="<?php echo $phongtro['nguoithue']; ?>">
                    <?php echo showError($error, 'nguoithue'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-cake'></i> Năm sinh
                    </div>
                    <input type="text" name="namsinh" class="form-control" value="<?php echo $phongtro['namsinh']; ?>">
                    <?php echo showError($error, 'namsinh'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-phone'></i> Điện thoại
                    </div>
                    <input type="text" name="dienthoai" class="form-control" value="<?php echo $phongtro['sodienthoai']; ?>">
                    <?php echo showError($error, 'dienthoai'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-map'></i>Quê quán
                    </div>
                    <input type="text" name="diachi" class="form-control" value="<?php echo $phongtro['quequan']; ?>">
                    <?php echo showError($error, 'diachi'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-briefcase-alt-2'></i> Nghề nghiệp
                    </div>
                    <input type="text" name="nghenghiep" class="form-control" value="<?php echo $phongtro['nghenghiep']; ?>">
                    <?php echo showError($error, 'nghenghiep'); ?>
                </div>
            </div> -->
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        Trạng thái phòng
                    </div>
                    <select name="trangthai" class="form-control">
                        <option value="0" <?php echo $phongtro['trangthai'] == 0 ? 'selected' : ''; ?>>Chưa cho thuê</option>
                        <option value="1" <?php echo $phongtro['trangthai'] == 1 ? 'selected' : ''; ?>>Đang cho thuê</option>
                    </select>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-sun'></i> Chỉ số điện hiện tại
                    </div>
                    <input type="text" name="sodien" class="form-control" value="<?php echo $phongtro['chisodien']; ?>">
                    <?php echo showError($error, 'sodien'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-water'></i> Chỉ số nước hiện tại
                    </div>
                    <input type="text" name="sonuoc" class="form-control" value="<?php echo $phongtro['chisonuoc']; ?>">
                    <?php echo showError($error, 'sonuoc'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-water'></i> Giá phòng
                    </div>
                    <input type="text" name="giaphong" class="form-control" value="<?php echo $phongtro['giaphong']; ?>">
                    <?php echo showError($error, 'giaphong'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-water'></i> Chi phí khác
                    </div>
                    <input type="text" name="dichvu" class="form-control" value="<?php echo $phongtro['chiphikhac']; ?>">
                    <?php echo showError($error, 'dichvu'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Tiền cọc
                    </div>
                    <input type="text" name="tiencoc" class="form-control" value="<?php echo $phongtro['tiencoc']; ?>">
                    <?php echo showError($error, 'tiencoc'); ?>
                </div>
            </div>

            <div class="col-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-info-circle'></i> Thông tin khác
                    </div>
                    <textarea name="thongtin" rows="5" class="form-control"><?php echo $phongtro['thongtin']; ?></textarea>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-add" type="submit" name="themvao" value="add"><i class='bx bx-plus'></i> Cập nhật mới</button>
            </div>

        </div>
    </form>
</div>