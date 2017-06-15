<?php
header('Content-Type:text/html; charset=utf-8');
include('./conn.php');
$username=$_POST['username'];
$content=$_POST['content'];
$art_id=$_POST['id'];
if($username&&$content){
    $sql="insert into guestbook(username,art_id,content,flag) values('$username','$art_id','$content',1)";
    $re=mysqli_query($conn,$sql);
    if($re){
        alert('评论成功！','./content.php?id='.$art_id.'');

    }else{
        echo '评论失败！';
    }
}else{
    alert('请输入用户名或者内容','./content.php?id='.$art_id.'');
}


?>
