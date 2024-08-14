<?php
define('IN_SITE', true);
$rootpath = '../../';
require_once($rootpath.'libs/core.php');
$obj = new DSBaiviet();
if($obj->active($id)){
    redirect(homeurl()."/app?m=baiviet&a=list");
}
else{
    redirect(homeurl()."/app?m=baiviet&a=list");
}
?>