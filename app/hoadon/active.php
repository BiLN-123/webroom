<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Hoadon();
if($obj->active($id)){
    redirect(homeurl()."/app?m=hoadon&a=thuhoadon");
}
else{
    redirect(homeurl()."/app?m=hoadon&a=thuhoadon");
}
?>