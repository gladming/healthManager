<?php
require_once 'common.php';
require_once '../conn/conn.php';
header("content-type:text/html;charset=utf-8");

//修改
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    if(!$id)exit;
    $info=queryGet('ys_yuding','id='.$id);
}

//更新或添加
if(isset($_POST['images'])){
    $images=$_POST['images'];
    $course=$_POST['course'];
    $price=$_POST['price'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $id=isset($_POST['id'])?$_POST['id']:0;
    if(!$images||!$course||!$start_time||!$end_time||!$price){
        echo json_encode(['status'=>0,'msg'=>'缺少参数']);
        exit;
    }
    if(!$id){//新增
        $res=insert('ys_yuding',[
            'images'=>$images,
            'course'=>$course,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
            'add_time'=>date('Y-m-d H:i:s'),
            'add_id'=>$_SESSION['admin']['id'],
            'price'=>$price,
        ]);
    }else{//修改
        $res=mysqlUpdate('ys_yuding',[
            'images'=>$images,
            'course'=>$course,
            'start_time'=>$start_time,
            'end_time'=>$end_time,
            'add_time'=>date('Y-m-d H:i:s'),
            'add_id'=>$_SESSION['admin']['id'],
            'price'=>$price,
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
    <p class="where-is">您当前的位置：预订管理－＞<?php echo isset($_GET['id'])?'修改':'增加';?>预订</p>
    <input type="file" name="file" class="inputcss" accept="image/gif,image/jpeg,image/png,image.bmp" style="display: none">
    <form action="shopym.php" method="post" onsubmit="return chkinput(this)" enctype="multipart/form-data">
        <table width="670" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td  bgcolor="#666666"><table width="670" cellspacing="1">
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>图片:</div></td>
                            <td  bgcolor="#FFFFFF">
                                <div style="text-align:left; ">
                                    <a id="upload-pic" style="background:url(images/denglu.gif); margin-left: 10px;">上传图片</a>
                                    <input type="hidden" name="images" value="<?php echo isset($_GET['id'])?$info['images']:'';?>">
                                    <img id="images-show" src="<?php echo isset($_GET['id'])?$info['images']:'';?>" style="display: <?php echo isset($_GET['id'])?'inline':'none';?>;width: 40px;height: 40px;"/>
                                </div>
                                <progress id="progressBar" value="0" max="100" style="width: 300px;display: none"></progress>
                            </td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>预订课程:</div></td>
                            <td  bgcolor="#FFFFFF"><input name="course" type="text" id="course" value="<?php echo isset($_GET['id'])?$info['course']:'';?>"/></td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>开始时间:</div></td>
                            <td  bgcolor="#FFFFFF"><input class="time" name="start_time" type="text" id="start_time" value="<?php echo isset($_GET['id'])?$info['start_time']:'';?>"/></td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>结束时间:</div></td>
                            <td  bgcolor="#FFFFFF"><input class="time" name="end_time" type="text" id="end_time" value="<?php echo isset($_GET['id'])?$info['end_time']:'';?>"/></td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>价格:</div></td>
                            <td  bgcolor="#FFFFFF"><input name="price" type="text" id="price" value="<?php echo isset($_GET['id'])?$info['price']:'';?>"/></td>
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2" bgcolor="#FFFFFF";>
                                <input type="submit" name="ok"  value="<?php echo isset($_GET['id'])?'修&nbsp;改':'增&nbsp;加';?>" style=" margin-right:10px;"/>
                                <input type="reset"  value="重&nbsp;置"/>
                                <input type="hidden" id="id" value="<?php echo (isset($_GET['id'])?$_GET['id']:0);?>">
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
        if (form.images.value == '') {
            alert("请上传图片!");
        }
        if (form.course.value == "") {
            alert("请输入课程名称!");
            form.course.select();
        }
        if (form.start_time.value == "") {
            alert("请输入开始!");
            form.start_time.select();
        }
        if (form.end_time.value == "") {
            alert("请输入结束时间!");
            form.end_time.select();
        }
        if (form.price.value == "") {
            alert("请输入养生介绍!");
            form.price.select();
        }
        //ajax无刷新提交请求
        var post_data={
            course:form.course.value,
            images:form.images.value,
            start_time:form.start_time.value,
            end_time:form.end_time.value,
            price:parseFloat(form.price.value),
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
                        location.href='ck_yuding.php';
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
