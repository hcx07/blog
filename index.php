<?php
include('./conn.php');
include('./header.php');

?>

<div id="main">
    <ul>
        <?php
        $pageSize=5;
        $url="index.php";
        $sql="select * from article";
        $res=mysqli_query($conn,$sql);
        $zong=mysqli_num_rows($res);
        $num=ceil($zong/$pageSize);//总页数
        $page = isset($_GET['page']) ? $_GET['page']:1;
//        var_dump($page);exit;
        $total_page = ceil($zong/$pageSize);
        //计算上一页
        $page = $page>$total_page?$total_page:$page;
        $page = $page<0?1:$page;
        $pre_page = $page==1?1:$page-1;
        //计算下一页
        $next_page = $page==$total_page?$total_page:$page+1;
//        echo $page;exit;
        $start=($page-1)*$pageSize;
        $sql="select * from article order by intime desc limit $start,$pageSize";
        $res=mysqli_query($conn,$sql);
        //var_dump($res);exit;
        while($row=mysqli_fetch_assoc($res)){
            echo '<li>';
            echo '<h4><a href="./content-id-'.$row['id'].'.html">'.$row['title'].'</a></h4>';
             echo '<p>';
            $str=$row['content'];
            $str=preg_replace('/<img (.*) \/>/i','',$str);
            $str=preg_replace('/<p[^>]*>/i','',$str);
            $str=preg_replace('/<\/p>/i','',$str);
            $str = preg_replace ( "/<a[^>]*>/i", "", $str );
            $str = preg_replace ( "/<\/a>/i", "", $str );
            $str = preg_replace ( "/<span[^>]*>/i", "", $str );
            $str = preg_replace ( "/<\/span>/i", "", $str );
            if(iconv_strlen($str,'utf-8')<70)
            {
                echo $str;
            }else{
                echo iconv_substr($str, 0,60,'UTF-8').'...';
            }
            echo '</p>'; 
            echo '</li>';        
	}

        ?>
        <table id="page-table" cellspacing="0">
            <tbody>
            <tr>
                <td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
                    <div style="color:blue;" id="turn-page">
                        总计<span id="totalPages"><?php echo $total_page;?></span>页&ensp;当前第 <span id="pageCurrent" "><?php echo $page;?></span>
                        页&emsp;
                        <span id="page-link">
                            <a style="color:blue;" href="main?page=1">第一页</a>&emsp;
                            <a style="color:blue;" href="main?page=<?php echo $pre_page;?>">上一页</a>&emsp;
                            <a style="color:blue;" href="main?page=<?php echo $next_page;?>">下一页</a>&emsp;
                            <a style="color:blue;" href="main?page=<?php echo $total_page;?>">最末页</a>
                        </span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
   </ul>
</div>
<?php
include('./right.php');
?>
<?php
include('./footer.php')
?>