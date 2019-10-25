<?php
/**
 * 删除数据操作
 */
require_once '../conn/conn.php';

$type=isset($_GET['type'])?$_GET['type']:'';
$id=isset($_GET['id'])?$_GET['id']:'';
if(!$type||!$id){
    echo json_encode(['status'=>0,'msg'=>'缺少参数']);
    exit;
}
$table='';
$field='id';
switch ($_GET['type']){
    //健康资讯
    case 'jiankangzixun':
        $table='ys_jiankanzixun';
        break;
    //用户
    case 'user':
        $table='ys_user';
        $field='userid';
        break;
    //预订
    case 'yuding':
        $table='ys_yuding';
        break;
    //养生
    case 'yangsheng':
        $table='ys_yangshengzhishi';
        break;
    //管理员
    case 'admin':
        $table='ys_admin';
        break;
    //用户预约
    case 'user_appointment':
        $table='ys_user_appointment';
        break;
}
if(is_array($id)){
    $where=$field.' in('.implode(',',$id).')';
}else{
    $where=$field."='{$id}'";
}
$res=mysqlDelete($table,$where);
if($res){
    echo json_encode(['status'=>1,'msg'=>'删除成功']);
    exit;
}
echo json_encode(['status'=>0,'msg'=>'删除失败']);
?>