<?php
require_once 'common.php';
require_once '../conn/conn.php';
header("content-type:text/html;charset=utf-8");

//修改
$info=queryGet('ys_shouye');

//更新或添加
if(isset($_POST['images'])){
    $res=mysqlUpdate('ys_shouye',[
        'images'=>$_POST['images'],
        'title'=>$_POST['title'],
        'content'=>$_POST['content'],
        'add_time'=>date('Y-m-d H:i:s'),
        'add_id'=>$_SESSION['admin']['id'],
    ]);

    if($res){
        echo json_encode(['status'=>1,'msg'=>'修改成功']);
        exit;
    }
    echo json_encode(['status'=>0,'msg'=>'修改失败']);
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加预订</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once 'head.php'?>
<?php require_once 'left.php'?>
<div id="right" >
    <p class="where-is">您当前的位置：预订管理－＞修改首页内容</p>
    <input type="file" name="file" class="inputcss" accept="image/gif,image/jpeg,image/png,image.bmp" style="display: none">
    <form action="" method="post" onsubmit="return chkinput(this)" enctype="multipart/form-data">
        <table width="670" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td  bgcolor="#666666"><table width="670" cellspacing="1">
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>图片:</div></td>
                            <td  bgcolor="#FFFFFF">
                                <div style="text-align:left; ">
                                    <a id="upload-pic" style="background:url(images/denglu.gif); margin-left: 10px;">上传图片</a>
                                    <input type="hidden" name="images" value="<?php echo $info['images']?>">
                                    <img id="images-show" src="<?php echo $info['images']?>" style="width: 40px;height: 40px;"/>
                                </div>
                                <progress id="progressBar" value="0" max="100" style="width: 300px;display: none"></progress>
                            </td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>标题:</div></td>
                            <td  bgcolor="#FFFFFF"><input name="title" type="text" id="title" size="50" class="inputcss" value="<?php echo $info['title']?>"/></td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>内容:</div></td>
                            <td height="125" bgcolor="#FFFFFF"><div style="text-align:left; " class="answer">
                                    <textarea name="content" rows="8" cols="70" style="margin-left:10px;" id="content"><?php echo $info['content']?></textarea>
                                </div></td>
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2" bgcolor="#FFFFFF";>
                                <input type="submit" name="ok"  value="修&nbsp;改" style=" margin-right:10px;"/>
                                <input type="reset"  value="重&nbsp;置"/>
                                <a href="javascript:void(0)" onclick="history.back();"  style="width:55px; height:30px;font-size: 16px; text-decoration: none;margin-left: 20px;">返回</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php require_once 'footer.php'?>
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
            alert("请输入名称!");
            form.course.select();
        }
        if (form.content == "") {
            alert("请输入内容!");
            form.start_time.select();
        }
        //ajax无刷新提交请求
        var post_data={
            title:form.title.value,
            images:form.images.value,
            content:form.content.value,
        };
        $.ajax({
            url:'',
            dataType:'json',
            type:'post',
            data:post_data,
            success:function (e) {
                if(e.status){
                    console.log(e.msg)
                    location.reload();
                }
                alert(e.msg)
            }
        });
        return (false);
    }
</script>
</body>
</html>
