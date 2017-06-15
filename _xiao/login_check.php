<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$username=$_POST['username'];
$password=md5($_POST['password']);
//$password=md5($password);
//验证数据有效性
if(strlen($username)<4){alert('你的用户名这么短？！','./login.php');}
if(strlen($password)<6){alert('你的密码和你一样短是不行的！','./login.php');}
//验证账号密码是否有效
$sql="select * from admin where username='{$username}' and password='{$password}'";
$re=mysqli_query($conn,$sql);
if($row=mysqli_fetch_assoc($re)){
    //在其他页面也能识别账户信息
    session_start();
    $_SESSION['user_id']=$row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
    $_SESSION['flag']=$row['flag'];
    alert('恭喜你，可以开整了！','./index.php');
}else{alert('系统检测到你涉及恶意登录，已记下你的IP并自动拨打110报警！！！','./login.php');};

?>
