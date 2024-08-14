<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Selectuser();
if($obj->delete($id)){
    redirect(homeurl()."/app?m=accountnguoithue&a=listaccount");
}
else{
    redirect($homeurl."?error=hoadon");
}
?>