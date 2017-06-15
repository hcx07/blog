<?php
include('./conn.php');
include('./header.php');
$keywords=$_GET['keywords'];
?>
    <div id="main">
        <h3 class="zidaohang">当前位置：<a href="./index.php">首页</a> &gt; <?php echo $keywords;?></h3>
        <ul>
            <?php
            $pagesize=4;//每页显示条数
            $page=isset($_GET['page'])?$_GET['page']:1;//当前页码
            $sql="select * from article where title like '%$keywords%' or content like '%$keywords%' or author like '%$keywords%' order by id desc";            $res=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($res);
            $pagecount=ceil($num/$pagesize);//总页数
            //      var_dump($pagecount);exit;
            $start=($page-1)*$pagesize;
            $sql="select * from article where title like '%$keywords%' or content like '%$keywords%' or author like '%$keywords%' limit $start,$pagesize ";
            $re=mysqli_query($conn,$sql);
           //var_dump($re);exit;
            while($row=mysqli_fetch_assoc($re)){
                echo '<li>';
                echo '<h4><a href="./content.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
                echo ' <p>'.mb_substr($row['content'],0,60,'utf-8').'...</p>';
                echo '</li>';
            }

            for($i=1;$i<=$pagecount;$i++){
                echo '<a href="./index.php?page='.$i.'">' .$i. '</a>';
            }
            ?>
        </ul>
    </div>
<?php
include('./right.php');
?>
<?php
include('./footer.php')
?>