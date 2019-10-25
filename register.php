<?php
/**
 * 注册
 */
require_once 'common.php';
$post = $_POST;
if ($post) {
    require_once 'conn/conn.php';
    if($post['captcha']!==$_SESSION['captcha']){
        echo "<script>alert('验证码错误，注册失败');location.href='register.php'</script>";
        exit;
    }
    $user_info=queryGet('ys_user',"username='{$post['username']}'");
    if($user_info){//用户存在
        echo "<script>alert('用户名已存在，注册失败');location.href='register.php'</script>";
        exit;
    }else{
        $res=insert('ys_user',[
                'username'=>$post['username'],
            'password'=>md5($post['password']),
            'phone'=>$post['phone'],
            'reg_time'=>date('Y-m-d H:i:s')
            ]);
        if(!$res){
            echo "<script>alert('注册失败');location.href='register.php'</script>";
            exit;
        }
        echo "<script>alert('注册成功');location.href='login.php'</script>";
        exit;
    }
    exit;
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>注册</title>
    <link href="./css/zhuce.css" type="text/css" rel="stylesheet"/>
    <link href="./css/common.css" type="text/css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery.js"></script>
</head>
<body>
<form action="" method="post" id="register">
<div class="all">
    <div class="p">注册新用户</div>
    <br/>
    <div class="info-content">
        <label for="username" class="l">用&nbsp;户&nbsp;名:</label>
        <div class="d">
            <input name="username" id="username" type="text" class="i">
        </div>
        <br/><br/>
        <label for="phonenumber" class="l">手&nbsp;机&nbsp;号:</label>
        <div class="d">
            <input name="phone" id="phonenumber" type="text" class="i">
        </div>
        <br/><br/>
        <label for="login_password" class="l">登录密码:</label>
        <div class="d">
            <input name="password" id="login_password" type="password" class="i">
        </div>
        <br/><br/>
        <label for="confirm_password" class="l">确认密码:</label>
        <div class="d">
            <input name="repassword" id="confirm_password" type="password" class="i">
        </div>
        <br/><br/>
        <label for="ver_code" class="l">验&nbsp;证&nbsp;码:</label>
        <div class="d">
            <input name="captcha" id="ver_code" type="text" class="i captcha">
            <img src="admin/function/captcha.php" onclick="this.src=this.src.split('?')[0]+'?v='+(new Date).getTime();" style="border-radius:1px;"/>
        </div>
        <br/><br/>
        <input type="checkbox" name="agree" style="margin-left:100px;display:inline-block;" value="1"/>
        <span style="font-size:10px;">我已阅读并同意《用户注册协议》</span>
        <br/><br/>
        <button id="submit" style="margin-left:120px;height:30px;width:300px;display:inline-block;;border-radius:10px;">同意以上协议并注册</button>
    </div>
    <div class="information">
        <div class="content">
            <a href="index.php">返回首页</a>
            <a href="login.php">已有帐号?登录</a>
        </div>
    </div>
</div>
</form>
<script>
    $("#submit").click(function () {
        if(!$("#username").val()){
            alert('用户名不能为空');
            return false;
        }
        if(!$("#phonenumber").val()){
            alert('手机号不能为空');
            return false;
        }
        if(!$("#login_password").val()){
            alert('密码不能为空');
            return false;
        }
        if(!$("#confirm_password").val()){
            alert('确认密码不能为空');
            return false;
        }else if($("#login_password").val()!==$("#confirm_password").val()){
            alert('两次密码不一致');
            return false;
        }
        if(!$("#ver_code").val()){
            alert('验证码不能为空');
            return false;
        }
    });
</script>
</body>
</html>