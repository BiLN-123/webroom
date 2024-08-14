<?php
    define('IN_SITE',true);
    $rootpath = "";
    require("libs/core.php");
    if($user_id){
        redirect($homeurl);
    }
$error = array();
if(isset($_POST['dangnhap'])){
    $username = input_post('username');
    $password = input_post('password');
    $token = input_post('token');
    if(empty($username)){
        $error['username'] = 'Vui lòng nhập đầy đủ username!';
    }
    if(empty($password)){
        $error['password'] = 'Vui lòng nhập đầy đủ password';
    }
    if(CSRF::validate_token($token) == false){
        $error['token'] = 'Dữ liệu không hợp lệ';
    }
    if(empty($error)){
        $account = new Account();
        if($account->checkIfExists($username)){
            if(!$account->checkLogin($username, $password)){
                $error['username'] = 'Tài khoản hoặc mật khẩu không chính xác'; 
            }
            else{
                $_SESSION['uid'] = $account->account_id;
                redirect($homeurl);
            }
        }
        else{
            $error['username'] = 'Tài khoản không tồn tại'; 
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
    <div class="container-fluid bg-warning">
        <div class="container bg-warning">
            <main>
                <div class="box">
                    <div class="list1 login bg-gradient bg-white">
                        <h1 class="title">Đăng Nhập</h1>
                        <!-- <p class="slogan">Sign up to see photos from your friends.</p> -->
                        <img src="images/img-login.png" alt="" id="img-login">
                        <form method="post">
                            <?php showError($error,'username'); ?>
                            <div class="txt-input my-4">
                                <label>Tên người dùng</label>
                                <input type="text" name="username" id="username" value="<?php oldInput('username');?>">
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
                            </div>
                        </form>
                    </div>
                    <!-- list1  -->
                    <div class="list1 regis">
                        <h5>Chào bạn đến với trang</h5><br>
                        <h5>Bạn chưa có tài khoản? <a href="<?php echo $homeurl."signup.php";?>">Đăng Ký</a></h5>
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