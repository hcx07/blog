<?php
header('Content-Type:text/html; charset=utf-8');
include('./conn.php');
$mename=$_POST['mername'];
$mepassword=$_POST['mepassword'];
$sql="select * from member where mename='$mename' and mepassword='$mepassword'";
$re=mysqli_query($conn,$sql);
if(mysqli_num_rows($re)>0){
    session_start();
    $row=mysqli_fetch_assoc($re);
    $_SESSION['mename']=$row['mename'];
    $_SESSION['lev']=$row['lev'];
    echo '登录成功! <a href="./index.php">回到首页</a>';
}else{
    echo '登录失败!账号或密码错误。<a href="./index.php">回到首页</a>';
}
?>
