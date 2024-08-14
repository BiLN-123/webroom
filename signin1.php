<?php
    define('IN_SITE',true);
    $rootpath1 = "";
    require("libs/core1.php");
    if($nguoithue_user){
        redirect($homeurll);
    }
$error = array();
if(isset($_POST['dangnhap'])){
    $username = input_post('email');
    $password = input_post('password');
    $token = input_post('token');
    if(empty($username)){
        $error['email'] = 'Vui lòng nhập đầy đủ email!';
    }
    if(empty($password)){
        $error['password'] = 'Vui lòng nhập đầy đủ password';
    }
    if(CSRF::validate_token($token) == false){
        $error['token'] = 'Dữ liệu không hợp lệ';
    }
    if(empty($error)){
        $account = new Accountuser();
        if($account->checkIfExists($username)){
            if(!$account->checkLogin($username, $password)){
                $error['email'] = 'Tài khoản hoặc mật khẩu không chính xác'; 
            }
            else{
                $_SESSION['uid'] = $account->nguoithue_id;
                redirect($homeurll);
            }
        }
        else{
            $error['email'] = 'Tài khoản không tồn tại'; 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css" type="text/css">
    <link rel="stylesheet" href="./BS/CSS/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid bg-success">
        <div class="container bg-success">
            <main>
                <div class="box">
                    <div class="list1 login bg-gradient bg-white">
                        <h1 class="title">Đăng Nhập</h1>
                        <!-- <p class="slogan">Sign up to see photos from your friends.</p> -->
                        <img src="images/nhatro.png" alt="" id="img-login">
                        <form method="post">
                            <?php showError($error,'email'); ?>
                            <div class="txt-input my-4">
                                <label>Tên người dùng</label>
                                <input type="text" name="email" id="username" value="<?php oldInput('email');?>">
                            </div>
                            <?php showError($error,'password'); ?>
                            <div class="txt-input my-4">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" id="password"  value="<?php oldInput('password');?>">
                            </div>
                            <?php CSRF::create_token();?>
                            <?php showError($error,'token'); ?>
                            <div class="txt-button mt-5">
                                <button class="bg-info" type="submit" name="dangnhap" value="<?php echo base64_encode(time());?>"><h3>Đăng Nhập</h3></button>
                                <h5 class="mt-4"><a href="<?php echo  $homeurl."recover_psw.php";?>">Quên Mật Khẩu?</a></h5>
                            </div>
                        </form>
                    </div>
                    <!-- list1  -->
                    <div class="list1 regis">
                        <h3>GREENHOME</h3><br>
                        <h5>Hãy Trở Thành Thành Viên Của GreenHome Để Được Cấp Tài Khoản <a href="<?php echo $homeurl."home.php";?>">Quay Lại Trang Chủ</a></h5>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
    const input = document.querySelectorAll('input');
    input.forEach(item => {
        if(item.value != ""){
            item.parentElement.classList.add("active");
        }
        item.addEventListener('focus',(e) => {
        item.offsetParent.classList.add('active');
        });
        item.addEventListener('blur',(e) => {
            if(e.target.value == ""){
                item.offsetParent.classList.remove('active');
            }
        });
        item.addEventListener('keyup',(e) => {
            if(e.target.value == ""){
                item.offsetParent.classList.remove('active');
            }
        });
    });
    </script>
    <script src="./BS/JS/jquery.js"></script>
    <script src="./BS/JS/bootstrap.min.js"></script>
</body>
</html>