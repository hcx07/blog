<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
session_start();
$_SESSION=[];
session_destroy();
alert('退出成功','./login.php');
?>
