<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Selectuser();
if($obj->active($id)){
    redirect(homeurl()."/app?m=accountnguoithue&a=listaccount");
}
else{
    redirect(homeurl()."/app?m=accountnguoithue&a=listaccount");
}
?>