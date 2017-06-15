<?php
include('../conn.php');
include('./header.php');
?>
<div class="mainbox">
    <div class="note">
        <h4>留言列表</h4>
        <table class="news_list">
            <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="15%">用户名</th>
                <th width="10%">文章ID</th>
                <th width="10%">评论内容</th>
                <th width="30%">评论时间</th>
                <th width="10%">状态</th>
                <th width="15%">审核</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from guestbook order by id desc";
            $rs=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($rs)){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['art_id'].'</td>';
                echo '<td>'.mb_substr($row['content'],0,50,'utf-8').'</td>';
                echo '<td>'.$row['intime'].'</td>';
                echo '<td>';
                if($row['flag']==0){
                    echo '已隐藏留言';
                }elseif($row['flag']==1){
                    echo '已显示留言';
                }
                echo '</td>';
                echo '<td>';
                echo '<a href="./liuyan_hide.php?id='.$row['id'].'&flag='.$row['flag'].'">显示-隐藏</a> / ';
                echo '<a href="./liuyan_del.php?id='. $row['id'] .'">删除</a>';
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