<?php
/**
 * 头部分
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/14
 * Time: 23:07
 */
?>
<style>
    li.active{
        background-color: crimson;
    }
</style>
<link href="layui/css/layui.css" type="text/css" rel="stylesheet"/>
<script src="bootstrap/js/jquery.js"></script>
<script src="layui/layui.js"></script>
<div class="top">
    <div class="l_top">
        <img src="images/bpic4.jpg" width="50" height="80" align="left"/>
        <p>健康养生网</p>
        <p>Hwalth keeping in good health</p>
    </div>
    <div class="r_top">
        <?php
        if(isset($_SESSION['user'])){
            $user=$_SESSION['user'];
            ?>
            <div class="is-login">
                <a class="username">欢迎回来，<?php echo $user['username'];?></a>
                <a id="logout">退出</a>
            </div>
            <?php
        }else{?>
            <div class="r_top1">
                <p><a href="login.php">登录</a></p>
            </div>
            <div class="r_top2">
                <p><a href="register.php">注册</a></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
//判断是否为首页
if(SELF_PAGE!='index.php') {
    if(SELF_PAGE=='healthKnowledge.php'){?>
        <div class="nav">
            <div class="left">
                <div class="l_left1">
                    <img src="images/bpic11.jpg"  width="300" height="70" align="left"/>
                </div>
                <div class="l_left2">
                    <p><strong>瑜伽</strong></p>
                </div>
                <div class="l_left3">
                    <ul>
                        <li>瑜伽一词，是从印度梵语yug或yuj而来，是一个发音，其含意为“一致”“结合”或“和谐”。瑜伽就是一个通过提升意识，帮助人类充分发挥潜能的体系。瑜伽 姿势运用古老而易于掌握的技巧，改善人们生理、心理、情感和精神方面的能力，是一种达到身体、心灵与精神和谐统一的运动方式。古印度人更相信人可以与天合一，他们以不同的瑜伽修炼方法融入日常生活而奉行不渝：道德、忘我的动作、稳定的头脑、宗教性的责任、无欲无求、冥想和宇宙的自然和创造。 　　近年在世界各地兴起和大热的瑜伽，并非只是一套流行或时髦的健身运动这么简单。瑜伽是一种非常古老的能量知识修炼方法，集哲学、科学和艺术于一身。瑜伽的基础建筑在古印度哲学上，数千年来，心理、生理和精神上的戒律已经成为印度文化中的一个重要组成部分。古代的瑜伽信徒发展了瑜伽体系，因为他们深信通过运动身体和调控呼吸，可以完全控制心智和情感，以及保持永远健康的身体。
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right">
                <img src="images/bpic10.jpg"  width="950" height="480" align="right"/>
            </div>
        </div>
    <?php }
    ?>

    <!--非首页头部导航-->
    <link href="css/common.css" type="text/css" rel="stylesheet"/>
    <div class="navigator">
        <div class="item <?php if(SELF_PAGE=='index.php')echo'active'?>"><a href="index.php">首页</a></div>
        <div class="item <?php if(SELF_PAGE=='healthKnowledge.php')echo'active'?>"><a href="healthKnowledge.php">养生知识</a></div>
        <div class="item <?php if(SELF_PAGE=='healthConsult.php')echo'active'?>"><a href="healthConsult.php">健康咨询</a></div>
        <div class="item <?php if(SELF_PAGE=='appointment.php')echo'active'?>"><a href="appointment.php">预订</a></div>
        <!--<div class="r_daohan">
            <ul>
                <li <?php /*if(SELF_PAGE=='index.php')echo'class="active"'*/?>><a href="index.php">首页</a></li>
                <li <?php /*if(SELF_PAGE=='healthKnowledge.php')echo'class="active"'*/?>><a href="healthKnowledge.php">养生知识</a></li>
                <li <?php /*if(SELF_PAGE=='healthConsult.php')echo'class="active"'*/?>><a href="healthConsult.php">健康咨询</a></li>
                <li <?php /*if(SELF_PAGE=='appointment.php')echo'class="active"'*/?>><a href="appointment.php">预订</a></li>
            </ul>

        </div>-->
    </div>
    <?php }else{
    ?>
    <!--首页头部导航-->
    <div class="nav">
        <div class="l_left">
            <p>让养生更全面，让生活更健康</p>
        </div>
        <div class="right_r">
            <div class="r_top3">
                <p><a href="index.php" class="active">首页|</a></p>
            </div>
            <div class="r_top4">
                <p><a href="healthKnowledge.php">养生知识</a></p>
            </div>
            <div class="r_top5">
                <p><a href="healthConsult.php">|健康咨询</a></p>
            </div>
            <div class="r_top6">
                <p><a href="appointment.php">|预订</a></p>
            </div>
        </div>
    </div>
<?php }?>

<script>
    $("body").on('click','#logout',function () {
        location.href='logout.php';
    });
</script>
