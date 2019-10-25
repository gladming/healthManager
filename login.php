<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link href="./css/zhuce.css" type="text/css" rel="stylesheet"/>
    <link href="./css/common.css" type="text/css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery.js"></script>
</head>
<body>
<?php
require_once 'common.php';
$post = $_POST;
if (isset($post['username'])) {//表单提交的数据
    require_once 'conn/conn.php';//引入数据库
    if($post['captcha']!==$_SESSION['captcha']){//检测验证码
        echo "<script>alert('验证码错误');location.href='login.php'</script>";
        exit;
    }
    $user_info=queryGet('ys_user',"username='{$post['username']}'");//查询数据库数据，用户信息
    if(!$user_info){//用户不存在
        echo "<script>alert('用户名不存在，请检查输入是否准确');location.href='login.php'</script>";
        exit;
    }else{
        if($user_info['password']==md5($post['password'])){//密码一致
            //保存登录信息到session
            $_SESSION['user']=[
                    'username'=>$user_info['username'],
                'phone'=>$user_info['phone'],
                'id'=>$user_info['userid']
            ];

            echo "<script>alert('登录成功');location.href='index.php'</script>";
            exit;
        }
        echo "<script>alert('登录失败，密码错误');location.href='login.php'</script>";
        exit;
    }
    exit;
}
?>
<form action="" id="login" method="post">
    <div class="all">
        <div class="p">欢迎登录</div>
        <br/>
        <div class="info-content">
            <label for="username" class="l">用&nbsp;户&nbsp;名:</label>
            <div class="d">
                <input name="username" id="username" type="text" class="i">
            </div>
            <br/><br/>
            <label for="password" class="l">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
            <div class="d">
                <input name="password" id="password" type="password" class="i">
            </div>
            <br/><br/>
            <label for="ver_code" class="l">验&nbsp;证&nbsp;码:</label>
            <div class="d">
                <input name="captcha" id="ver_code" type="text" class="i captcha">
                <img src="admin/function/captcha.php" onclick="this.src=this.src.split('?')[0]+'?v='+(new Date).getTime();" style="border-radius:1px;"/>
            </div>
            <br/><br/>
            <button id="submit" style="margin-left:80px;height:30px;width:380px;display:inline-block;border-radius:10px;">登录</button>
        </div>
        <div class="information">
            <div class="content">
                <a href="index.php">返回首页</a>
                <a href="register.php">还没有帐号?注册</a>
            </div>
        </div>
    </div>
</form>
<script>
    //检测提交
    $("#submit").click(function () {
        if(!$("#username").val()){
            alert('用户名不能为空');
            return false;
        }
        if(!$("#password").val()){
            alert('密码不能为空');
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