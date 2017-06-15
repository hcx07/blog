<?php
include('./conn.php');
include('./header.php');
$id=$_GET['id'];
$sql="select article.*,category.cate_name from article,category where article.cate_id=category.id and article.id=$id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
//var_dump($row);exit;
$sql="update article set views=views+1 where id=$id";
mysqli_query($conn,$sql);
?>

<div id="main">
    <h3 class="zidaohang">当前位置：<a href="./index.php">首页</a> &gt; <?php echo $row['cate_name'];?> &gt; <?php echo $row['title'];?></h3>
    <div><h1><?php echo $row['title'];?></h1></div>
    <div class="div">
        <strong>发布时间：</strong><?php echo $row['intime'];?>&ensp;&ensp;&ensp;&ensp;
        <strong>作者：</strong><?php echo $row['author'];?>&ensp;&ensp;&ensp;&ensp;
        <strong>访问人数：</strong><?php echo $row['views'];?>
    </div>
    <br/>
    <div>



    <?php
    /**
    //echo nl2br($row['content']);
     *实现长文章分页的代码
     *原理：
     *利用一个数组来记录文章每一页（用p0、p1、p2...做手动标记）的起始字节数，然后通过利用php函数操作这个数组去显示分页后的文章。分页显示，传递ptag（与tag的值一样）值。
     *利用到的php函数：
     *1、strlen("字符串") - 返回字符串的字节总数。
     *2、strpos("字符串","匹配字符") - 返回字符串中出现的第一个相匹配的字符所在的字节序数。
     *3、substr("字符串","起始位置","终止位置") - 返回字符串中指定起止位置的若干字符。
     */
    $content = str_replace("\n","<br>",$row['content']);//把文章赋给变量$content
    $articleCounts = strlen($content);//返回$content（文章）的总字节数
    $isTrue = true;//循环标记
    $tag = 0;//分页标记、数组下标
    //echo "字节总数：".$articleCounts."<br>";//测试信息
    //寻找标记“ptag”，并把其位置（所在的字节数）赋给数组array[]------------------------------------------
    while($isTrue){
        $startAt = strpos($content,"p".$tag);//得到相应ptag的字节序数
        if($startAt != false){ //如果有标记（返回值不是false），则记录位置
            $array[$tag++] = $startAt;
        }else{ //如果没有标记，则将数组array[0]赋值'\0'
            $array[$tag] = '\0';
            $isTrue = false;
        }
    }
    //循环输出标记位置-------------------------------------------------------------测试信息
//    for($i = 0; $i < $tag; $i++){
//        echo $array[$i]."<br>";
//    }
//    echo "------------------------------ <br>";
    //输出内容---------------------------------------------------------------------
    if($array[0] == '\0'){ //判断是否有标记
        echo $content; //没有标记的情况，单页显示
    }else{ //有标记的情况，分页显示
    //输出分页内容
        if( isset($_GET['ptag']) ){ //判断是否有ptag值传递，有则显示第 ptag+1 页，否则显示第一页（ptag=0）
            $ptag = $_GET['ptag']; //把ptag的值赋给变量$ptag
            if($ptag < $tag){ //判断参数是否有误
                //echo "有值传递,显示第".($ptag+1)."页<br>"; //测试信息
                //echo "值为：".$ptag."<br>"; //测试信息
                echo @nl2br(substr($content,$array[$ptag - 1] + 2,$array[$ptag] - $array[$ptag - 1] - 2));//显示ptag+1页的内容
            }else{echo "参数有误";}
        }
        else{ //没有ptag值传递的情况，显示第一页（ptag=0）
            //echo "无值传递,显示第1页<br>"; //测试信息
            echo substr($content,0,$array[0] - 1);//显示第一页的内容
        }
    }
    //循环显示页数链接-------------------------------------------------------------
    if($array[0] != '\0'){ //在有手动标记的情况下才显示页数链接
        $pager='';
        for($i = 0;$i < $tag;$i++){
            if(@$ptag == $i){ //如果是本页，则粗体显示
                $pager .= " <a href='content.php?id=$id&ptag=$i'><b>".($i+1)."</b></a> ";
            }
            else{ //不是本页
                $pager .=" <a href='content.php?id=$id&ptag=$i'>".($i+1)."</a> ";
            }
        }
        echo '<br/>';
        echo "<br/>跳转至第".$pager."页"; //输出链接
    }
    ?>




    </div>
    <br/>
    <div>
        <h3 class="h3_title">评论</h3>
        <?php
        $sql="select * from guestbook where art_id=$id and flag=1 order by intime desc";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                echo $row['username'].'&ensp;&ensp;在&ensp;&ensp;'.$row['intime'].'&ensp;&ensp;说：<br/>'.$row['content'].'<br/><br/>';
            }
        }else{
            echo '暂无评论内容';
        }
        ?>
    </div>
    <br/>
    <div>
    <form action="./liuyan_save.php" method="post">
        <input type="hidden" value=<?php echo $id;?> name="id"/>
        <p>用户名： <input type="text" name="username"/></p>
        <p>输入评论：<br/><textarea name="content" cols="60" rows="6"></textarea></p>
        <p><input type="submit" value="发表评论"/></p>
    </form></div>
</div>
<?php
include('./right.php');
?>
<?php
include('./footer.php')
?>