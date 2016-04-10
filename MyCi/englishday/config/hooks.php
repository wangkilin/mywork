<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_controller'] = array(
        'class'    => 'TestHook',
        'function' => 'hookTest',
        'filename' => 'TestHook.php',
        'filepath' => 'hooks',
        'params'   => array('param1', 'param2', 'pre_controller')
);
$hook['post_controller'] = array(
        'class'    => 'TestHook',
        'function' => 'hookTest',
        'filename' => 'TestHook.php',
        'filepath' => 'hooks',
        'params'   => array('param1', 'param2', 'post_controller')
);

$hook['pre_admin/Index/index'] = function () {
	echo "this is called Hook";
};
