<?php
/**
 * 退出登录
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/15
 * Time: 1:47
 */
require_once 'common.php';
if (session_id()){
    unset($_SESSION['admin']);
    echo "<script>alert('退出成功');location.href='index.php';</script>";
    exit;
}