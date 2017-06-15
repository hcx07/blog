<?php
header('Content-Type:text/html; charset=utf-8');
session_start();
$_SESSION=[];
session_destroy();
echo '注销成功！<a href="./index.php">回到首页</a>'
?>
