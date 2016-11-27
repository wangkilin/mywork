<?php
// 网站目录
define('APP_PATH', dirname(dirname(__FILE__)));

include(dirname(__FILE__).'/../../lib/devboy/Application.php');

$settings = array('configFile'=>APP_PATH . '/config/config.php');
Application::getInstance($settings)->run();

/* EOF */