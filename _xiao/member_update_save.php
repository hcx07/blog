<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_POST['id'];
$lev=$_POST['lev'];
if(strlen($lev)==0){
    echo '内容不能为空'.'<br/>';
    echo '<a href="./index.php">返回首页</a>';
    exit;
}
//修改记录
$sql="update member set lev='$lev' where id='$id'";
$res=mysqli_query($conn,$sql);
//var_dump($res);exit;
if($res){
    header('Location:./member_list.php');
}else{
    echo '修改失败'.'<br/>';
    echo mysqli_error($conn);
}
?>