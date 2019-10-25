<?php
/**
 * 预约
 */
require_once 'common.php';
header("content-type:text/html;charset=utf-8");
require_once 'conn/conn.php';//引入数据库

$pagesize = 10; //1. 每页显示记录数
$page = 1; //2. 当前页数
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page < 1) {
        $page = 1;
    }
} else {
    $page = 1;
}
$data = queryPaginate('ys_yuding', $pagesize, $page);
$id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
$appointment_list = $id ? queryGetAll('ys_user_appointment', "user_id='{$id}'") : [];
$list = array_map(function ($e) use ($appointment_list) {
    $e['appointment'] = false;
    foreach ($appointment_list as $a) {
        if ($e['id'] == $a['appointment']) {
            $e['appointment'] = true;
            break;
        }
    }
    return $e;
}, $data['data']);

$html = '';
foreach ($list as $k => $v) {
    $html .= '<div class="item">
<div class="pic"><img src="admin/' . $v['images'] . '"></div>
<div class="info">
<span>课程：' . $v['course'] . '</span>
<span>时间：' . $v['start_time'] . '-' . $v['end_time'] . '</span>
<span>价格：' . $v['price'] . '</span>
</div>
<div class="method">
<div class="appointment-list" data-id="'.$v['id'].'">预约列表</div>
<div data-id="' . $v['id'] . '" class="appointment ' . ($v['appointment'] ? 'active">已预约' : '">预约') . '</div>
</div>
</div>';
}

$post = $_POST;
if (isset($post['appointment'])) {//表单提交的数据
    if (!isset($_SESSION['user']['id'])) {
        echo json_encode(['status' => 0, 'msg' => '先登录']);
        exit;
    }
    $where="appointment='{$_POST['id']}' and user_id='{$_SESSION['user']['id']}'";
    $info = queryGet('ys_user_appointment', $where);
    if($post['appointment']==1){
        if ($info) {
            echo json_encode(['status' => 0, 'msg' => '已预约，无需重复']);
            exit;
        }else{
            $res = insert('ys_user_appointment', [
                'user_id' => $_SESSION['user']['id'],
                'appointment' => $_POST['id'],
                'add_time' => date('Y-m-d H:i:s')
            ]);
            echo json_encode(['status' => $res ? 1 : 0, 'msg' => $res ? '预约成功' : '预约失败']);
            exit;
        }
    }else{
        if ($info) {
            $res=mysqlDelete('ys_user_appointment',$where);
            echo json_encode(['status' => $res ? 1 : 0, 'msg' => $res ? '取消预约成功' : '取消预约失败']);
            exit;
        }else{
            echo json_encode(['status' =>  0, 'msg' => '并未预约']);
            exit;
        }
    }
}

if(isset($post['appointmentId'])){
    $pagesize=10000;
    $field="a.add_time,a.user_id userid,b.phone,b.username";
    $where="a.appointment=".$post['appointmentId'];
    $join="left join ys_user b on b.userid=a.user_id";
    $order="a.add_time desc";
    $group="";
    $having="";
    $data=queryPaginate('ys_user_appointment a',$pagesize,$page,$field,$where,$join,$order,$group,$having);
    echo json_encode(['status'=>1,'msg'=>'获取成功','data'=>$data['data']?$data['data']:[]]);
    exit;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>健康养生咨询</title>
    <link href="./css/yuding.css" type="text/css" rel="stylesheet"/>
    <style>
        .method{
            display: flex;
        }
        .appointment-list{
            background-color: rgb(54,132,88);
            border-radius: 3px;
            border: 1px solid gray;
            width: 100px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            font-size: 24px;
            font-family: "宋体";
            margin: 0 auto;
            margin-top: 10px;
            cursor: pointer;
        }
        .member-list{
            display: flex;
            flex-direction: column;
            padding: 10px;
        }
        .member-list div{
            display: flex;
        }
        .member-list .username{
            margin-right: 20px;
        }
    </style>
</head>
<body>
<div class="all">
    <!--  html头部 -->
    <?php require_once 'header.php' ?>
    <div class="nav">
        <div class="t_nav">
            <?php echo $html ?>
        </div>
        <?php echo $data['render'] ?>
    </div>
    <?php require_once 'footer.php' ?>
</div>
<script>
    layui.use(['layer'],function () {
        var layer=layui.layer;

        //预约，取消
        $("body").on('click', '.appointment', function (e) {
            var id = e.target.dataset.id;
            var appointment = 1;
            var obj=e.target;
            if (e.target.classList.contains('active')) {//已预约
                appointment=0
            }
            //ajax无刷新提交请求
            var post_data = {
                appointment: appointment,
                id:id
            };
            $.ajax({
                url: '',
                dataType: 'json',
                type: 'post',
                data: post_data,
                success: function (e) {
                    if (e.status) {
                        if(appointment){
                            obj.classList.add('active');
                            obj.innerHTML='已预约';
                        }else{
                            obj.classList.remove('active');
                            obj.innerHTML='预约';
                        }
                    }
                    layer.msg(e.msg)
                }
            });
        });

        //查看预约会员列表
        $("body").on('click', '.appointment-list', function (e) {
            var id=this.dataset.id;
            //ajax无刷新提交请求
            var post_data = {
                appointmentId: id
            };
            $.ajax({
                url: '',
                dataType: 'json',
                type: 'post',
                data: post_data,
                success: function (e) {
                    if (e.status) {
                        console.log(e)
                        var html='';
                        $.each(e.data,function (k,v) {
                            html+='<div>' +
                                '<div class="username">会员：'+v.username+'</div>' +
                                '<div>预定时间：'+v.add_time+'</div></div>';
                        });
                        if(!html){
                            html+='<div>暂无会员预定</div>';
                        }
                    }
                    layer.open({
                        type: 1,
                        title:'课程会员列表',
                        area: ['420px', '240px'], //宽高
                        content: '<div class="member-list">'+html+'</div>'
                    });
                }
            });
        });
    });

</script>
</body>
</html>