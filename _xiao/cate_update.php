<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
include('./header.php');
$id=$_GET['id'];
$sql="select * from category where id=$id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
?>
<div class="mainbox">
    <div class="note">
        <h4>修改分类</h4>
        <form action="cate_update_save.php" method="post">
            <input type="hidden" value="<?php echo $id;?>" name="id"/>
            <table class="news_form">
                <tr>
                    <td>分类名：</td>
                    <td><input type="text" name="cate_name" class="inbox" value="<?php echo $row['cate_name'];?>"/></td>
                </tr>

                <tr>
                    <td>排序号：</td>
                    <td><input type="text" name="order_no" class="inbox" value="<?php echo $row['order_no'];?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="提交"/></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('./foot.php');?>
