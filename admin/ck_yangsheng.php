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
$data=queryPaginate('ys_yangshengzhishi',$pagesize,$page);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>查看养生</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once 'head.php'?>
<?php require_once 'left.php'?>
<div id="right" >
    <p style= background-color:rgb(54,132,88); padding-left:10px; color:#FFF;">您当前的位置：养生管理－＞查看养生</p>

    <form action="dellookshopym.php" method="post" >
    <span style="text-align:right; padding-right:10px;">

    </span>
        <table width="670" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
                        <tr>
                            <td width="33"  bgcolor="#FFFFFF"><div>复选</div></td>
                            <td width="99"  bgcolor="#FFFFFF"><div>养生图片</div></td>
                            <td width="99"  bgcolor="#FFFFFF"><div>养生名称</div></td>
                            <td width="61"  bgcolor="#FFFFFF"><div>介绍</div></td>
                            <td width="126"  bgcolor="#FFFFFF"><div>操作</div></td>
                        </tr>
                        <?php foreach($data['data'] as $v){ ?>
                            <tr>
                                <td  bgcolor="#FFFFFF" style="text-align:center;"><input type="checkbox" name='id[]' value='<?=$v['id']?>'/></td>
                                <td  bgcolor="#FFFFFF" style="text-align:center;"><img src='<?php echo $v['images']?>' style="width: 40px;height: 40px;"/></td>
                                <td  bgcolor="#FFFFFF"style="text-align:center;"><div align="center"><?php echo $v['name']?></div></td>
                                <td bgcolor="#FFFFFF"style="text-align:center;"><div align="center"><?php echo $v['introduce']?></div></td>
                                <td bgcolor="#FFFFFF" style="text-align:center;">
                                    <a href="tj_yangsheng.php?id=<?=$v['id']?>" style="margin-right: 10px;">修改</a>&nbsp;
                                    <a class="delete" href= "javascript:void(0);" data-id="<?php echo $v['id']?>">删除</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table></td>
            </tr>
            <td><?php echo $data['render'];?></td>
        </table>


        <p style=" text-align:right; margin-right:5px;">

        </p>
    </form></div>
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
        deleteData('yangsheng',ids);
    });
</script>
</body>

</html>

