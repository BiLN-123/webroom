<?php
$countphongtro = db_count($DB_PHONGTRO, 'phongtro_ma');
$obj = new Setting();
$st = $obj->getRow();
if(!$st){
    echo ('<div class="alert alert-danger">Hệ thống bị lỗi thiết lập giá tiền do không có dữ liệu. </div>');
}
?>
<div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        THIẾT LẬP DỊCH VỤ
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Thiết Lập Tiền Dịch Vụ</h3>
    </div>
</div>
<div class="row">
    <div class="col-12 cdp"></div>
</div>
<?php
$error = array();
if(isset($_POST['themvao'])){
    $tiendien = input_post('tiendien');
    $tiennuoc = input_post('tiennuoc');
    $tienrac = input_post('tienrac');
    $caidatphong = input_post('caidatphong');
    $tiendien = abs(intval($tiendien));
    $tiennuoc = abs(intval($tiennuoc));
    $tienrac = abs(intval($tienrac));
    $caidatphong = abs(intval($caidatphong));
    if($tiendien < 0){
        $error['tiendien'] = 'Giá trị nhập vào phải lớn hơn 0';
    }
    if($tiennuoc < 0){
        $error['tiennuoc'] = 'Giá trị nhập vào phải lớn hơn 0';
    }
    if($tienrac < 0){
        $error['tienrac'] = 'Giá trị nhập vào phải lớn hơn 0';
    }
    if($caidatphong < 0){
        $error['caidatphong'] = 'Giá trị nhập vào phải lớn hơn 0';
    }
    elseif($caidatphong < $countphongtro){
        $error['cdp'] = 'Lỗi cài đặt phòng do số lượng thay đổi đang nhỏ hơn tổng phòng hiện có!';
    }
    if(empty($error)){
        $data = array(
            'tiendien' => $tiendien,
            'tiennuoc' => $tiennuoc,
            'tienrac'  => $tienrac,
            'caidatphong' => $caidatphong
        );
        if(db_update($DB_SETTING,$data,array('setting_id' => $st['setting_id']))){
            echo'<div class="alert alert-success">Cập Nhật Dịch Vụ Thành Công!</div>';
        }
        $st = $obj->getRow();
    }
}
?>
<div class="main-content">
    <form action="" method="post">
        <div class="row">
            <div class="col-12 cdp">
                <?php echo showError($error, 'cdp'); ?>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Tiền Điện
                    </div>
                    <input type="number" min="1" name="tiendien" class="form-control" value="<?php echo $st['tiendien']; ?>" required>
                    <?php showError($error, 'tiendien'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Tiền Nước
                    </div>
                    <input type="number" min="1" name="tiennuoc" class="form-control" value="<?php echo $st['tiennuoc']; ?>" required>
                    <?php showError($error, 'tiennuoc'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Tiền Rác
                    </div>
                    <input type="number" min="1" name="tienrac" class="form-control" value="<?php echo $st['tienrac']; ?>" required>
                    <?php showError($error, 'tienrac'); ?>
                </div>
            </div>
            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-cog'></i> Cài Đặt Phòng
                    </div>
                    <input type="number" min="1" name="caidatphong" class="form-control" value="<?php echo $st['caidatphong']; ?>">
                    <?php showError($error, 'caidatphong'); ?>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-default btn-add bg-blue" type="submit" name="themvao" value="add"><i class='bx bx-plus'></i> Thiết lập</button>
            </div>
        </div>
    </form>
</div>