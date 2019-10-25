<?php
require_once '../conn/conn.php';
?>
<!--<link href="../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>-->
<script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
<link href="../layui/css/layui.css" type="text/css" rel="stylesheet"/>
<link href="css/common.css" type="text/css" rel="stylesheet"/>
<script src="../layui/layui.js"></script>
<style>
    table a{
        text-decoration: none;
    }
</style>
<div id="header" style="display: flex;align-items: flex-end;">
    <h1>米粒健康养生后台管理系统</h1>
    <div style="width:100px;height:40px;line-height:40px;margin-left: auto;">
        <span><?php echo $_SESSION['admin']['name'];?></span>
        <a id="logout">退出</a>
    </div>
</div>
<script>
    $('#logout').click(function () {
        location.href='logout.php';
    });

    var layedit,layeditIndex;
    layui.use(['layedit','upload'], function(){
        layedit = layui.layedit;
        layedit.set({
            uploadImage: {
                url: 'upload.php' //接口url
                ,type: 'post' //默认post
                ,accept:'images'
            }
        });
        layeditIndex=layedit.build('content'); //建立编辑器
    });

</script>
