<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$title=$_POST['title'];
$cate_id=$_POST['cate_id'];
$author=$_POST['author'];
$content=$_POST['content'];

$sql="insert into article(title,cate_id,author,content) values('$title',$cate_id,'$author','$content')";
$r=mysqli_query($conn,$sql);
//var_dump($r);
if($r){
    alert('Succeed!','./article_list.php');
}else{
    echo 'Fail!';
    echo mysqli_error($conn);
}
?>

