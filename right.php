<div id="rightbar">
    <p class="right1">
        <img src="images/right1.jpg" width="248px" alt=""/>
    </p>
    <?php
    //session_start();
    //var_dump($_SESSION['lev']);exit;
    if(isset($_SESSION['mename'])) {
        echo '<div id="member" class="right2">';
        echo '<p class="a">欢迎  <strong> ' . $_SESSION['mename'] . '</strong><br/></p>';
        echo ' <p class="b"><a href="./zhuxiao.php">注销</a></p>';
        echo '<br/><br/>';
        echo '</div>';
    }else{
    ?>
    <form action="#" method="post" class="right2">
        <h3>Sign up to our newsletter</h3>
        <p>加入史上最牛逼的博客，成为顶级会员！</p>
        用户名：<input type="text" name="mername" class="inbox" /><br/>
        密码：<input type="password" name="mepassword" class="inbox"/><br/>
        <input type="submit" value="登录" class="inbtn"/>&ensp;&ensp;&ensp;&ensp;
        <a href="#">立即注册</a>
    </form>
    <?php
    }
    ?>


<h3 class="right3">最新评论 TOP5</h3>
<ul class="right4">
    <?php
    $sql="select * from guestbook where flag=1 order by id desc limit 5";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            echo '<li>'.$row['intime'].'<br/>'.$row['username'].'&ensp;&ensp;说：<br/>'.$row['content'].'</li>';
        }
    }else{
        echo '暂无评论内容';
    }
    ?>
</ul>
</div>