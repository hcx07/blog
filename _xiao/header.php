<?php
session_start();
if(!isset($_SESSION['user_id'])){
    alert('登录超时，请重新登录','./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台管理系统</title>
    <link href="images/index.css" type="text/css" rel="stylesheet"/>
    <script src="images/jquery.js"></script>
</head>
<body>
<header>
    <h1>网站后台管理系统</h1>
    <p>
        <a href="./index.php"><span class="icon home"></span>系统首页</a>
        <a href="./login_out.php"><span class="icon quit"></span>安全退出</a>
    </p>
</header>
<section>
    <nav>
        <h3>欢迎您来到管理后台</h3>
        <p>登陆名：<strong><?php echo $_SESSION['username']; ?>  </strong><br/>身　份：<strong><?php echo $_SESSION['flag']; ?></strong></p>
        <dl>
            <dt><span class="icon board"></span>文章分类</dt>
            <dd>
                <a href="cate_new.php">-&emsp;新增分类</a>
                <a href="./cate_list.php">-&emsp;分类列表</a>
            </dd>
            <dt><span class="icon news"></span>文章管理</dt>
            <dd>
                <a href="article_new.php">-&emsp;发布文章</a>
                <a href="article_list.php">-&emsp;文章列表</a>
            </dd>
            <!--        <dt><span class="icon pro"></span>产品管理</dt>-->
            <!--        <dd>-->
            <!--            <a href="#">-&emsp;新增产品</a>-->
            <!--            <a href="#">-&emsp;产品列表</a>-->
            <!--            <a href="#">-&emsp;产品分类</a>-->
            <!--        </dd>-->
            <dt><span class="icon book"></span>留言管理</dt>
            <dd>
                <a href="./liuyan.php">-&emsp;留言列表</a>
            </dd>
            <dt><span class="icon flink"></span>友情连接管理</dt>
            <dd>
                <a href="#">-&emsp;新增连接</a>
                <a href="#">-&emsp;连接列表</a>
            </dd>
            <dt><span class="icon admin"></span>会员管理</dt>
            <dd>
                <a href="./member_list.php">-&emsp;会员列表</a>
            </dd>
        </dl>
    </nav>