<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_GET['id'];
$sql="delete from member where id='$id'";
$res=mysqli_query($conn,$sql);
if($res){
    alert('删除成功','./member_list.php');
}
?>
