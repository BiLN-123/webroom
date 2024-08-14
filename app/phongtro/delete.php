<?php
define('IN_SITE',true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Phongtro();
if($obj->delete($ma)){
    redirect(homeurl()."/app?m=phongtro&a=list");
}
else{
    redirect($homeurl."?error=hoadon");
}
?>