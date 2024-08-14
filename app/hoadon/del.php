<?php
define('IN_SITE',true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Hoadon();
if($obj->delete($id)){
    redirect(homeurl());
}
else{
    redirect($homeurl."?error=hoadon");
}
?>