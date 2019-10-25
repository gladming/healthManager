<?php
/**
 * 公共方法
 * Created by PhpStorm.
 * User: gladming
 * Date: 2019/10/14
 * Time: 15:19
 */
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
if (!session_id()) session_start();
define('SELF_PAGE',substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1));