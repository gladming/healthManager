<?php
require_once 'common.php';
require_once 'conn/conn.php';
header("content-type:text/html;charset=utf-8");
$post = $_POST;
if ($post) {//表单提交的数据
    require_once 'conn/conn.php';//引入数据库
    if($post['captcha']!==$_SESSION['captcha']){//检测验证码
        echo "<script>alert('验证码错误');location.href='login.php'</script>";
        exit;
    }
    $user_info=queryGet('ys_user',"username='{$post['username']}'");//查询数据库数据，用户信息
    if(!$user_info){//用户不存在
        echo "<script>alert('用户名不存在，请检查输入是否准确');location.href='login.php'</script>";
        exit;
    }else{
        if($user_info['password']==md5($post['password'])){//密码一致
            echo "<script>alert('登录成功');location.href='index.php'</script>";
            exit;
        }
        echo "<script>alert('登录失败，密码错误');location.href='login.php'</script>";
        exit;
    }
    exit;
}

$info=queryGet('ys_shouye');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>米粒健康养生网</title>
    <link href="./css/index.css" type="text/css" rel="stylesheet"/>
    <link href="./css/common.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="all">
    <?php require_once 'header.php'?>
    <!-- <轮播开始> -->
    <div class="tupan">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- 指示器 -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- 轮播图片及说明文字 -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/bpic9.jpg" style="width: 100%;height: 400px" alt="图片1">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="images/bpic7.jpg" style="width: 100%;height: 400px" alt="图片2">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="images/bpic8.jpg" style="width: 100%;height: 400px" alt="图片3">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
            </div>

            <!-- 控制按钮：左右切换 -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="ys">
        <strong>养生简介</strong>
    </div>
    <div class="jianjie">
        <div class="left_l">
            <img src="images/bpic3.jpg" width="600" height="430" align="left"/>
        </div>
        <div class="right_r01">
            <div class="r_right1">
                <p><a href="#">养生</a></p>
            </div>
            <hr size="5" color="gray"/>
            <div class="r_right2">
                <p>
                    　在生活中，不少人都将养生之道等同于养生之术，其实不然。中医将养生的理论称为“养生之道”，而将养生的方法称为“养生之术”。朝暮叩齿三百六，七老八十好牙口；头为精神之府，日梳五百健耳目；脚为第二心脏，搓涌泉保健康；日咽唾液三百口，保你活到九十九；日撮谷道一百遍，治病消疾又延年；随手揉腹一百遍，通和气血禆神元；人之肾气通于耳，扯拉搓揉健身体；常伸懒腰乃古训，消疲养血又养心。
                </p>
            </div>
            <div class="r_right1">
                <p>养生特点</p>
            </div>
            <hr size="5" color="gray"/>
            <div class="r_right2">
                <p>养生的特点就是要强调在养生之道和养生之术基础上的“因人施养”，在群体中并不强求统一性。例如，甲需要重点形体养护；乙需要着重调理饮食；而丙则需要着重调摄精神等，如果我们对甲乙丙三人
                    不分青红皂白，一律要求他们加强形体锻炼或一律改变某种饮食结构，或一律静坐练习气功就不一定符合每个人的养生需要了。
                </p>
            </div>
        </div>
    </div>
    <div class="ys">
        <strong>膳食养生</strong>
    </div>
    <div class="weibu">
        <div class="l_wz">
            <div class="l_wz1">
                <p>前言</p>
            </div>
            <div class="l_wz2">
                <p>
                    如今人们越来越注重健康，因此对于日常的饮食也越来越关注，吃什么对身体有益已经成为人们最关心的话题。养生滋补不一定是那些昂贵的保养品，也不一定是什么山珍海味，而普通廉价的食物同样具有养生保健的功效，对于一些疾病还有预防作用，不仅如此还可延年益寿。
                </p>
            </div>
            <hr size="5" color="gray"/>
            <div class="l_wz3">
                <p><a href="healthDaily.php"><?php echo $info?$info['title']?$info['title']:'日常膳食养生':'日常膳食养生'?></a></p>
            </div>
            <div class="l_wz4">
                <?php
                if($info){
                    echo $info['content'];
                }
                ?>
            </div>
        </div>
        <div class="r_tupan">
            <img src="admin/<?php echo $info?$info['images']?$info['images']:'images/bpic3.jpg':'images/bpic3.jpg'?>" width="600" height="430" align="left"/>
        </div>
    </div>
    <?php require_once 'footer.php'?>
</div>
</body>
</html>

