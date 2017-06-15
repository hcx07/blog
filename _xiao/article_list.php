<?php
include('../conn.php');
include('./header.php');
?>
    <div class="mainbox">
        <div class="note">
            <h4>文章列表</h4>
            <table class="news_list">
                <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="15%">标题</th>
                    <th width="10%">文章分类</th>
                    <th width="10%">作者</th>
                    <th width="35%">内容</th>
                    <th width="10%">点击率</th>
                    <th width="10%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql=$sql="select article.*,category.cate_name from article,category where article.cate_id=category.id order by article.id desc";;
                $rs=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($rs)){
                    echo '<tr>';
                    echo '<td>'.$row['id'].'</td>';
                    echo '<td>'.$row['title'].'</td>';
                    echo '<td>'.$row['cate_name'].'</td>';
                    echo '<td>'.$row['author'].'</td>';
		    echo '<td>';
                    $str=addslashes($row['content']);
                    $str=preg_replace('/<img (.*) \/>/i','',$str);
                    $str=preg_replace('/<p[^>]*>/i','',$str);
                    $str=preg_replace('/<\/p>/i','',$str);
                    $str = preg_replace ( "/<a[^>]*>/i", "", $str );
                    $str = preg_replace ( "/<\/a>/i", "", $str );
                    $str = preg_replace ( "/<span[^>]*>/i", "", $str );
                    $str = preg_replace ( "/<\/span>/i", "", $str );
                    if(iconv_strlen($str,'utf-8')<20)
                    {
                        echo $str;
                    }else{
                        echo iconv_substr($str, 0,20,'UTF-8').'...';
                    }

                    echo '</td>';
                    echo '<td>'.$row['views'].'</td>';
                    echo '<td>';
                    echo '<a href="./article_update.php?id='.$row['id'].'">修改</a> / ';
                    echo '<a href="./article_del.php?id='. $row['id'] .'">删除</a>';
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