<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_GET['id'];
$title=$_POST['title'];
$cate_id=$_POST['cate_id'];
$author=$_POST['author'];
$content=$_POST['content'];


$sql="update article set title='$title',cate_id=$cate_id,author='$author',content='$content' where id=$id";

$r=mysqli_query($conn,$sql);

if($r){

    alert('Succeed!','./article_list.php');
}else{
    echo 'Fail!';
    echo mysqli_error($conn);
}
?>