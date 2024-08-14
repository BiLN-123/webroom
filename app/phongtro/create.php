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
        <h3>Tạo Phòng Trọ Mới</h3>
    </div>
</div>
<?php
$error = array();
$countphongtro = db_count($DB_PHONGTRO, 'phongtro_ma');
$objSetting = new Setting();
$st = $objSetting->getRow();
if (isset($_POST['themvao'])){
    $regex = "/[^a-zA-Z0-9]+/";
    $ma = input_post('ma');
    $tenphong = input_post('ten');
    $trangthai = input_post('trangthai');
    $dichvu = input_post('dichvu');
    $giaphong = input_post('giaphong');
    $tiencoc = input_post('tiencoc');
    $thongtin = input_post('thongtin');
    $status = 1;

    if($trangthai==1){
        $status = 1;
    }
    else{
        $status = 0;
    }
    if (empty($ma)){
        $error['ma'] = 'Vui lòng nhập mã phòng';
    }
    elseif (preg_match($regex, $ma)){
        $error['ma'] = 'Mã phòng không hợp lệ, không được chứa ký tự đặc biệt';
    }
    if (empty($tenphong)){
        $error['tenphong']= 'Vui lòng nhập tên phòng'; 
    }
    if (empty($dichvu)){
        $dichvu = 0;
    }
    if (empty($tiencoc)){
        $tiencoc = 0;
    }
    if($countphongtro >= $st['caidatphong']){
        $error['tbloi'] = 'Thêm vào thất bại, hãy kiểm tra lại cài đặt'; 
    }
    if(empty($error)) {
        if(Phongtro::checkMa($ma) > 0) {
            $error['ma'] = 'Mã phòng trọ này đã tồn tại, hãy dùng mã khác';
        }
        else{
            $data = array(
                'phongtro_ma' => $ma,
                'tenphongtro' => $tenphong,
                'giaphong' => $giaphong,
                'chisodien' => '0',
                'chisonuoc' => '0',
                'status' => '0',
                'chiphikhac' => $dichvu,
                'thongtin' => $thongtin,
                'tiencoc' => $tiencoc,
                'trangthai' => $status,
                'ngaytao' => time(),
                'ngaythue' => '0001-01-01'
            );
            if(db_insert($DB_PHONGTRO, $data)){
                if($trangthai == 1){
                    $data1 = array(
                        'phongtro_ma' => $ma,
                        'chisodiencu' => '0',
                        'chisonuoccu' => '0',
                        'chisodienmoi' => '0',
                        'chisonuocmoi' => '0',
                        'status' => '0',
                        'giaphong' => $giaphong,
                        'giatiendien' => $st['tiendien'],
                        'giatiennuoc' => $st['tiennuoc'],
                        'giatienrac' => $st['tienrac'],
                        'phidichvu' => $dichvu,
                        'ghichu' => '',
                        'nguoitao' => $user_id,
                        'ngaythue' => '0000-00-00',
                        'ngaytao' => date('Y:m:d H:m:s')

                    ); 
                    db_insert($DB_HOADON, $data);
                }
                echo ('<div class="alert alert-success">Tạo phòng trọ mới thành công
                <a href = "' . $homeurl . '/app/?m=phongtro&a=list" class="url">Nhấn vào đây để xem phòng trọ vừa tạo</a></div>');
            }
        }
    }
}
?>
<div class="main-content">
    <form action="" method="post" autocomplete="off">
        <div class="row">
            <div class="tbloi col-12" name="tbloi">
                <?php echo showError($error, 'tbloi');?>
            </div>
            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-hash'></i> Mã phòng trọ (Là duy nhất, không trùng lập). Ví dụ: P01
                    </div>
                    <input type="text" name="ma" class="form-control" value="<?php echo oldInput('ma'); ?>" required>
                    <?php echo showError($error, 'ma'); ?>
                </div>
            </div>
            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        Tên phòng trọ, ví dụ (Phòng 01)
                    </div>
                    <input type="text" name="ten" class="form-control" value="<?php echo oldInput('ten'); ?>">
                    <?php echo showError($error, 'ten'); ?>
                </div>
            </div>


            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Giá phòng
                    </div>
                    <input type="number" name="giaphong" class="form-control" value="<?php echo oldInput('giaphong'); ?>">
                    <?php echo showError($error, 'giaphong'); ?>
                </div>
            </div>


            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Chi phí khác
                    </div>
                    <input type="number" name="dichvu" class="form-control" value="<?php echo oldInput('dichvu'); ?>">
                    <?php echo showError($error, 'dichvu'); ?>
                </div>
            </div>

            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Tiền cọc
                    </div>
                    <input type="number" name="tiencoc" class="form-control" value="<?php echo oldInput('tiencoc'); ?>">
                    <?php echo showError($error, 'tiencoc'); ?>
                </div>
            </div>
            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-stats'></i> Trạng thái phòng
                    </div>
                    <select name="trangthai" class="form-control">
                        <option value="1" <?php echo input_post('trangthai') == 1 ? 'selected' : ''; ?>>Đang cho thuê</option>
                        <option value="2" <?php echo input_post('trangthai') == 2 ? 'selected' : ''; ?>>Chưa cho thuê</option>
                    </select>
                </div>
            </div>
            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-info-circle'></i> Thông tin khác
                    </div>
                    <textarea name="thongtin" rows="5" class="form-control"><?php echo oldInput('thongtin'); ?></textarea>
                </div>
            </div>

            <div class="col-8">
                <button class="btn btn-default btn-add" type="submit" name="themvao" value="add"><i class='bx bx-plus'></i> Tạo mới</button>
            </div>

        </div>
    </form>
    <div class="space-heigh"></div>

    <div class="row">
        <div class="col-8">
            <ul class="ghichu">
                <li>Đối với các yêu cầu nhập số ở trên chỉ nhập số và không có khoảng trắng hay ký tự đặc biệt</li>
                <li>Kiểm tra kĩ lưỡng các thông tin trước khi nhấn nút tạo</li>
            </ul>
        </div>
    </div>
</div>
