<?php

if (!session_id()) session_start();

/**数据库连接
 * @return mysqli
 */
function linkDatabase(){
    $link = mysqli_connect('localhost', 'root', 'root', 'ml_yangsheng'); //连接数据库
// 检查连接
    if (!$link) {
        die("连接错误: " . mysqli_connect_error());
    }
    mysqli_set_charset($link, 'utf8'); //设置字符集
    return $link;
}

/**
 * Notes:查询一条数据
 * User: gladming
 * DateTime: 2019/10/14  16:24
 * @param $table /表
 * @param $where /条件
 * @return array|bool|null
 */
function queryGet($table,$where='1=1'){
    $link=linkDatabase();
    $sql = "select * FROM {$table} where ".$where;
    $result = mysqli_query($link,$sql);
    $goal=false;
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            $goal=$row;
        }
    }
    mysqli_close($link);
    return $goal;
}

/**
 * Notes:查询多条数据
 * User: gladming
 * DateTime: 2019/10/14  16:29
 * @param $table /表
 * @param $where /条件
 * @return array
 */
function queryGetAll($table,$where='1=1'){
    $link=linkDatabase();
    $sql = "select * FROM {$table} where ".$where;
    $result = mysqli_query($link,$sql);
    $goal=[];
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            $goal[]=$row;
        }
    }
    mysqli_close($link);
    return $goal;
}

/**
 * Notes:分页查询
 * User: gladming
 * DateTime: 2019/10/15  10:20
 * @param $table //查询表
 * @param $pageSize //每页数量
 * @param $page //当前页
 * @param string $field //字段
 * @param string $where //条件
 * @return array 返回数据
 */
function queryPaginate($table,$pageSize,$page,$field='',$where='',$join='',$order='',$group='',$having=''){
    $link=linkDatabase();
    //总页数$totalpage
    $total=mysqlCount($table,$where,$join,$group,$having);
    $totalpage = ceil($total/$pageSize);
    $field=$field?$field:'*';
    $where=$where?' where '.$where:'';
    $start = ($page-1)*$pageSize;
    $limit = " limit $start,$pageSize";
    $join=$join?" ".$join:'';
    $order=$order?" order by ".$order:'';
    $group=$group?" group by ".$group:'';
    $having=$having?" having ".$having:'';
    $sql="SELECT {$field} FROM {$table}{$join}{$where}{$group}{$having}{$order}{$limit}";
    $result = mysqli_query($link,$sql);
    if($result)
        $data  = mysqli_fetch_all($result,MYSQLI_ASSOC);
    else
        $data=[];
    mysqli_close($link);

    if($page>1){
        $prev = $page-1;

    }else{
        $prev = $page;
    }
    if($page<$totalpage){
        $next = $page+1;
    }else{
        $next = $totalpage;
    }
    $firstPage='<a href="?page=1" style="margin-right: 10px;text-decoration:none;color:deepskyblue">首页</a>';
    $prevPage='<a href="?page='.$prev.'" style="margin-right: 10px;text-decoration:none;color:deepskyblue">上一页</a>';
    $nextPage='<a href="?page='.$next.'" style="margin-right: 10px;text-decoration:none;color:deepskyblue">下一页</a>';
    $lastPage='<a href="?page='.$totalpage.'" style="margin-right: 10px;text-decoration:none;color:deepskyblue">末页</a>';

    if($totalpage>1){
        if($page==$totalpage){
            $nextPage='';
            $lastPage='';
        }else if($page==1){
            $prevPage='';
            $firstPage='';
        }
    }else{
        $firstPage='';
        $prevPage='';
        $nextPage='';
        $lastPage='';
    }
    $html='<table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
<tr style="text-align:center; margin-right:5px;"><td style="text-align:center; padding-right:10px;" >
<span style="margin-right: 20px;">总数：'.$total.'/总页：'.$totalpage.'/当前页：'.$page.'</span>
'.$firstPage.$prevPage.$nextPage.$lastPage.'
</td></td></tr></table>';
    return ['data'=>$data,'total'=>$total,'pages'=>$totalpage,'render'=>$html];
}

/**
 * Notes:插入一条记录
 * User: gladming
 * DateTime: 2019/10/14  17:22
 * @param $table /表
 * @param $where /条件
 * @return bool
 */
function insert($table,$data){
    $link=linkDatabase();
    if(!is_array($data)||count($data)==0){
        return false;
    }
    $filed=implode(',',array_keys($data));;
    $value=implode(',',array_map(function($e){
        return "'".addslashes($e)."'";
    },$data));

    $sql = "insert into {$table} ({$filed})values({$value})";
    $result = mysqli_query($link,$sql);
    if(!$result){
        return false;
    }
    $goal=$result?true:false;
    mysqli_close($link);
    return $goal;
}

/**
 * Notes:查询记录总数
 * User: gladming
 * DateTime: 2019/10/15  10:03
 * @param $table /表
 * @param $where /条件
 * @return int //返回条数
 */
function mysqlCount($table,$where='1=1',$join='',$group='',$having=''){
    $link=linkDatabase();
    $where=$where?' where '.$where:'';
    $join=$join?" ".$join:'';
    $group=$group?" group by ".$group:'';
    $having=$having?" having ".$having:'';
    $sql = "select count(*) s FROM {$table}{$join}{$where}{$group}{$having}";
    $result = mysqli_query($link,$sql);
    $goal=0;
    if ($result&&mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            $goal=$row['s'];
        }
    }
    mysqli_close($link);
    return $goal;
}

/**
 * Notes:删除记录
 * User: gladming
 * DateTime: 2019/10/15  11:18
 * @param $table /表
 * @param $where /条件
 * @return bool //返回成功、失败
 */
function mysqlDelete($table,$where=''){
    $where=$where?'where '.$where:'';
    $link=linkDatabase();
    $sql = "delete FROM {$table} ".$where;
    $result = mysqli_query($link,$sql);
    $goal=mysqli_affected_rows($link)>0?true:false;
    mysqli_close($link);
    return $goal;
}

/**
 * Notes:更新数据
 * User: gladming
 * DateTime: 2019/10/15  17:16
 * @param $table //表
 * @param $field //更新字段
 * @param string $where //更新条件
 * @return bool //返回成功、失败
 */
function mysqlUpdate($table,$field,$where=''){
    if(is_array($field)){
        $field_str='';
        foreach ($field as $k=>$v){
            $v=addslashes($v);
            if($field[$k]==reset($field)){
                $field_str.=$k.'="'.$v.'"';
            }else{
                $field_str.=','.$k.'="'.$v.'"';
            }
        }
    }else{
        $field_str=$field;
    }
    if($field_str){
        $where=$where?'where '.$where:'';
        $link=linkDatabase();
        $sql = "update {$table} set {$field_str}".$where;
        $result = mysqli_query($link,$sql);
        $goal=mysqli_affected_rows($link)>0?true:false;
    }else{
        $goal=false;
    }
    mysqli_close($link);
    return $goal;
}
?>