<?php 
    define('IN_SITE', true);
    $rootpath1 = "";
    require('libs/core1.php');
?>
<?php
    $laymk = new Selectuser();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Trang Đặt Lại Mật Khẩu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success">Đặt Lại Mật Khẩu Của Bạn</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nhập Mật Khẩu Mới</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Reset" name="reset">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<?php
    $error = array();
    if(isset($_POST["reset"])){
        $psw = input_post('password');
        $token = $_SESSION['token'];
        $email = $_SESSION['email'];
        if(empty($psw)){
            $error['password'] = 'Vui lòng nhập vào mật khẩu. Mật Khẩu không được để trống!';
        }

        if(($email)){
            if(empty($error)){
                $data = array(
                    'password' => password_hash($psw, PASSWORD_DEFAULT)
                );
            if(db_update($DB_ACCOUNT_USER, $data, array('email' => "$email"))){
                ?>
                    <script>
                        window.location.replace("<?php echo $homeurl;?>signin1.php");
                        alert("<?php echo "Tài khoản của bạn đã được cập nhật mật khẩu mới"?>");
                    </script>
                <?php
                echo '<div class="alert alert-success">Đổi mật khẩu thành công.
                <a href="' . $homeurl . 'signin1.php" class="udl">Nhấn vào đây để trở về trang đăng nhập</a></div>';
            }
            else{
                echo '<div class="alert alert-danger">Có lỗi xảy ra trong quá trình cập nhật mật khẩu.</div>';
            }
        }
    }
}

?>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
