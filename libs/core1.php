<?php
if(!defined('IN_SITE')) die('Error: restricted access');
// timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');
// start session
session_start();
$rootpath1 = isset($rootpath1) ? $rootpath1 : '../';
// title website
$title = 'Trang Người Dùng';
$page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 1;
// limit
$limit = 20;
$start = abs(intval($limit*$page)-$limit);
// include file
include_once('tables.php');
include_once('database.php');
include_once('function.php');
include_once('helper.php');

// autoload class
spl_autoload_register('autoload');
function autoload($name){
    global $rootpath1;
    $file = $rootpath1.'libs/classes/'.$name.'.php';
    if(file_exists($file)){
        require_once($file);
    }
}
// authorize
$core = new Core1() or die('Error: Core System');
unset($core);
$nguoithue_user = Core1::$nguoithue_id;
$datauser = Core1::$get_user;
$title = "Quản lý người thuê trọ";
?>