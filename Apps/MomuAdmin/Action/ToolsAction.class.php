<?php
namespace MomuAdmin\Action;
use Think\Controller;
class ToolsAction extends Controller {

    public function Index() {
        //取得处事类型        
        $action = $_GET['action'];
        switch ($action) {
            case "username_validate": //验证用户名
                $this->username_validate(context);
                break;
            case "attribute_field_validate": //验证扩展字段是否重复
                $this->attribute_field_validate(context);
                break;
            case "channel_name_validate": //验证频道名称是否重复
                $this->channel_name_validate(context);
                break;
            case "channel_site_validate": //验证站点目录名是否重复
                $this->channel_site_validate(context);
                break;
            case "urlrewrite_name_validate": //验证URL调用名称是否重复
                $this->urlrewrite_name_validate(context);
                break;
            case "navigation_validate": //验证导航菜单别名是否重复
                $this->navigation_validate(context);
                break;
            case "manager_validate": //验证管理员用户名是否重复
                $this->manager_validate(context);
                break;
            case "get_navigation_list": //获取后台导航字符串
                $this->get_navigation_list(context);
                break;
            case "get_remote_fileinfo": //获取远程文件的信息
                $this->get_remote_fileinfo(context);
                break;
            case "sms_message_post": //发送手机短信
                $this->sms_message_post(context);
                break;
            case "edit_order_status": //修改订单信息和状态
                $this->edit_order_status(context);
                break;
            case "get_builder_urls": //获取要生成静态的地址
                $this->get_builder_urls(context);
                break;
            case "get_builder_html": //生成静态页面
                $this->get_builder_html(context);
                break;
        }
    }
    ///#region  获取左侧导航 
    public function get_navigation_list() {
        $n = M('navigation');
        //获取顶级导航
        $arr1 = $n->where("parent_id=0 and is_lock=0")->order("sort_id asc")->select();
        for ($i = 0; $i < count($arr1); $i++) {
            if($this->checkNavName($_SESSION['userRole'], $arr1[$i]['name'],$_SESSION["userID"])){
            $html.="<div class=\"list-group\" style=\"display: none;\">"
                    . "       <h1 title=\"" . $arr1[$i]['sub_title'] . "\"><img src=\"" ."http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].__ROOT__."/Public". $arr1[$i]['icon_url'] . "\"></h1>"
                    . "       <div class=\"list-wrap\">"
                    . "           <h2>" . $arr1[$i]['title'] . "<i></i></h2>"
                    . "           <ul style=\"display: block;\">" . $this->GetChinld($arr1[$i]['id'])
                    . "           </ul>"
                    . "       </div>"
                    . "   </div>";


            }
        }

        echo $html;
    }

    public function GetChinld($i) {
        $m = M('navigation');
        $earr = $m->where("parent_id=" . $i . " and is_lock=0")->order("sort_id asc")->select();
        $html = "";
        for ($j = 0; $j < count($earr); $j++) {
            if($this->checkNavName($_SESSION['userRole'], $earr[$j]['name'],$_SESSION["userID"])){
            $html.= " <li>"
                    . "                   <a navid=\"" . $earr[$j]['name'] . "\" target=\"mainframe\">"
                    . "                       <span>" . $earr[$j]['title'] . "</span>"
                    . "                       <b class=\"expandable close\"></b></a>"
                    . "                   <ul style=\"display: block;\">"
                    . $this->GetSon($earr[$j]['id'])
                    . "           </ul>"
                    . "       </li>";
                
            }
        }

        return $html;
    }

    public function GetSon($j) {
        $m = M('navigation');
        $earr = $m->where("parent_id=" . $j . " and is_lock=0")->select();
        $html = "";

        for ($i = 0; $i < count($earr); $i++) {
            if ($this->checkFa($earr[$i]['id'])) {
                if($this->checkNavName($_SESSION['userRole'], $earr[$i]['name'],$_SESSION["userID"])){
                $html.= "<li>"
                        . "   <a navid=\"" . $earr[$i]['name'] . "\" target=\"mainframe\">"
                        . "       <span>" . $earr[$i]['title'] . "</span>"
                        . "       <b class=\"expandable open\"></b></a>"
                        . "   <ul style=\"display: block;\">"
                        . $this->GetLast($earr[$i]['id'])
                        . "   </ul>"
                        . "</li>";
                }
            } else {
                if($this->checkNavName($_SESSION['userRole'], $earr[$i]['name'],$_SESSION["userID"])){
                $html.= "                     <li>"
                        . "                           <a navid=\"" . $earr[$i]['name'] . "\" href=\"" ."../". $earr[$i]['link_url']. "\" target=\"mainframe\">"
                        . "                               </i><span>" . $earr[$i]['title'] . "</span>"
                        . "                           </a>"
                        . "                       </li>";
                }
            }
        }
        return $html;
    }

    public function checkFa($i) {
        $m = M('navigation');
        $flag = FALSE;
        if (count($m->where("parent_id=" . $i . " and is_lock=0")->select()) > 0) {
            $flag = TRUE;
        }
        return $flag;
    }

    public function GetLast($j) {
        $m = M('navigation');
        $earr = $m->where("parent_id=" . $j . " and is_lock=0")->select();
        $html = "";
        for ($i = 0; $i < count($earr); $i++) {
            if($this->checkNavName($_SESSION['userRole'], $earr[$i]['name'],$_SESSION["userID"])){
                $html.= "       <li>"
                    . "           <a navid=\"" . $earr[$i]['name'] . "\" href=\"" ."../" . $earr[$i]['link_url'].'/channel_id/'.$earr[$i]['channel_id'] .'.html'. "\" target=\"mainframe\">"
                        . "               <span>" . $earr[$i]['title'] . "</span>"
                            . "           </a>"
                                . "       </li>";
                
            }
        }
        return $html;
    }
    private function checkNavName($role,$nav_name,$roleId){
        if(1 ==$roleId){
            return true;
        }
        foreach($role as $v){
            if($v['nav_name'] == $nav_name){
                return true;
            }
        }
        return false;
    }
    
    ///#endregion
}
