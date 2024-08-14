<?php
//error_reporting(0);
define('IN_SITE',true);
require_once('../libs/core.php');
if(!$user_id){
    redirect(homeurl());
}
// get module and action on url
$m = isset($_GET['m']) ? htmlspecialchars($_GET['m']) : false; // modules
$a = isset($_GET['a']) ? htmlspecialchars($_GET['a']) : false; //  action
// neu khong truyen action va module
// thi set mac dinh duong dan den trang
// quan ly mac dinh
if(!$m || !$a){
    $m = "common";
    $a = "dashboard";
}
require_once('../libs/header.php');
// tao duong dan va luu vao bien path
$path = $m.'/'.$a.'.php';
if(file_exists($path)){
    include($path);
}
else{
    echo'<div class="text-danger center">Bạn đang truy cập vào 1 trang không có thực.</div>';
}
require_once('../libs/footer.php'); 
?>