<?php
/**
 * 详情页
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/17
 * Time: 23:45
 */
require_once 'common.php';
require_once 'conn/conn.php';//引入数据库

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    if(!$id)exit;
    $table='';
    switch ($_GET['type']){
        case 'healthKnowledge':
            $table='ys_yangshengzhishi';
            break;
        case 'healthConsult':
            $table='ys_jiankanzixun';
            break;
    }
    $info=[];
    if($table){
        $data=queryGet($table,'id='.$id);
        $info['title']=$data?isset($data['issue'])?$data['issue']:$data['name']:'';
        $info['content']=$data?isset($data['introduce'])?$data['content']:$data['answer']:'';
        $info['images']=$data?isset($data['images'])?$data['images']:'':'';
    }
}

?>
<html>
<head>
    <title>详情</title>
    <link href="./css/yangshengzhishi.css" type="text/css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script> -->
    <style>
        .title{
            text-align: center;
            line-height: 80px;
        }
        .content{
            width: 1000px;
            margin: 0 auto;
            line-height: 25px;
        }
        .pic{
            width: 1000px;
            height: 600px;
            margin: 0 auto;
            padding-bottom: 20px;
            overflow: hidden;
        }
        .pic img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="all">
    <?php require_once 'header.php'?>
    <div class="container">
        <div class="title"><h1><?php echo $info?$info['title']:''?></h1></div>
        <div class="pic"><img src="admin/<?php echo $info?$info['images']:''?>"/></div>
        <div class="content"><?php echo $info?$info['content']:''?></div>
    </div>
    <?php require_once 'footer.php'?>
</div>
<script>
    var img=$('.content img');
    $.each(img,function (k,v) {
        v.src=v.src.replace(/upload/,'admin/upload')
    })
</script>
</body>
</html>
