<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>管理首页</title>
<link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/layindex.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
</head>

<body class="mainbody">
<form method="post" action="center.aspx" id="form1">
<!--导航栏-->
<div class="location">
  <a href="javascript:history.back(-1);" class="back"><i></i><span>返回上一页</span></a>
  <a class="home"><i></i><span>首页</span></a>
  <i class="arrow"></i>
  <span>管理中心</span>
</div>
<!--/导航栏-->

<!--内容-->
<div class="line10"></div>


<div class="nlist-2">
  <h3><i></i>站点信息</h3>
  <ul>
    <!-- <li>站点名称：<?php echo ($uploadSetValue["37"]["value"]); ?></li>
    <li>公司名称：<?php echo ($uploadSetValue["39"]["value"]); ?></li>
    <li>网站域名：<?php echo ($uploadSetValue["38"]["value"]); ?></li>
    <li>安装目录：<?php echo ($uploadSetValue["27"]["value"]); ?></li>
    <li>网站管理目录：<?php echo ($uploadSetValue["28"]["value"]); ?></li>
    <li>附件上传目录：<?php echo ($uploadSetValue["0"]["value"]); ?></li>
    <li>服务器名称：</li>
    <li>服务器IP：112.74.26.93</li>
    <li>操作系统：</li>
    <li>IIS环境：</li>
    <li>服务器端口：80</li>
    <li>目录物理路径：</li>
    <li>系统版本：</li> -->
    <li>欢迎您进入系统！</li>
  </ul>
</div>



<!--/内容-->

</form>
</body>
</html>