<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
include('./header.php');
$id=$_GET['id'];
$sql="select * from member where id=$id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
?>
<div class="mainbox">
    <div class="note">
        <h4>会员修改</h4>
        <form action="./member_update_save.php" method="post">
            <input type="hidden" value="<?php echo $id;?>" name="id"/>
            <table class="news_form">
                <tr>
                    <td>用户名：</td>
                    <td><?php echo $row['mename'];?></td>
                </tr>
                <tr>
                    <td>会员等级：</td>
                    <td><input type="text" name="lev" class="inbox" value="<?php echo $row['lev'];?>"/></td>
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
