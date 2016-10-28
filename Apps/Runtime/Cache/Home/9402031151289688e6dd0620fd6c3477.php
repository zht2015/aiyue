<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<title>爱阅</title>
<link href="/Public/Home/style/comm.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="/Public/Home/css/style.css">
<!--[if lt IE 9]>
<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<script src="/Public/Home/js/jquery-1.8.2.min.js"></script>
<script src="/Public/Home/js/comm.js"></script>
<script src="/Public/Home/js/script.js"></script>
<script type="text/javascript" src="/Public/layer/layer.js"></script>
</head>

<body>
<div id="content-wrap">
<div class="header">
 <div class="hd-top">
   <div class="hd-main black">
    <h1 class="logo"><a href="#"></a></h1>
    <?php if($user == ''): ?><div class="login-model">
       <a href="/index.php/Home/Users/userLogin.html">登陆</a>|
       <a href="/index.php/Home/Users/userRegister.html">注册</a>
      </div>
    <?php else: ?>
      <div class="vip-hd">
       <div class="hd">
        <a href="javascript:;" class="name"><?php echo ($user["user_name"]); ?></a>
       </div>
       <div class="vip-hide-nav">
        <ul>
         <li class="s1"><a href="<?php echo U('Users/userinfo');?>">个人中心</a></li>
         <li class="s2 unread"><a href="#">评论</a></li>
         <li class="s3 unread"><a href="#">站内信</a></li>
         <li class="s4"><a href="<?php echo U('Users/logout');?>">退出</a></li>
        </ul>
       </div>
      </div><?php endif; ?>

   </div>
 </div>
 <div class="hd-bottom">
   <div class="hd-main">
   <div class="logo2"><a href="#"><img src="/Public/Home/images2/logo2.png"></a></div>
   <div class="home-nav">
    <ul class="clearfix">
     <li class="cur"><a href="<?php echo U('Index/index');?>">首页</a></li>
     <li><a href="<?php echo U('Index/AboutUs');?>">关于我们</a></li>
     <li><a href="<?php echo U('Book/tsList');?>">图书</a></li>
     <li><a href="<?php echo U('Study/index');?>">研究</a></li>
     <li><a href="<?php echo U('NewsBlog/awards');?>">新闻BLOG</a></li>
     <li><a href="<?php echo U('Source/index');?>">资源库</a></li>
    </ul>
   </div>
   </div>
 </div>
</div>

<script type="text/javascript" src="/Public/Home/webuploader/webuploader.min.js"></script>

<div class="login-reg-wrap">
  <div class="login-reg-box">
    <div class="reg-box">
      <div class="reg-main">
        <div class="tjzl-name">提交资料</div>
        <div class="tjzl-box">
          <div class="each-input2"> <span class="name"><i>*</i> 提交人姓名：</span>
            <div class="other">
              <input type="text" class="input" id="name">
            </div>
          </div>
          <div class="each-input2"> <span class="name"><i>*</i>性别：</span>
            <div class="other">
              <label  class="sex">
                <input type="radio" name="sex" value="男" checked>
                男 </label>
              <label  class="sex">
                <input type="radio" name="sex" value="女">
                女 </label>
            </div>
          </div>
          <div class="each-input2"> <span class="name"><i>*</i>提交人职位：</span>
            <div class="other">
              <input type="text" class="input" id="position">
            </div>
          </div>
          <div class="each-input2"> <span class="name"><i>*</i>身份证号：</span>
            <div class="other">
              <input type="text" class="input" id="idnum">
            </div>
          </div>
          <div class="each-input2"> <span class="name"><i>*</i>手机号码：</span>
            <div class="other">
              <input type="text" class="input" id="phone">
            </div>
          </div>
          <div class="each-input2"> <span class="name"><i>*</i>邮箱：</span>
            <div class="other">
              <input type="text" class="input" id="email">
            </div>
          </div>
          <div class="each-input2"> <span class="name"><i>*</i>执业许可证：</span>
             <!-- <div class="other">
              <div class="uploading-btn">
                <input type="file" class="file">
              </div>
                         </div>  -->

            <div class="other">
              <input name="txtAvatar" type="text" id="picpath" placeholder="上传格式为jpg.png等格式，大小不得超过12M." id="txtAvatar" class="input normal upload-path" />
              <div id="filePicker"><img src="/Public/Home/images2/upload-icon.png" alt="placeholder+image"></div>
            </div>

<!--             <p class="upload-ts">上传格式为jpg.png等格式，大小不得超过12M.</p>
           -->          </div>
          <div class="each-input2">
            <button type="button" class="tj-btn" onclick="tjzl()">确认提交</button>
          </div>
        </div>
      </div>
    </div>
    <img src="/Public/Home/images2/reg-icon.jpg" class="bg"> </div>
</div>
</div>


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
    /*background: #00b7ee;*/
    padding: 10px 15px;
    color: #fff;
    text-align: center;
    border-radius: 3px;
    overflow: hidden;
  }
  .webuploader-pick-hover {
   /* background: #00a2d4;*/
  }

  .webuploader-pick-disable {
    opacity: 0.6;
    pointer-events:none;
  }
</style>

<script type="text/javascript">
  function tjzl(){
    var name = $("#name").val();
    var sex  = $("input[name='sex']:checked").val();
    var position = $("#position").val();
    var idnum = $("#idnum").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var license = $("#picpath").val();
    if(name==""){layer.tips("提交人姓名不能为空", '#name');return false;}
    if(position==""){layer.tips("提交人职位不能为空", '#position');return false;}
    if(idnum==""){layer.tips("身份证号码不能为空", '#idnum');return false;}
    if(phone==""){layer.tips("手机号码不能为空", '#phone');return false;}
    if(email==""){layer.tips("邮箱不能为空", '#email');return false;}
    if(license==""){layer.tips("请上传执业许可证", '#picpath');return false;}

    var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
    if(!pattern.test(idnum)){layer.tips("请输入正确的身份证号码", '#idnum');return false;} 

    var pattern = /^1[34578]\d{9}$/; 
    if(!pattern.test(phone)){layer.tips("手机号码格式不正确", '#phone');return false;}

    var pattern = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(!pattern.test(email)){layer.tips("邮箱格式不正确",'#email');return false}

    $.post("<?php echo U('Home/Users/tjzl');?>",{"name":name,"sex":sex,"position":position,"idnum":idnum,"phone":phone,"email":email,"license":license,"id":"<?php echo ($_GET['id']); ?>" } , function(data){
      if(data.status==1){
        layer.msg(data.message,{icon:6});
        location.href="<?php echo U('Home/Users/pressCheck');?>";

      }else if(data.status=-1){
        layer.msg(data.message,{icon:5});

      }
    });

  }
</script>

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
            server: "<?php echo U('Book/uploadcover');?>",

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
                    $('#picpath').val(img_url);
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
<div class="footer">
<div class="footer-main">
<p class="f-nav"><a href="#">首页</a>|<a href="#"> 关于我们  </a>|<a href="#">图书</a>|<a href="#">研究 </a>|
<a href="#">新闻BLOG</a>|
<a href="#">论坛/奖项 </a>|
<a href="#">资源库</a>
</p>
<p class="other"><span>Copyright ©2015 iread All Rights Reserved</span> 
<span>designed by : <a href="#">momu</a></span></p>                                  
</div>
</div>






<!-- <script>

    var archtectrue_1 = $('.archtectrue_1');
    var li = archtectrue_1.find('li');
    var archtectrue_top = archtectrue_1.offset().top;
    var js_box = $('.js_box');

    window.onscroll = function () {
        var st = document.documentElement.scrollTop || document.body.scrollTop;
        if(st >=archtectrue_top  - 10){
            archtectrue_1.addClass('fixed')

        }else{
            archtectrue_1.removeClass('fixed')

        };


        for(var i=0;i<js_box.length;i++){
            if(st  >=$(js_box[i]).offset().top){
                li.eq(i).addClass('active').siblings().removeClass('active')
            }
        }
    }

    function logout(){
        $.post("<?php echo U('Home/Users/logout');?>",function(data){
            location.reload();
        })
    }
</script> -->
</body>
</html>