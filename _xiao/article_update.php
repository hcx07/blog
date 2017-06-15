<?php
header('Content-Type:text/html; charset=utf-8');
include('../conn.php');
include('./header.php');
$id=$_GET['id'];
$sql="select * from article where id=$id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
?>
<div class="mainbox">
    <div class="note">
        <h4>文章修改</h4>
        <form action="./article_update_save.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <table class="news_form">
                <tr>
                    <td>标题：</td>
                    <td><input type="text" name="title" class="inbox" value="<?php echo $row['title'];?>"/></td>
                </tr>
                <tr>
                    <td>文章分类：</td>
                    <td>
                        <select class="inbox" name="cate_id">
                        <?php
                        $sql="select * from category order by order_no asc,id desc";
                        $res=mysqli_query($conn,$sql);
                        while($row2=mysqli_fetch_assoc($res)){
                            if($row2['id']==$row['cate_id']){
                                echo '<option value="'.$row2['id'].'" selected="selected">'.$row2['cate_name'].'</option>';
                            }else{
                                echo '<option value="'.$row2['id'].'">'.$row2['cate_name'].'</option>';
                            }
                        }
                        mysqli_free_result($rs);
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>作　　者：</td>

                    <td><input type="text" name="author" class="inbox" value="<?php echo $row['author'];?>" /></td>
                </tr>
                <tr>
                    <td>文章内容：</td>
                    <td><script id="container" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo $row['content'];?></script>
                        <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
                        <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                        </script>
                    </td>  
                    </td>                
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
