<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new DSBaiviet();
if($obj->delete($id)){
    redirect(homeurl()."/app?m=baiviet&a=list");
}
else{
    redirect($homeurl."?error=hoadon");
}
?>