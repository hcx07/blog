<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_GET['id'];
//var_dump($_GET);exit;
if($_GET['flag']==1){
    $sql="update guestbook set flag=0 where id=$id";
    $res=mysqli_query($conn,$sql);
//var_dump($res);exit;
    if($res){
        alert('留言已隐藏！','./liuyan.php');
    }
}else{
    $sql="update guestbook set flag=1 where id=$id";
    $res=mysqli_query($conn,$sql);
//var_dump($res);exit;
    if($res){
        alert('留言已显示！','./liuyan.php');
    }
}

?>

