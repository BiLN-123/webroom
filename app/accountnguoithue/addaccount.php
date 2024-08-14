<?php
$limit = 100;
$start = abs(intval($limit*$page)-$limit);
?><div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>
    <div class="main-title">
        TÀI KHOẢN NGƯỜI DÙNG
    </div>
</div>
<div class="mhdr">
    <div class="mhdr_mhdr">
        <h3>Tạo Tài Khoản Mới User</h3>
    </div>
</div>
<?php
$error = array();
$phongtro = new Phongtro();
$maphongtro = $phongtro->getListMa();
if (isset($_POST['taotk'])){
    $username = input_post('email');
    $hoten = input_post('hoten');
    $password = input_post('password');
    $ma = input_post('ma');
    $token = input_post('token');
    if(empty($username)){
        $error['email'] = 'Vui lòng nhập đầy đủ email';
    }
    if(empty($hoten)){
        $error['hoten'] = 'Vui lòng nhập đầy đủ họ tên người dùng';
    }
    if (empty($password)){
        $error['password'] = 'Vui lòng nhập đầy đủ password';
    }
    if(CSRF::validate_token($token) == false){
        $error['token'] = 'Dữ liệu không hợp lệ';
    }
    if(empty($error)){
        $accountuser = new Accountuser();
        if($accountuser->checkIfExists($username)){
            $error['email'] = 'Email nà đã tồn tại hoặc đã được đăng kí';
        }
    }
    if(empty($error)){
        $data = array(
            'email' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'hoten' => $hoten,
            'role' => '0',
            'phongtro_ma' => $ma,
            'created_at' => date("Y-m-d H:m:s")
        );
        if(db_insert($DB_ACCOUNT_USER, $data)){
            echo ('<div class="alert alert-success">Tạo Tài Khoản Mới Thành Công
            <a href = "' . $homeurl . '/app/?m=accountnguoithue&a=listaccount" class="url">Nhấn vào đây để về danh sách tài khoản</a></div>');
        }
    }
}
?>
<div class="main-content">
    <form action="" method="post" autocomplete="off">
        <div class="row">
            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxl-gmail' ></i> Email người dùng(vd: Letanngoc@gmail.com)
                    </div>
                    <input type="email" name="email" class="form-control" value="<?php echo oldInput('email'); ?>">
                    <?php echo showError($error, 'email'); ?>
                </div>
            </div>
            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-user-pin'></i> Nhập vào đầy đủ tên tài khoản(vd: Lê Tấn Ngọc)
                    </div>
                    <input type="text" name="hoten" class="form-control" value="<?php echo oldInput('hoten'); ?>">
                    <?php echo showError($error, 'hoten'); ?>
                </div>
            </div>


            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bxs-cog' ></i> Mật Khẩu
                    </div>
                    <input type="text" name="password" class="form-control" value="<?php echo oldInput('password'); ?>">
                    <?php echo showError($error, 'password'); ?>
                </div>
            </div>


            <div class="col-8 col-md-8 col-sm-8">
                <div class="form-group">
                    <div class="label">
                        <i class='bx bx-dollar'></i> Mã Phòng Trọ
                    </div>
                    <select name="ma">
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
            <div class="col-12">
                <?php CSRF::create_token();?>
                <?php showError($error,'token'); ?>
            </div>
            <div class="col-8">
                <button class="btn btn-default btn-add" type="submit" name="taotk" value="<?php echo base64_encode(time());?>"><i class='bx bx-plus'></i> Tạo Tài Khoản Mới</button>
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