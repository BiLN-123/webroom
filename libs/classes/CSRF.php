<?php
class CSRF{
    public static function create_token(){
        // generate token
        $token = md5(time()); // hoặc có thể sử dụng md5(uniqid())
        // save in session //Lưu token vào session khi load trang
        $_SESSION["token"] = $token;
        // create hidden filed //Lưu token vào input hidden
        echo "<input type='hidden' name='token' value='$token' id='token'>";
    }
    public static function validate_token($token){
        // validate token //check validate của $_SESSION có trùng với $token hay không?
        return isset($_SESSION["token"]) && $_SESSION["token"] == $token;
    }
}
?>