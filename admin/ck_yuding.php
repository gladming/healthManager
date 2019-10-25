<?php
header("content-type:text/html;charset=utf-8");
require_once '../conn/conn.php';
$pagesize = 5; //1. 每页显示记录数
$page = 1; //2. 当前页数
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page<1){$page = 1;}
}else{
    $page = 1;
}
$data=queryPaginate('ys_yuding',$pagesize,$page);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改预订</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php require_once 'head.php'?>
<?php require_once 'left.php'?>

<div id="right" >
    <p style= background-color:rgb(54,132,88); padding-left:10px; color:#FFF;">您当前的位置：预订管理－＞查看预订</p>
    <form name="form1" method="post" action="">
        <table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td height="40" bgcolor="#666666"><table width="670" height="44" border="0" align="center" cellpadding="0" cellspacing="1">

                        <tr>
                            <td width="50" height="25" bgcolor="#FFFFFF"><div align="center">复选</div></td>
                            <td width="59" height="20" bgcolor="#FFFFFF"><div align="center">图片</div></td>
                            <td width="59" height="20" bgcolor="#FFFFFF"><div align="center">课程</div></td>
                            <td width="59" bgcolor="#FFFFFF"><div>时间</div></td>
                            <td width="59" bgcolor="#FFFFFF"><div>价格</div></td>
                            <td width="115" bgcolor="#FFFFFF"><div>操作</div></td>

                        </tr>
                        <?php foreach($data['data'] as $v){ ?>
                            <tr>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name='id[]' value='<?=$v['id']?>'></div></td>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><img src='<?php echo $v['images']?>' style="width: 40px;height: 40px;"/></div></td>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $v['course']?></div></td>
                                <td height="21" bgcolor="#FFFFFF"><div><?php echo $v['start_time'].'-'.$v['end_time']?></div></td>
                                <td height="21" bgcolor="#FFFFFF"><div><?php echo $v['price']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div>
                                        <a href="tj_yuding.php?id=<?php echo $v['id']?>" style="margin-right: 10px;">修改</a>
                                        <a class="delete" href= "javascript:void(0);" data-id="<?php echo $v['id']?>" style="margin-right: 10px;">删除</a>
                                        <a href="ck_appointment_user.php?id=<?php echo $v['id']?>" style="margin-right: 10px;">预定会员</a>
                                    </div></td>
                            </tr>
                        <?php } ?>
                    </table></td>
            </tr>
        </table>
        <?php echo $data['render'];?>
    </form>
</div>

<?php require_once 'footer.php'?>
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
        deleteData('yuding',ids);
    });
</script>
</body>
</html>

