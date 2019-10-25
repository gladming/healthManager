<?php
require_once 'common.php';
require_once '../conn/conn.php';
$admin=isset($_SESSION['admin'])?$_SESSION['admin']?$_SESSION['admin']:[]:[];
if(!empty($admin)){
    header('location:admin.php');
}
if ($_POST) {
    $name = $_POST['yhm'];
    $password = md5($_POST['mm']);
    $yzm = $_POST['yzm'];
    if ($yzm == $_SESSION['captcha']) {
        $user_info=queryGet('ys_admin',"name='{$name}' and password='{$password}'");//查询数据库数据，用户信息
        if ($user_info) {
            $_SESSION['admin'] = ['id'=>$user_info['id'],'name'=>$user_info['name'],'auth'=>$user_info['auth']];
            //更新登录时间
            mysqlUpdate('ys_admin',['login_time'=>date('Y-m-d H:i:s'),'login_ip'=>getUserIpAddr()],"name='{$name}'");
            echo "<script>alert('登录成功');location.href='admin.php'</script>";
        } else {
            echo "<script>alert('登录失败');location.href='index.php'</script>";
        }
    } else {
        echo "<script>alert('验证码错误请重新验证');location.href='index.php'</script>";
    }
}//echo $sql;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <script src="../bootstrap/js/jquery-1.8.3.min.js" type="text/javascript"></script>
</head>

<body>

<div id="logo">
    <h1>米粒健康养生管理员登录</h1>
    <form action="" method="post" onsubmit="return checkForm(this);">
        <p>用户名：
            <input name="yhm" type="text" id="yhm" />
        </p>
        <p>
            密　码：
            <input name="mm" type="password" id="mm" />
        </p>
        <p>
            验证码：
            <input name="yzm" type="text"style=" width:60px;margin-right: 10px;"/><img src="function/captcha.php" onclick="this.src=this.src.split('?')[0]+'?v='+(new Date).getTime();" style="border-radius:1px;"/>
        </p>
        <button style="background:url(images/denglu.gif); border:0px; width:61px ; height:29px;  margin-left:30px;">登录</button>
        <input type="reset" style="background:url(images/denglu.gif)  ; width:61px ; border:0px;   height:29px; margin-left:30px; " value="重置" />
    </form>
</div>
<script type="text/javascript">

    //检测提交
    function checkForm(form){
        if(!form.yhm.value){
            alert('用户名不能为空');
            return false;
        }
        if(!form.mm.value){
            alert('密码不能为空');
            return false;
        }
        if(!form.yzm.value){
            alert('验证码不能为空');
            return false;
        }
    }
</script>
</body>
</html>
