<?php
/**
 * 修改管理员密码
 * Created by PhpStorm.
 * User: gladming
 * Date: 2019/10/16
 * Time: 10:25
 */
require_once 'common.php';
require_once '../conn/conn.php';
header("content-type:text/html;charset=utf-8");


//更新或添加
if(isset($_POST['password'])){
    $password=md5($_POST['password']);
    $captcha=$_POST['captcha'];
    if($captcha!=$_SESSION['captcha']){
        echo "<script>alert('验证码错误');history.back();</script>";
        exit;
    }
    $res=mysqlUpdate('ys_admin',[
        'password'=>$password,
    ],'id='.$_SESSION['admin']['id']);

    if($res){
        unset($_SESSION['admin']);
        echo "<script>alert('修改成功');location.href='index.php'</script>";
    }else{
        echo "<script>alert('修改失败');history.back();</script>";
    }
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
    <p style= background-color:rgb(54,132,88); padding-left:10px; color:#FFF;">您当前的位置：个人中心－＞修改密码</p>
    <input type="file" name="file" class="inputcss" accept="image/gif,image/jpeg,image/png,image.bmp" style="display: none">
    <form action="changePassword.php" method="post" onsubmit="return chkinput(this)" enctype="multipart/form-data">
        <table width="670" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td  bgcolor="#666666"><table width="670" cellspacing="1">
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>新密码:</div></td>
                            <td  bgcolor="#FFFFFF"><input name="password" type="password" id="password"/></td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>确认密码：</div></td>
                            <td  bgcolor="#FFFFFF"><input name="re_password" type="password" id="re_password"/></td>
                        </tr>
                        <tr>
                            <td  bgcolor="#FFFFFF"><div>验证码:</div></td>
                            <td  bgcolor="#FFFFFF">
                                <input name="captcha" type="text" id="captcha"/>
                                <img src="function/captcha.php" onclick="this.src=this.src.split('?')[0]+'?v='+(new Date).getTime();" style="border-radius:1px;"/>
                            </td>
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
        if (form.password.value == '') {
            alert("输入密码!");
            return false;
        }
        if (form.re_password.value == "") {
            alert("请确认密码!");
            form.re_password.select();
            return false;
        }
        if (form.captcha.value == "") {
            alert("请输入验证码!");
            form.captcha.select();
            return false;
        }
        if(form.password.value!=form.re_password.value){
            alert("两次密码不一致!");
            form.re_password.select();
            return false;
        }
        return true;
    }
</script>
</body>
</html>