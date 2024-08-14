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
        <h3>Thêm Người Ở (<?php echo $phongtro['tenphongtro']; ?>)</h3>
    </div>
</div>
<?php
$error = array();
if(isset($_POST['themvao'])){
    $cmnd = abs(intval(input_post('cmnd')));
    $hoten = input_post('hoten');
    $namsinh = input_post('namsinh');
    $quequan = input_post('quequan');
    $nghenghiep = input_post('nghenghiep');
    $dienthoai = abs(intval(input_post('dienthoai')));
    $khac = input_post('khac');
    $ngaythue = input_post('ngaythue');
    $vaitro = input_post('vaitro');
    $status = 1;
    if($vaitro ==1){
        $status = 1;
    }
    else{
        $status = 0;
    }
    if(empty($cmnd)){
        $error['cmnd'] = 'Vui lòng nhập vào CMND/CCCD!';
    }
    if($cmnd > 1000000000000){
        $error['cmnd'] = 'CMND/CCCD nhập sai quá 12 số!';
    }
    if(empty($hoten)){
        $error['hoten'] = 'Vui lòng nhập vào Họ Tên!';
    }
    if(empty($namsinh)){
        $error['namsinh'] = 'Vui lòng nhập vào Năm Sinh!';
    }
    if(empty($quequan)){
        $error['quequan'] = 'Vui lòng nhập vào Quê Quán!';
    }
    if(empty($nghenghiep)){
        $error['nghenghiep'] = 'Vui lòng nhập vào Nghề Nghiệp!';
    }
    if(empty($dienthoai)){
        $error['dienthoai'] = 'Vui lòng nhập vào Điện Thoại!';
    }
    if(empty($ngaythue)){
        $error['ngaythue'] = 'Vui lòng nhập vào Ngày Thuê!';
    }
    if(empty($error)){
        if(Nguoio::checkMa($cmnd) > 0){
            $error['cmnd'] = 'CMND/ CCCD này đã tồn tại';
        }
        else{
            $data = array(
                'phongtro_ma' => $ma,
                'cmnd' => $cmnd,
                'hoten' => $hoten,
                'namsinh' => $namsinh,
                'quequan' => $quequan,
                'nghenghiep' => $nghenghiep,
                'dienthoai' => $dienthoai,
                'khac' => $khac,
                'ngaythue' => $ngaythue,
                'vaitro' => $status
            );
            if(db_insert($DB_PHONGTRO_PEOPLE, $data)){
                echo '<div class = "alert alert-success">Thêm thông tin người mới thành công</div>';
            }
        }
    }
}
?>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <a href="?m=nguoithuetro&a=nguoio&ma=<?php echo $ma; ?>" class="btn-default bg-blue"><i class='bx bx-arrow-back'></i> Trở lại trang trước</a>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
        <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-id-card'></i> CMND/ CCCD
                    </div>
                    <input type="number" name="cmnd" class="form-control" value="<?php echo oldInput('cmnd'); ?>" required>
                    <?php echo showError($error, 'cmnd'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-user'></i> Họ tên
                    </div>
                    <input type="text" name="hoten" class="form-control" value="<?php echo oldInput('hoten'); ?>" required>
                    <?php echo showError($error, 'hoten'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-cake' ></i> Năm sinh
                    </div>
                    <input type="text" name="namsinh" class="form-control" placeholder="dd/mm/yyyy" required>
                    <?php echo showError($error, 'namsinh'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-phone' ></i> Điện thoại
                    </div>
                    <input type="number" name="dienthoai" class="form-control" value="<?php echo oldInput('dienthoai'); ?>" required>
                    <?php echo showError($error, 'dienthoai'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxl-discourse' ></i> Quê quán
                    </div>
                    <input type="text" name="quequan" class="form-control" value="<?php echo oldInput('quequan'); ?>" required>
                    <?php echo showError($error, 'quequan'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-briefcase-alt-2' ></i> Nghề Nghiệp
                    </div>
                    <input type="text" name="nghenghiep" class="form-control" value="<?php echo oldInput('nghenghiep'); ?>" required>
                    <?php echo showError($error, 'nghenghiep'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-cake' ></i> Ngày Thuê
                    </div>
                    <input type="text" name="ngaythue" class="form-control" placeholder="dd/mm/yyyy" required>
                    <?php echo showError($error, 'ngaythue'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-key'></i> Vai trò
                    </div>
                    <select name="vaitro" class="form-control">
                        <option value="1" <?php echo input_post('vaitro') == 1 ? 'selected' : ''; ?>>Chủ Phòng</option>
                        <option value="2" <?php echo input_post('vaitro') == 2 ? 'selected' : ''; ?>>Người thuê chung</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-hash'></i> Khác
                    </div>
                    <textarea name="khac" id="khac" rows="5" class="form-control"></textarea>
                    <?php echo showError($error, 'khac'); ?>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <button type="submit" name="themvao" value="add" class="btn btn-add"> <i class='bx bx-plus'></i> Thêm mới</button>
            </div>
        </div>
    </form>
</div>