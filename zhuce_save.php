<?php
header('Content-Type:text/html; charset=utf-8');
include('./conn.php');
$mename=$_POST['mename'];
$mepassword=$_POST['mepassword'];
$mepassword2=$_POST['mepassword2'];

if($mepassword!=$mepassword2){
    echo '两次输入的密码不一致！';exit;
}
$sql="insert into member(mename,mepassword) values('$mename','$mepassword')";
$re=mysqli_query($conn,$sql);
if($re){
    session_start();
    $id=mysqli_insert_id($conn);
    $sql="select * from member where id=$id";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $_SESSION['mename']=$row['mename'];
    $_SESSION['lev']=$row['lev'];

    echo '注册成功! <a href="./index.php">回到首页</a>';

}else{
    echo '注册失败！';
}
?>
