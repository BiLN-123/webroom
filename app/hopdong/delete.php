<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Hopdong();
if($obj->delete($id)){
    redirect(homeurl()."/app?m=hopdong&a=list");
}
else{
    redirect($homeurl."?error=hoadon");
}
?>