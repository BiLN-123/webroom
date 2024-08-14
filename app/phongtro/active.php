<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new Phongtro();
if($obj->active($ma)){
    redirect(homeurl()."/app?m=phongtro&a=liststt");
}
else{
    redirect(homeurl()."/app?m=phongtro&a=liststt");
}
?>