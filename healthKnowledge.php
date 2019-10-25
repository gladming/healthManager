<?php
/**
 * 养生知识
 */
require_once 'common.php';
require_once 'conn/conn.php';//引入数据库
header("content-type:text/html;charset=utf-8");

$pagesize = 8; //1. 每页显示记录数
$page = 1; //2. 当前页数
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page<1){$page = 1;}
}else{
    $page = 1;
}
$data_eat=queryPaginate('ys_yangshengzhishi',$pagesize,$page);
$data_live=queryPaginate('ys_sangshi',10,$page);
$list_eat='';
$list_live='';
$list_eat_right='';
$list_live_right='';
foreach ($data_eat['data'] as $k=>$v){
    if($k<4){
        $list_eat_right.='<li><a href="detail.php?type=healthKnowledge&id='.$v['id'].'">'.$v['name'].'</a></li>';
    }else{
        $list_live_right.='<li><a href="detail.php?type=healthKnowledge&id='.$v['id'].'">'.$v['name'].'</a></li>';
    }
    $list_eat.='<div class="item-one" data-id="'.$v['id'].'">
<div class="pic">
<img src="admin/'.$v['images'].'" /></div>
<div class="info">
<strong><span>'.$v['name'].'</span></strong>
<p>'.$v['introduce'].'</p>
</div>
</div>';
}

foreach ($data_live['data'] as $k=>$v){
    $list_live.='<div class="item-two" data-id="'.$v['id'].'">
<div class="pic">
<img src="view/images/'.$v['images'].'" /></div>
<div class="info">
<span>'.$v['name'].'</span>
</div>
</div>';
}

$post = $_POST;
if ($post) {//表单提交的数据
    exit;
}
?>
<html>
<head>
    <title>养生知识</title>
    <link href="./css/yangshengzhishi.css" type="text/css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script> -->
</head>
<body>
<div class="all">
    <?php require_once 'header.php'?>
    <div class="tpwz">
        <div class="left"><?php echo $list_eat;?>
        </div>
        <div class="right">
            <div class="r_right4">
                <img src="images/bpic25.jpg"  width="320" height="70" align="left"/>
            </div>
            <div class="r_right5">
                <p><strong>养生粥</strong></p>
            </div>
            <div class="r_right6">
                <ul>
                    <?php echo $list_eat_right?>
                </ul>

            </div>
            <div class="r_right7">
                <img src="images/bpic11.jpg"  width="320" height="70" align="left"/>
            </div>
            <div class="r_right8">
                <p><strong>古典瑜伽</strong></p>
            </div>
            <div class="r_right9">
                <ul>
                    <?php echo $list_live_right?>
                </ul>
            </div>
        </div>
    </div>
    <div class="shshiyshe">
        <a href="healthDaily.php">日常膳食养生</a>
    </div>
    <div class="yshi">
        <?php echo $list_live?>
    </div>
    <?php require_once 'footer.php'?>
</div>
<script>
    $('body').on('click','.item-one',function (e) {
        var id=this.dataset.id;
        location.href='detail.php?type=healthKnowledge&id='+id;
    })
</script>
</body>
</html>