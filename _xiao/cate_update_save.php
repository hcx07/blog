<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$id=$_POST['id'];
$cate_name=$_POST['cate_name'];
$order_no=$_POST['order_no'];
//var_dump($order_no);exit;
//var_dump($id);
if(strlen($order_no)==0&&$cate_name==0){
    echo '内容不能为空'.'<br/>';
    echo '<a href="./index.php">返回首页</a>';
    exit;
}
//修改记录
$sql="update category set cate_name='$cate_name',order_no='$order_no' where id='$id'";
$res=mysqli_query($conn,$sql);
//var_dump($res);exit;
if($res){
    header('Location:./cate_list.php');
}else{
    echo '修改失败'.'<br/>';
    echo mysqli_error($conn);
}
?>