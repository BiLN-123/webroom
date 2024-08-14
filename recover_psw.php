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

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Quên Mật Khẩu Người Dùng</a>
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
                    <div class="card-header bg-success">Quên Mật Khẩu</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Nhập Địa Chỉ Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-md-2 offset-md-4">
                                    <input type="submit" value="Xác Nhận" name="recover">
                                </div>
                                <div class="col-md-4 offset-md-1">
                                    <a href="<?php echo $homeurl."signin1.php";?>">Về Trang Đăng Nhập</a>
                                </div>
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
    if(isset($_POST["recover"])){
        $email = input_post('email');
        if(empty($email)){
            $error['email'] = 'Vui lòng nhập đầy đủ email!';
        }
        if($laymk->checkIfExists($email)){
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='letanngocln1@gmail.com';
            $mail->Password='jxlbqboqefhwmlfe';

            // send by h-hotel email
            $mail->setFrom('letanngocln1@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="GREEN HOME - Khoi Phuc Lai Mat Khau";
            $mail->Body="<b>WE BiLN - DTM (2022) - Xin Chào Người Dùng ".$datauser["hoten"]."</b>
            <h3>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.</h3>
            <p>Vui lòng nhấp vào liên kết bên dưới để đặt lại mật khẩu của bạn (Nếu Bạn Không Yêu Cầu Vui Lòng Báo Với Chủ Nhà Trọ Để Phòng Tránh Trường Hợp Rủi Ro)</p>
            ".$homeurl."reset_psw.php
            <br>Cảm ơn bạn đã lựa chọn Nhà Trọ(GREEN HOME) Của Chúng Tôi <br>
            <p>Về Chúng Tôi,</p>
            <b>Lê Tấn Ngọc - K07 - CNTT04 - DTM - GREEN HOME</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Email Không tồn tại "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("<?php  echo "Email không tồn tại trong hệ thống"?>");
            </script>
            <?php
        }
    }


?>
