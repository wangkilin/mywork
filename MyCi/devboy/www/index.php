<?php
// 网站目录
define('APP_PATH', dirname(dirname(__FILE__)));

include(dirname(dirname(dirname(__FILE__))).'/lib/devboy/Application.php');

Application::getInstance()->run();