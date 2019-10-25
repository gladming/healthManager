<?php
/**
 * 会员预定课程详情列表
 */
require_once "../conn/conn.php";
$pagesize = 5; //1. 每页显示记录数
$page = 1; //2. 当前页数
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page<1){$page = 1;}
}else{
    $page = 1;
}
$id=isset($_GET['id'])?$_GET['id']:0;
$field="a.add_time,a.user_id userid,a.id appointmentId,b.course,b.price,b.start_time,b.end_time,b.id as courseId";
$where="a.user_id=".$id;
$join="left join ys_yuding b on b.id=a.appointment";
$order="a.add_time desc";
$group="a.appointment";
$having="";
$data=queryPaginate('ys_user_appointment a',$pagesize,$page,$field,$where,$join,$order,$group,$having);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查看用户</title>
    <link href="css/index.css"rel="stylesheet" type="text/css" />
</head>

<body>
<?php require_once 'head.php'?>
<?php require_once 'left.php'?>
<div id="right" >
    <p class="where-is">您当前的位置：预定管理－＞查看会员预定课程列表</p>

    <form action="" method="post">
        <table width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align:right;">

            <tr>
                <td height="50" bgcolor="#666666">
                    <table width="670" height="25" border="0" align="center" cellpadding="0" cellspacing="1">

                        <tr>
                            <td width="50" height="25" bgcolor="#FFFFFF"><div align="center">复选</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">课程名</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">价格</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">时间</div></td>
                            <td width="200" bgcolor="#FFFFFF"><div align="center">预定时间</div></td>
                            <td width="248" bgcolor="#FFFFFF"><div align="center">操作</div></td>


                        </tr>
                        <?php foreach($data['data'] as $v){ ?>
                            <tr>
                                <td height="25" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name='aa[]' value='<?php echo $v['appointmentId']?>'>
                                    </div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['course']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['price']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['start_time'].'-'.$v['end_time']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['add_time']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="center"><a class="delete" href= "javascript:void(0)" data-id="<?php echo $v['appointmentId']?>">取消</a>
                                    </div></td>
                            </tr>
                        <?php }?>
                    </table></td>
            </tr>
        </table>
        <?php echo $data['render'];?>
    </form>



</div>
<?require_once 'footer.php'?>
<script type="text/javascript">
    $(".delete").on('click',function (e) {
        var ids=[];
        var id=e.target.dataset.id;
        var checked=$('input[type=checkbox]:checked');
        if(checked.length>0){
            if(!confirm('删除勾选的项吗？')){
                return;
            }
            $.each(checked,function(k,v){
                ids.push(v.value);
            });
            console.log(ids)

        }else{
            ids.push(id);
            if(!confirm('确定删除该项？')){
                return;
            }
        }
        deleteData('user_appointment',ids);
    });
</script>
</body>
</html>
