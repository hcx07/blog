<?php
include('./header.php');
include('../conn.php');
?>
<div class="mainbox">
    <div class="note">
        <h4>发表文章</h4>
        <form action="./article_new_save.php" method="post" enctype="multipart/form-data">
            <table class="news_form">
                <tr>
                    <td>标题：</td>
                    <td><input type="text" name="title" class="inbox"/></td>
                </tr>
                <tr>
                    <td>文章分类：</td>
                    <td>
                        <select class="inbox" name="cate_id">
                            <?php
                            $sql="select * from category order by order_no asc,id desc";
                            $res=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($res)){
                                echo '<option value="'.$row['id'].'">'.$row['cate_name'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>作　　者：</td>
                    <td><input type="text" name="author" class="inbox"/></td>
                </tr>
                <tr>
                    <td>文章内容：</td>
                    <td>
                        <script id="container" name="content" type="text/plain" style="width:100%;height:600px;"></script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="./ueditor/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="./ueditor/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                        </script>                    
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
<?php
include('./foot.php');
?>