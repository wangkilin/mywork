<?php
header('Content-Type:text/html; charset=UTF-8');

session_start();

define('NEW_LINE', "<br/>\r\n");

if (isset($_SESSION['SERVER_ID'])) {
    echo NEW_LINE;
    echo 'Previous Server is : ' . $_SESSION['SERVER_ID'];
}

if (isset($_SERVER['SERVER_ID'])) {
    echo NEW_LINE;
    echo 'Current Server is ：' . $_SERVER['SERVER_ID'];
    $_SESSION['SERVER_ID'] = $_SERVER['SERVER_ID'];
}

if (isset($_POST['username'])) {
    $_SESSION['USER_INFO'] = array('username' => $_POST['username']);
} else if (! isset($_SESSION['USER_INFO'])) {
    echo '<form action="" method="POST">';
    echo '<label for="username">Username</label>';
    echo '<input type="text" id="username" name="username" size="20" placeholder="Please enter username"/>';
    echo '<input type="submit" value=" OK "/>';
    echo '</form>';
    exit();
}

echo NEW_LINE;
echo 'Hello ' . $_SESSION['USER_INFO']['username'];
echo NEW_LINE;

/* EOF */
