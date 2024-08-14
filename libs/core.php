<?php
if(!defined('IN_SITE')) die('Error: restricted access');
// timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');
// start session
session_start();
$rootpath = isset($rootpath) ? $rootpath : '../';
// title website
$title = 'Quản Lý Phòng Thuê Trọ';
$page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 1;
// limit
// include file
include_once('tables.php');
include_once('database.php');
include_once('function.php');
include_once('helper.php');

// autoload class
spl_autoload_register('autoload');
function autoload($name){
    global $rootpath;
    $file = $rootpath.'libs/classes/'.$name.'.php';
    if(file_exists($file)){
        require_once($file);
    }
}
// authorize
$core = new Core() or die('Error: Core System');
unset($core);
$user_id = Core::$account_id;
$datauser = Core::$get_user;
$title = "Quản lý hệ thống";
?>