/**
 * 公共js部分
 */

//上传图片
$("input[type=file]").on('change', function (e) {
    uploadFile(e.target.files[0]);
});

$('#upload-pic').click(function () {
    $('input[type=file]')[0].click();
});

var xhr;
var ot;//
var oloaded;

//上传文件方法
function uploadFile(fileObj) {
    document.getElementById("progressBar").style='display:inline;';
    var url = "upload.php"; // 接收上传文件的后台地址

    var form = new FormData(); // FormData 对象
    form.append("file", fileObj); // 文件对象

    xhr = new XMLHttpRequest(); // XMLHttpRequest 对象
    xhr.open("post", url, true); //post方式，url为服务器请求地址，true 该参数规定请求是否异步处理。
    xhr.onload = uploadComplete; //请求完成
    xhr.onerror = uploadFailed; //请求失败
    xhr.upload.onprogress = progressFunction;//【上传进度调用方法实现】
    xhr.upload.onloadstart = function () {//上传开始执行方法
        ot = new Date().getTime(); //设置上传开始时间
        oloaded = 0;//设置上传开始时，以上传的文件大小为0
    };
    xhr.onreadystatechange=function (){
        if(this.readyState==4){
            if(this.status == 200){
                var data = eval('(' + this.responseText + ')');
                console.log(data);
                document.getElementById("progressBar").style='display:none;';
                if(data.code==0){
                    console.log(data.data)
                    $('#images-show')[0].src=data.data.filename;
                    $('#images-show')[0].style.display='inline';
                    $('input[name=images]')[0].value=data.data.filename;
                }
            }
        }
    };
    xhr.send(form); //开始上传，发送form数据
}

//上传进度实现方法，上传过程中会频繁调用该方法
function progressFunction(evt) {

    var progressBar = document.getElementById("progressBar");
// event.total是需要传输的总字节，event.loaded是已经传输的字节。如果event.lengthComputable不为真，则event.total等于0
    if (evt.lengthComputable) {//
        progressBar.max = evt.total;
        progressBar.value = evt.loaded;
    }
}

//上传成功响应
function uploadComplete(evt) {
//服务断接收完文件返回的结果
// alert(evt.target.responseText);
    console.log("上传成功！",evt);
}

//上传失败
function uploadFailed(evt) {
    alert("上传失败！");
    document.getElementById("progressBar").style='display:none;';
}

//取消上传
function cancleUploadFile() {
    xhr.abort();
    document.getElementById("progressBar").style='display:none;';
}

/**
 * 删除数据
 * @param $type 类型
 * @param ids id数组
 */
function deleteData($type,ids){
    //ajax无刷新提交请求
    var post_data={
        type:$type,
        id:ids,
    };

    $.ajax({
        url:'delete.php',
        dataType:'json',
        type:'get',
        data:post_data,
        success:function (e) {
            if(e.status){
                location.reload();
            }else{
                alert(e.msg)
            }
        }
    });
}