<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>木鸟的博客</title>
    <meta name="description" content="何长枭的个人博客" />
    <meta name="keywords" content="木鸟，IT技术，PHP技术,HTML技术,诗歌，散文，何长枭，" />
    <link type="text/css" rel="stylesheet" href="./skin/index.css"/>
</head>
<body>
<div id="header">
    <h1>蔽&emsp;芾&emsp;甘&emsp;棠</h1>
    <form action="./search.php" method="get">
        <input type="text" name="keywords" class="inbox"/>
        <input type="image" src="images/search.jpg" class="inbtn"/>
    </form>
</div>
<div class="menu_bg">
    <div id="menu">
        <a href="./">首页</a>
        <?php
        $sql="select * from category order by order_no asc,id desc";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res)){
            echo '<a href="./list-cate_id-'.$row['id'].'.html">'.$row['cate_name'].'</a>';
        }
        ?>
	<a href="#">关于我</a>
    </div>
</div>
<div class="banner">
    <img src="images/banner.jpg" alt="" width="100%"/>
</div>

<div class="content_bg">
    <div id="content">
