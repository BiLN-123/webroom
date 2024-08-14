<?php
$obj = new Nguoio();
$nguoio = $obj->getRow($id);
if (!$nguoio) {
    echo '<div class="alert alert-danger">Thông tin người ở này không tồn tại!</div>';
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
        <h3>Sửa Thông Tin Người Ở - (<?php echo($nguoio['hoten'])?>)</h3>
    </div>
</div>
<?php
    $error = array();
    if(isset($_POST['themvao'])){
        $cmnd = input_post('cmnd');
        $hoten = input_post('hoten');
        $namsinh = input_post('namsinh');
        $quequan = input_post('quequan');
        $nghenghiep = input_post('nghenghiep');
        $dienthoai = input_post('dienthoai');
        $khac = input_post('khac');
        $ngaythue = input_post('ngaythue');
        $vaitro = input_post('vaitro');
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
            $data =array(
                'phongtro_ma' => $ma,
                'hoten' => $hoten,
                'namsinh' => $namsinh,
                'quequan' => $quequan,
                'nghenghiep' => $nghenghiep,
                'dienthoai' => $dienthoai,
                'khac' => $khac,
                'ngaythue' => $ngaythue,
                'vaitro' => $vaitro
            );
            if(db_update($DB_PHONGTRO_PEOPLE,$data,array('cmnd' => $id))){
                echo ('<div class="alert alert-success">Chỉnh sửa thông tin người ở thành công!</div>');
            }
            $nguoio = $obj->getRow($id);
        }
    }
?>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <a href="?m=nguoithuetro&a=nguoio&ma=<?php echo $nguoio['phongtro_ma']; ?>" class="btn-default bg-blue"><i class='bx bx-arrow-back'></i> Trở lại trang trước</a>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-user'></i> Họ tên
                    </div>
                    <input type="text" name="hoten" class="form-control" value="<?php echo $nguoio['hoten']; ?>" required>
                    <?php echo showError($error, 'hoten'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-cake' ></i> Năm sinh
                    </div>
                    <input type="text" name="namsinh" class="form-control" value="<?php echo $nguoio['namsinh']; ?>" required>
                    <?php echo showError($error, 'namsinh'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-phone' ></i> Điện thoại
                    </div>
                    <input type="number" name="dienthoai" class="form-control" value="<?php echo $nguoio['dienthoai']; ?>" required>
                    <?php echo showError($error, 'dienthoai'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxl-discourse' ></i> Quê quán
                    </div>
                    <input type="text" name="quequan" class="form-control" value="<?php echo $nguoio['quequan']; ?>" required>
                    <?php echo showError($error, 'quequan'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-briefcase-alt-2' ></i> Nghề Nghiệp
                    </div>
                    <input type="text" name="nghenghiep" class="form-control" value="<?php echo $nguoio['nghenghiep']; ?>" required>
                    <?php echo showError($error, 'nghenghiep'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-cake' ></i> Ngày Thuê
                    </div>
                    <input type="text" name="ngaythue" class="form-control" value="<?php echo $nguoio['ngaythue']; ?>" required>
                    <?php echo showError($error, 'ngaythue'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-key'></i> Vai trò
                    </div>
                    <select name="vaitro" class="form-control" >
                        <option value="0" <?php echo $nguoio['vaitro'] == 0 ? 'selected' : ''; ?>>Người thuê chung</option>
                        <option value="1" <?php echo $nguoio['vaitro'] == 1 ? 'selected' : ''; ?>>Chủ Phòng</option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-hash'></i> Khác
                    </div>
                    <textarea name="khac" id="khac" rows="5" class="form-control" value = "<?php echo $nguoio['khac'];?>"></textarea>
                    <?php echo showError($error, 'khac'); ?>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <button type="submit" name="themvao" value="add" class="btn btn-add"> <i class='bx bx-plus'></i> Sửa</button>
            </div>
        </div>
    </form>
</div>