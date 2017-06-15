<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
$cate_name=$_POST['cate_name'];
$order_no=$_POST['order_no'];
$sql="insert into category(cate_name,order_no) values('$cate_name',$order_no)";
$r=mysqli_query($conn,$sql);
if($r){
    alert('新增成功','cate_list.php');
}else{
    echo '新增失败，此处概率比较低！';
}
?>
