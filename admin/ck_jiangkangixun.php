<?php
require_once 'common.php';
require_once '../conn/conn.php';
$pagesize = 5; //1. 每页显示记录数
$page = 1; //2. 当前页数
if(isset($_GET['page'])){
	$page = $_GET['page'];
	if($page<1){$page = 1;}
}else{
	$page = 1;
}
$data=queryPaginate('ys_jiankanzixun',$pagesize,$page);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查看健康咨询</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .answer{
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }
    </style>
</head>

<body>
<?php require_once 'head.php'?>
<?php require_once 'left.php'?>

<div id="right" >
    <p style= "background-color:rgb(54,132,88); padding-left:10px; color:#FFF;">您当前的位置：健康咨询管理－＞查看健康咨询</p>
    <form name="form1" method="post" action="deldingdan.php">
        <table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td height="40" bgcolor="#666666"><table width="670" height="44" border="0" align="center" cellpadding="0" cellspacing="1">

                        <tr>
                            <td width="33"  bgcolor="#FFFFFF"><div>复选</div></td>
                            <td width="121" height="20" bgcolor="#FFFFFF"><div align="center">图片</div></td>
                            <td width="121" height="20" bgcolor="#FFFFFF"><div align="center">问题</div></td>
                            <!--<td width="59" bgcolor="#FFFFFF"><div>回答</div></td>-->
                            <td width="115" bgcolor="#FFFFFF"><div>操作</div></td>

                        </tr>
                        <?php foreach($data['data'] as $v){ ?>
                            <tr>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name='id[]' value='<?php echo $v['id']?>'></div></td>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><img src='<?php echo $v['images']?>' style="width: 70px;height: 70px;"/></div></td>
                                <td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $v['issue']?></div></td>
                                <!--<td height="21" bgcolor="#FFFFFF"><div align="center" class="answer"><?php /*echo $v['answer']*/?></div></td>-->
                                <td height="25" bgcolor="#FFFFFF"><div>
                                        <a href="tj_jiangkangzixun.php?id=<?php echo $v['id']?>" style="margin-right: 10px;">查看</a>
                                        <a class="delete" href= "javascript:void(0);" data-id="<?php echo $v['id']?>">删除</a>
                                </td>
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
        deleteData('jiankangzixun',ids);
    });

</script>
</body>
</html>

