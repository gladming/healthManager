<?php
/**
 * 健康咨询
 */
require_once 'common.php';
require_once 'conn/conn.php';//引入数据库
header("content-type:text/html;charset=utf-8");

$pagesize = 5; //1. 每页显示记录数
$page = 1; //2. 当前页数
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page<1){$page = 1;}
}else{
    $page = 1;
}
$data=queryPaginate('ys_jiankanzixun',$pagesize,$page);

$post = $_POST;
if ($post) {//表单提交的数据
    exit;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>健康养生咨询</title>
    <link href="./css/jiankangzixun.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="all">
    <!--  html头部 -->
    <?php require_once 'header.php'?>
    <?php
    foreach ($data['data'] as $k=>$v){
        echo '<div class="mather01" data-id="'.$v['id'].'">
        <div class="wd01">
            <img src="admin/'.$v['images'].'" width="400" height="200"/>
        </div>
        <div class="wd02">
            <div class="title"><a href="detail.php?type=healthConsult&id='.$v['id'].'"  style="padding-bottom: 10px;line-height:25px;">'.$v['issue'].'</a></div>
            <div class="answer">'.$v['answer'].'</div>
        </div>
    </div>
    <hr size="1" color="gray" />';
    }
    ?>
    <?php echo $data['render'];?>
    <?php require_once 'footer.php'?>
</div>
</body>
</html>