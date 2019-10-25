<?php
/**
 * 课程会员预定列表
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
$field="a.add_time,a.user_id userid,b.phone,b.username";
$where="a.appointment=".$id;
$join="left join ys_user b on b.userid=a.user_id";
$order="a.add_time desc";
$group="";
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
    <p class="where-is">您当前的位置：预定管理－＞查看课程预定会员列表</p>

    <form action="" method="post">
        <table width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align:right;">

            <tr>
                <td height="50" bgcolor="#666666">
                    <table width="670" height="25" border="0" align="center" cellpadding="0" cellspacing="1">

                        <tr>
                            <td width="50" height="25" bgcolor="#FFFFFF"><div align="center">复选</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">用户名</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">手机</div></td>
                            <td width="200" bgcolor="#FFFFFF"><div align="center">预定时间</div></td>
                            <td width="248" bgcolor="#FFFFFF"><div align="center">操作</div></td>


                        </tr>
                        <?php foreach($data['data'] as $v){ ?>
                            <tr>
                                <td height="25" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name='aa[]' value='<?php echo $v['userid']?>'>
                                    </div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['username']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['phone']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['add_time']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="center"><a href= "javascript:void(0)" data-id="<?php echo $v['userid']?>">-</a>
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
</script>
</body>
</html>
