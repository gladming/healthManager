<?php
require_once "../conn/conn.php";
$pagesize = 5; //1. 每页显示记录数
$page = 1; //2. 当前页数
if(isset($_GET['page'])){
	$page = $_GET['page'];
	if($page<1){$page = 1;}
}else{
	$page = 1;
}
$data=queryPaginate('ys_user',$pagesize,$page);
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
    <p class="where-is">您当前的位置：用户管理－＞查看用户</p>

    <form action="deluser.php" method="post">
        <table width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align:right;">

            <tr>
                <td height="50" bgcolor="#666666">
                    <table width="670" height="25" border="0" align="center" cellpadding="0" cellspacing="1">

                        <tr>
                            <td width="50" height="25" bgcolor="#FFFFFF"><div align="center">复选</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">用户姓名</div></td>
                            <td width="100" bgcolor="#FFFFFF"><div align="center">手机</div></td>
                            <td width="200" bgcolor="#FFFFFF"><div align="center">注册时间</div></td>
                            <td width="248" bgcolor="#FFFFFF"><div align="center">操作</div></td>


                        </tr>
                        <?php foreach($data['data'] as $v){ ?>
                            <tr>
                                <td height="25" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name='aa[]' value='<?php echo $v['userid']?>'>
                                    </div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['username']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['phone']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $v['reg_time']?></div></td>
                                <td height="25" bgcolor="#FFFFFF"><div align="center"><a class="delete" href= "javascript:void(0);" data-id="<?php echo $v['userid']?>">删除</a>
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
        deleteData('user',ids);
    });
</script>
</body>
</html>
