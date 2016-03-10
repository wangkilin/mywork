<?php
define('DAOHANG_INIT_IMAGE', true);
chdir('../app/');
$_GET['i'] = '1';
$_GET['c'] = 'entry';
$_GET['m'] = 'daohang';
if(empty($_GET['do'])){
     $_GET['do'] = 'index';
}
require_once './index.php';