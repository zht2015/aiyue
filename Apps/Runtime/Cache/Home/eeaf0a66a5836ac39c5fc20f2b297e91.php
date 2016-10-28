<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>
	    <script type="text/javascript" src="/Public/layer/layer.js"></script>
	<style type="text/css">
		.webuploader-container {
			position: relative;
		}
		.webuploader-element-invisible {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
		    clip: rect(1px,1px,1px,1px);
		}
		.webuploader-pick {
			position: relative;
			display: inline-block;
			cursor: pointer;
			background: #00b7ee;
			padding: 10px 15px;
			color: #fff;
			text-align: center;
			border-radius: 3px;
			overflow: hidden;
		}
		.webuploader-pick-hover {
			background: #00a2d4;
		}

		.webuploader-pick-disable {
			opacity: 0.6;
			pointer-events:none;
		}
	</style>
<script type="text/javascript">
		$(document).ready(function(){
			    // 初始化Web Uploader
			     var index = 0;
			    var uploader = WebUploader.create({

			        // 选完文件后，是否自动上传。
			        auto: true,

			        // swf文件路径
			        swf: "/Public/Home/webuploader/uploader.swf",

			        // 文件接收服务端。
			        server: "<?php echo U('Users/uploadIdCart');?>",

			        // 选择文件的按钮。可选。
			        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
			        pick: '#filePicker',

			        // 只允许选择图片文件。
			        accept: {
			            title: 'Images',
			            extensions: 'gif,jpg,jpeg,bmp,png',
			            mimeTypes: 'image/*'
			        }
			    });



		


// 当有文件添加进来的时候
                uploader.on('fileQueued', function (file) {
                });
                // 文件上传过程中
                uploader.on('uploadProgress', function (file, percentage) {
                    index = layer.load();
                });

                // 文件上传成功
                uploader.on('uploadSuccess', function (file, data) {
                    if (data.status){
                        var img_url = (data.savepath + 'thumb_' + data.savename).substr(1);
                        console.log(img_url);
                        $('#header_img').val(img_url);
                        $('#show_img').attr('src',img_url);
                        layer.msg('上传成功', {icon: 5});
                        layer.close(index);
                    } else{
                        layer.msg('上传失败，请重试', {icon: 5});
                    }
                });

                // 文件上传失败，现实上传出错。
                uploader.on('uploadError', function (file) {
                    layer.msg('上传失败，请重试', {icon: 5});
                });
                // 完成上传完了，成功或者失败，先删除进度条。
                uploader.on('uploadComplete', function (file) {
                    layer.close(index);
                });




            });


</script>
</head>
<body>
<!--dom结构部分-->
<div id="uploader-demo">
    <!--用来存放item-->
    <div id="fileList" class="uploader-list"></div>
    <img id='show_img' src="" alt="placeholder+image">
    <p id='header_img' ></p>
    <div id="filePicker">选择图片</div>
</div>


</body>
</html>