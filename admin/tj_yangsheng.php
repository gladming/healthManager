<?php
require_once 'common.php';
require_once '../conn/conn.php';

//修改
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    if(!$id)exit;
    $info=queryGet('ys_yangshengzhishi','id='.$id);
}

//更新或添加
if(isset($_POST['images'])){
    $images=$_POST['images'];
    $name=$_POST['title'];
    $introduce=$_POST['intro'];
    $id=isset($_POST['id'])?$_POST['id']:0;
    if(!$images||!$name||!$introduce){
        echo json_encode(['status'=>0,'msg'=>'缺少参数']);
        exit;
    }
    if(!$id){//新增
        $res=insert('ys_yangshengzhishi',[
            'images'=>$images,
            'name'=>$name,
            'introduce'=>$introduce,
            'content'=>$_POST['content'],
            'add_time'=>date('Y-m-d H:i:s'),
            'add_id'=>$_SESSION['admin']['id']
        ]);
    }else{//修改
        $res=mysqlUpdate('ys_yangshengzhishi',[
            'images'=>$images,
            'name'=>$name,
            'introduce'=>$introduce,
            'content'=>$_POST['content'],
            'add_time'=>date('Y-m-d H:i:s'),
            'add_id'=>$_SESSION['admin']['id']
        ],'id='.$id);
    }

    if($res){
        echo json_encode(['status'=>1,'msg'=>'添加成功']);
        exit;
    }
    echo json_encode(['status'=>0,'msg'=>'添加失败']);
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>添加养生</title>
    <link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php require_once 'head.php' ?>
<?php require_once 'left.php' ?>
<div id="right">
    <p class="where-is">您当前的位置：养生管理－＞<?php echo isset($_GET['id'])?'修改':'增加';?>养生</p>
    <table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="175" bgcolor="#666666">
                <table width="670" height="175" border="0" align="center" cellpadding="0" cellspacing="1">
                    <input type="file" name="file" class="inputcss" accept="image/gif,image/jpeg,image/png,image.bmp" style="display: none">
                    <form name="form1" action="" method="post" onSubmit="return chkinput(this)">
                        <tr>
                            <td width="82" height="25" bgcolor="#FFFFFF">养生封面：</td>
                            <td width="585" bgcolor="#FFFFFF">
                                <div style="text-align:left; ">
                                    <a id="upload-pic" style="background:url(images/denglu.gif);margin-left: 10px;">上传图片</a>
                                    <input type="hidden" name="images" value="<?php echo isset($_GET['id'])?$info['images']:'';?>">
                                    <img id="images-show" src="<?php echo isset($_GET['id'])?$info['images']:'';?>" style="display: <?php echo isset($_GET['id'])?'inline':'none';?>;width: 40px;height: 40px;"/>
                                </div>
                                <progress id="progressBar" value="0" max="100" style="width: 300px;display: none"></progress>
                            </td>
                        </tr>
                        <tr>
                            <td width="82" height="25" bgcolor="#FFFFFF">养生名称：</td>
                            <td width="585" bgcolor="#FFFFFF">
                                <div style="text-align:left; ">
                                    <input type="text" name="title" size="50" class="inputcss" value="<?php echo isset($_GET['id'])?$info['name']:'';?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="125" bgcolor="#FFFFFF">养生描述：</td>
                            <td height="125" bgcolor="#FFFFFF">
                                <div style="text-align:left; ">
                                    <textarea name="intro" rows="8" cols="70" style="margin-left:10px;"><?php echo isset($_GET['id'])?$info['introduce']:'';?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="125" bgcolor="#FFFFFF">详细内容：</td>
                            <td height="125" bgcolor="#FFFFFF">
                                <div style="text-align:left; ">
                                    <textarea name="content" rows="8" cols="70" style="margin-left:10px;" id="content"><?php echo isset($_GET['id'])?$info['content']:'';?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="25" colspan="2" bgcolor="#FFFFFF">
                                <input type="submit" name="submit" value="<?php echo isset($_GET['id'])?'修改':'增加';?>" class="buttoncss"
                                       style="width:55px; height:30px;">
                                &nbsp;&nbsp;
                                <input type="reset" value="重写" class="buttoncss " style="width:55px; height:30px;">
                                <input type="hidden" id="id" value="<?php echo (isset($_GET['id'])?$_GET['id']:0);?>">
                                <a href="javascript:void(0)" onclick="history.back();"  style="width:55px; height:30px;font-size: 16px; text-decoration: none;margin-left: 20px;">返回</a>
                            </td>
                        </tr>
                    </form>
                </table>
            </td>
        </tr>
    </table>
</div>
<?php require_once 'footer.php';?>
<script type="text/javascript">
    /**
     * 检查提交内容
     * @param form
     * @returns {boolean}
     */
    function chkinput(form) {
        form.content.value=layedit.getContent(layeditIndex);
        if (form.images.value == '') {
            alert("请上传图片!");
        }
        if (form.title.value == "") {
            alert("请输入养生名称!");
            form.title.select();
        }
        if (form.intro.value == "") {
            alert("请输入养生介绍!");
            form.intro.select();
        }
        //ajax无刷新提交请求
        var post_data={
            title:form.title.value,
            images:form.images.value,
            intro:form.intro.value,
            content:form.content.value
        };
        var type='添加';
        if($('#id').val()!='0'){
            post_data.id=parseInt($('#id').val());
            type='修改';
        }
        $.ajax({
            url:'',
            dataType:'json',
            type:'post',
            data:post_data,
            success:function (e) {
                if(e.status){
                    console.log(e.msg)
                    if(confirm(type+'成功，继续'+type+'？')){
                        location.reload();
                    }else{
                        location.href='ck_yangsheng.php';
                    }
                }else{
                    alert(e.msg)
                }
            }
        });
        return (false);
    }
</script>
</body>
</html>

