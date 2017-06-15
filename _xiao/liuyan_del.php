<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_GET['id'];
$sql="delete from guestbook where id='$id'";
$res=mysqli_query($conn,$sql);
//var_dump($res);exit;
if($res){
    alert('删除成功','./liuyan.php');
}
?>