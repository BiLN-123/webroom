<?php
    define('IN_SITE',true);
    $rootpath = "";
    require("libs/core.php");
    if($user_id){
        redirect($homeurl);
    }
$error = array();
if(isset($_POST['dangky'])){
    $regex = "/[^a-zA-Z0-9]/";
    $fullname = input_post('fullname');
    $username = input_post('username');
    $password = input_post('password');
    $token = input_post('token');
    if(empty($fullname)){
        $error['fullname'] = 'Vui lòng nhập vào đầy đủ tên của bạn!';
    }
    if(empty($username)){
        $error['username'] = 'Vui lòng nhập đầy đủ username!';
    }
    elseif(preg_match($regex, $username)){
        $error['username'] = 'Username không được chứa kí tự đặc biệt nào!';
    }
    elseif(strlen($username) < 6 || strlen($username) > 15){
        $error['username'] = 'Username nằm trong khoảng 6 - 15 kí tự ';
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
            $error['username'] = 'Username đã tồn tại'; 
        }
    }
    if(empty($error)){
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'fullname' => $fullname,
            'created_at' => date("Y-m-d H:m:s"),
            'role' => '0'
        );
        if(db_insert($DB_ACCOUNT, $data)){
            $_SESSION['uid'] = db_get_insert_id();
            redirect($homeurl);
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
                        <h1 class="title">Đăng Ký</h1>
                        <!-- <p class="slogan">Sign up to see photos from your friends.</p> -->
                        <img src="images/img-login.png" alt="" id="img-login">
                        <form method="post">
                            <?php showError($error,'fullname'); ?>
                            <div class="txt-input my-4">
                                <label>Tên đầy đủ</label>
                                <input type="text" name="fullname" id="fullname" value="<?php oldInput('fullname');?>">
                            </div>
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
                                <button class="bg-info" type="submit" name="dangky" value="<?php echo base64_encode(time());?>"><h3>Đăng Ký</h3></button>
                            </div>
                        </form>
                    </div>
                    <!-- list1  -->
                    <div class="list1 regis">
                        <h5>Bạn đã có tài khoản? <a href="<?php echo $homeurl."signin.php";?>">Đăng Nhập</a></h5>
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