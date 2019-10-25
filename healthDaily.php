<?php
/**
 *日常养生
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
$data_live=queryPaginate('ys_sangshi',10,$page);
$list_live='';

foreach ($data_live['data'] as $k=>$v){
    $list_live.='<div class="item-two">
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
    <title>日常膳食养生</title>
    <link href="./css/richangyangsheng.css" type="text/css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script> -->
</head>
<body>
<div class="all">
    <?php require_once 'header.php'?>
    <div class="shshiyshe">
        <p>日常膳食养生</p>
    </div>
    <div class="yshi">
        <?php echo $list_live?>
    </div>
    <?php echo $data_live['render']?>
    <?php require_once 'footer.php'?>
</div>
</body>
</html>