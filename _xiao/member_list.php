<?php
include('../conn.php');
include('./header.php');
?>
    <div class="mainbox">
        <div class="note">
            <h4>会员列表</h4>
            <table class="news_list">
                <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="15%">用户名</th>
                    <th width="10%">密码</th>
                    <th width="10%">会员等级</th>
                    <th width="10%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql=$sql="select * from member order by id desc";;
                $rs=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($rs)){
                    echo '<tr>';
                    echo '<td>'.$row['id'].'</td>';
                    echo '<td>'.$row['mename'].'</td>';
                    echo '<td>'.$row['mepassword'].'</td>';
                    echo '<td>'.$row['lev'].'</td>';
                    echo '<td>';
                    echo '<a href="./member_update.php?id='.$row['id'].'">修改</a> / ';
                    echo '<a href="./member_del.php?id='. $row['id'] .'">删除</a>';
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