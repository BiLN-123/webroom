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
        <h3>Tạo Hợp Đồng Mới</h3>
    </div>
</div>
<?php
//get page
$limit = 100;
$start = abs(intval($limit*$page)-$limit);
//get Dien, Nuoc
$objSetting = new Setting();
$st = $objSetting->getRow();
//get List mã phòng
$phongtro = new Phongtro();
$maphongtro = $phongtro->getListMa();
$error = array();
if (isset($_POST['themvao'])){
    $tenA = input_post('tenA');
    $ngaysinhA = input_post('ngaysinhA');
    $cccdA = input_post('cccdA');
    $quequanA = input_post('quequanA');
    $tenB = input_post('tenB');
    $ngaysinhB = input_post('ngaysinhB');
    $cccdB = input_post('cccdB');
    $quequanB = input_post('quequanB');
    $diachithue = input_post('diachithue');
    $ngaythue = input_post('ngaythue');
    $tungay = input_post('tungay');
    $toingay = input_post('toingay');
    $ma = input_post('ma');

    if(empty($tenA)){
        $error['tenA'] = 'Vui lòng nhập tên người đại diện';
    }
    if(empty($ngaysinhA)){
        $error['ngaysinhA'] = 'Vui lòng nhập ngày sinh người đại diện';
    }
    if(empty($cccdA)){
        $error['cccdA'] = 'Vui lòng nhập số CMND/ CCCD';
    }
    if(empty($quequanA)){
        $error['quequanA'] = 'Vui lòng nhập quê quán';
    }
    if(empty($tenB)){
        $error['tenB'] = 'Vui lòng nhập tên người thuê trọ';
    }
    if(empty($ngaysinhB)){
        $error['ngaysinhB'] = 'Vui lòng nhập ngày sinh người thuê trọ';
    }
    if(empty($cccdB)){
        $error['cccdB'] = 'Vui lòng nhập số CMND/ CCCD';
    }
    if(empty($quequanB)){
        $error['quequanB'] = 'Vui lòng nhập quê quán';
    }
    if(empty($diachithue)){
        $error['diachithue'] = 'Vui lòng nhập địa chỉ trọ';
    }
    if(empty($ngaythue)){
        $error['ngaythue'] = 'Vui lòng nhập ngày thuê';
    }
    if(empty($tungay)){
        $error['tungay'] = 'Vui lòng nhập thời hạn bắt đầu';
    }
    if(empty($toingay)){
        $error['toingay'] = 'Vui lòng nhập thời hạn kết thúc';
    }
    if(empty($error)){
        $data = array(
            'tenA' => $tenA,
            'ngaysinhA' => $ngaysinhA,
            'cccdA' => $cccdA,
            'quequanA' => $quequanA,
            'tenB' => $tenB,
            'ngaysinhB' => $ngaysinhB,
            'cccdB' => $cccdB,
            'quequanB' => $quequanB,
            'diachithue' => $diachithue,
            'ngaythue' => $ngaythue,
            'tungay' => $tungay,
            'toingay' => $toingay,
            'phongtro_ma' => $ma,
            'tiendien' => $st['tiendien'],
            'tiennuoc' => $st['tiennuoc'],
            'created_at' => date("Y-m-d H:m:s")
        );
        if(db_insert($DB_HOPDONG, $data)){
            echo ('<div class="alert alert-success">Tạo Hợp Đồng Thành Công
            <a href = "' . $homeurl . '/app/?m=hopdong&a=list" class="url">Nhấn vào đây để về danh sách hợp đồng</a></div>');
        }
    }
}
?>
<div class="main-content">
    <form action="" method="post" autocomplete="off">
        <div class="row">
            <div class="col-12" style="margin-bottom:2%; margin-top:1%; color: crimson;">
            <h3><i class='bx bx-face'></i> Phía Người Đại Diện (Chủ Nhà Trọ)</h3>
        </div>
        <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-id-card'></i> Tên người đại diện (Chủ Phòng Trọ)
                    </div>
                    <input type="text" name="tenA" class="form-control" value="<?php echo oldInput('tenA'); ?>" required>
                    <?php echo showError($error, 'tenA'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-calendar'></i> Ngày sinh phía đại diện
                    </div>
                    <input type="text" name="ngaysinhA" class="form-control" value="<?php echo oldInput('ngaysinhA'); ?>" required>
                    <?php echo showError($error, 'ngaysinhA'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-id-card' ></i> CMND/ CCCD phía đại diện
                    </div>
                    <input type="number" name="cccdA" class="form-control" value="<?php echo oldInput('cccdA'); ?>" required>
                    <?php echo showError($error, 'cccdA'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-tree-alt' ></i> Quê quán phía đại diện
                    </div>
                    <input type="text" name="quequanA" class="form-control" value="<?php echo oldInput('quequanA'); ?>" required>
                    <?php echo showError($error, 'quequanA'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-bottom:2%; margin-top:1%; color: crimson;">
            <h3><i class='bx bx-user-circle'></i> Phía Người Làm Đơn (Khách Thuê Trọ)</h3>
        </div>
        <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-id-card'></i> Tên khách hàng
                    </div>
                    <input type="text" name="tenB" class="form-control" value="<?php echo input_post('tenB'); ?>" required>
                    <?php echo showError($error, 'tenB'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-calendar'></i> Ngày sinh phía khách hàng
                    </div>
                    <input type="text" name="ngaysinhB" class="form-control" value="<?php echo input_post('ngaysinhB'); ?>" required>
                    <?php echo showError($error, 'ngaysinhB'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-id-card' ></i> CMND/ CCCD phía khách hàng
                    </div>
                    <input type="number" name="cccdB" class="form-control" value="<?php echo input_post('cccdB'); ?>" required>
                    <?php echo showError($error, 'cccdB'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-tree-alt' ></i> Quê quán khách hàng
                    </div>
                    <input type="text" name="quequanB" class="form-control" value="<?php echo input_post('quequanB'); ?>" required>
                    <?php echo showError($error, 'quequanB'); ?>
                </div>
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-calendar'></i> Ngày thuê
                    </div>
                    <input type="date" name="ngaythue" class="form-control" value="<?php echo input_post('ngaythue'); ?>" required>
                    <?php echo showError($error, 'ngaythue'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-bottom:2%; margin-top:1%; color: crimson;">
            <h3><i class='bx bxl-slack-old'></i> Khác</h3>
        </div>
        <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bxs-tree-alt' ></i> Địa chỉ thuê
                    </div>
                    <input type="text" name="diachithue" class="form-control" value="<?php echo input_post('diachithue'); ?>" required>
                    <?php echo showError($error, 'diachithue'); ?>
                </div>
            </div>

            <div class="col-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-calendar'></i> Ngày bắt đầu (Hạn hợp đồng)
                    </div>
                    <input type="text" name="tungay" class="form-control" value="<?php echo input_post('tungay'); ?>" required>
                    <?php echo showError($error, 'tungay'); ?>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-calendar'></i> Ngày kết thúc (Hạn hợp đồng)
                    </div>
                    <input type="text" name="toingay" class="form-control" value="<?php echo input_post('toingay'); ?>" required>
                    <?php echo showError($error, 'toingay'); ?>
                </div>
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="label">
                    <i class='bx bx-home-heart' ></i> Mã Phòng Trọ
                    </div>
                    <select name="ma" style="width: 100%;height: 32px;font-size: 100%;">
                        <?php foreach($maphongtro as $value => $mama){
                        ?>
                            <option value="<?php echo $mama['phongtro_ma'];?>">
                            <?php echo $mama['phongtro_ma'];?>
                            </option>
                        <?php
                        }?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-bottom:2%; margin-top:1%; color: crimson;">
                <button class="btn btn-default btn-add" type="submit" name="themvao" value="add"><i class='bx bx-plus'></i> Tạo mới</button>
            </div>
        </div>
    </form>
</div>    
