<?php
include('../conn.php');
include('./header.php');
?>
<div class="mainbox">
    <div class="note">
        <h4>分类列表</h4>
        <table class="news_list">
            <thead>
            <tr>
                <th>ID</th>
                <th>分类名</th>
                <th>排序号</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from category order by order_no asc,id desc";
            $rs=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($rs)){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['cate_name'].'</td>';
                echo '<td>'.$row['order_no'].'</td>';
                echo '<td>';
                echo '<a href="./cate_update.php?id='.$row['id'].'">修改</a> / ';
                echo '<a href="./cate_del.php?id='. $row['id'] .'">删除</a>';
                echo '</td>';
                echo '</tr>';

            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include('./foot.php');
?>