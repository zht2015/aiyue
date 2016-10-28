<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0,user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <title>后台管理中心</title>
        <link href="/Public/Admin/scripts/artdialog/ui-dialog.css" rel="stylesheet" type="text/css" />
        <link href="/Public/Admin/skin/default/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/jquery/jquery.nicescroll.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/scripts/artdialog/dialog-plus-min.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/layindex.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/common.js"></script>
        <script type="text/javascript">
            var ROOT = "<?php echo U('Tools/Index');?>";
            //页面加载完成时
            $(function () {
                //检测IE
                if ('undefined' == typeof (document.body.style.maxHeight)) {
                    window.location.href = 'ie6update.html';
                }
            });
        </script>
    </head>

    <body class="indexbody">
        <form method="post" action="<?php echo U('Index/LoginIndex');?>" id="form1">
<div class="aspNetHidden">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
</div>eventargument
            <script type="text/javascript">
                //<![CDATA[
                var theForm = document.forms['form1'];
                if (!theForm) {
                    theForm = document.form1;
                }
                function __doPostBack(eventTarget, eventArgument) {
                    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                        theForm.__EVENTTARGET.value = eventTarget;
                        theForm.__EVENTARGUMENT.value = eventArgument;
                        theForm.submit();
                    }
                }
                //]]>
            </script>
            <!--全局菜单-->
            <a class="btn-paograms" onclick="togglePopMenu();"></a>
            <div id="pop-menu" class="pop-menu">
                <div class="pop-box">
                    <h1 class="title"><i></i>导航菜单</h1>
                    <i class="close" onclick="togglePopMenu();">关闭</i>
                    <div class="list-box"></div>
                </div>
                <i class="arrow">箭头</i>
            </div>
            <!--/全局菜单-->

            <div class="main-top">
                <a class="icon-menu"></a>
                <div id="main-nav" class="main-nav"><a class="selected">站点</a><a>应用</a><a>会员</a><a>订单</a><a>控制面板</a></div>
                <div class="nav-right">
                    <div class="info">
                        <i></i>
                        <span>
                            您好，<?php echo ($userInfo["user_name"]); ?><br>
                            <?php echo ($userInfo["managerrole"]["role_name"]); ?>
                        </span>
                    </div>
                    <div class="option">
                        <i></i>
                        <div class="drop-wrap">
                            <div class="arrow"></div>
                            <ul class="item">
                                <li>
                                    <a href="/" target="_blank">预览网站</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Index/center');?>" target="mainframe">管理中心</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Manager/manager_pwd');?>" onclick="linkMenuTree(false, '');" target="mainframe">修改密码</a>
                                </li>
                                <li>
                                    <a id="lbtnExit" href="javascript:__doPostBack('lbtnExit','')">注销登录</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-left">
                <h1 class="logo"></h1>
                <div id="sidebar-nav" class="sidebar-nav">
                </div>
            </div>

            <div class="main-container">
                <iframe id="mainframe" name="mainframe" frameborder="0" src="<?php echo U('Index/center');?>"></iframe>
            </div>

        </form>
    </body>
</html>