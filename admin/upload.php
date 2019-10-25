<?php
/**
 * 上传文件
 * Created by PhpStorm.
 * User: gladming
 * Date: 2019/10/15
 * Time: 14:37
 */

// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo json_encode(['code'=>0,'msg'=>'上传失败:'.$_FILES["file"]["error"]]);
        exit;
    }
    else
    {
        $old_name=$_FILES["file"]["name"];
        $ext=$_FILES["file"]["type"];
        $ext=explode('/',$ext)[1];
        $size=$_FILES["file"]["size"];
        $temp_name=$_FILES["file"]["tmp_name"];
        $new_name=time().'.'.$ext;

        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        $dir='upload';
        if (!file_exists("upload")){
            mkdir ($dir,0777,true);
        }
        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $new_name);
        echo json_encode(['code'=>0,'msg'=>'上传成功','data'=>[
            'filename'=>"upload/" . $new_name,
            'ext'=>$ext,
            'size'=>$size,
            'fileType'=>$_FILES["file"]["type"],
            'src'=>"upload/" . $new_name
        ]]);
        exit;
    }
}
else
{
    echo json_encode(['code'=>1,'msg'=>'非法的文件格式']);
    exit;
}