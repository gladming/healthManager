<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/15
 * Time: 1:20
 */
//开启session
if (!session_id()) session_start();
//默认页面字符
header("content-type:text/html;charset=utf-8");
//设置默认时区
date_default_timezone_set("Asia/Shanghai");
//判断登录，否则跳转到登录
if(substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1)!='index.php'){
    $admin=isset($_SESSION['admin'])?$_SESSION['admin']:false;
    if(!$admin){
        echo "<script>alert('先登录');location.href='index.php';</script>";
    }
}

/**
 * Notes:获取用户ip
 * User: gladming
 * DateTime: 2019/10/16  9:31
 * @return mixed
 */
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}