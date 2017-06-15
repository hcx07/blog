<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_GET['id'];

$rs=mysqli_query($conn,"select img from article where id=$id");
//var_dump($rs);exit;
$row=mysqli_fetch_assoc($rs);
//var_dump($row['img']);exit;
if(strlen($row['img'])>1){
    unlink('../upfiles/'.$row['img']);
}
mysqli_free_result($rs);
$sql="delete from article where id='$id'";
$res=mysqli_query($conn,$sql);
//var_dump($res);exit;
if($res){
    alert('删除成功','./article_list.php');
} else{
    echo '删除失败';
    echo mysqli_error($conn);
}
?>