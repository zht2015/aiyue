<?php
namespace MomuAdmin\Action;
use Think\Controller;
class CommonAction extends Controller{
    protected $uploadSet;
    protected $uploadSetValue;
    protected $smsUsername = 'aoxin';		//用户账号
    protected $smsPassword = 'asdf1234';	//密码
    protected $smsApikey = '830975fd0bfb70da7f6f746e386718c7';	//密码
    
    /**
     * @time 2016/07/07
     * @function 提示信息
     */
    public function showSysTips(){
        $result = isset($_REQUEST['flag'])?$_REQUEST['flag']:"";//操作的结果
        $msg = isset($_REQUEST['msg'])?$_REQUEST['msg']:"";//操作的提示
        $this->assign("result",$result);
        $this->assign("msg",$msg);
    }
    

    public function __construct() {
        parent::__construct();
        
        $this->checkAdminSession();
        
        //var_dump(session('userRole'));die();
        
        //权限检查
        $url = $this->getActionName() . '/' . ACTION_NAME;
        /* echo $url."<br />";
         echo ACTION_NAME; 
         die(); */
        
        if (ACTION_NAME == "insert_channel" || ACTION_NAME == "save_channel" || ACTION_NAME == "addData" || ACTION_NAME == "saveData" || ACTION_NAME == "edit_order_status" || ACTION_NAME == "checkName" || ACTION_NAME == "oauth_list" || ACTION_NAME == "category_insert" || ACTION_NAME == "article_insert" || ACTION_NAME == "article_save" || ACTION_NAME == "category_save") {
            return;
        }
        
        if ('Manager/manager_pwd' == $url) {
            return;
        }
        if ('Index/haveNoPrivileges' == $url) {
            return;
        }
        if ("UploadJson" == $this->getActionName() || "AdminAjax" == $this->getActionName()) {
            return;
        }
        if ('Index/index' == $url || 'Index/LoginIndex' == $url || 'Index/center' == $url) {
            return;
        }
        if (1 == $_SESSION['userID']) {
            return;
        }
        if (IS_POST) {
            if (isset($_POST['__EVENTTARGET'])) {
                switch ($_POST['__EVENTTARGET']) {
                    case "btnAudit" :
        
                        $channelId = isset($_REQUEST['channel_id']) ? $_REQUEST['channel_id'] : "";
                        $checkStr = mb_strrchr($url, "_", true) . "_list";
        
                        if ($channelId != "") {
                            if (!$this->hasRoleForChannel($_SESSION['userRole'], $checkStr, "btnAudit", $channelId)) {
                                $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                                exit;
                                //$this->error("亲！没有权限操作此页面哦！");exit;
                            }
                        }
        
                        if (!$this->hasRole($_SESSION['userRole'], $url, "Audit")) {
                            $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                            exit;
                            //$this->error("亲！没有权限操作此此功能哦！");exit;
                        }
                        break;
                    case "btnDelete" :
        
                        $channelId = isset($_REQUEST['channel_id']) ? $_REQUEST['channel_id'] : "";
                        $checkStr = mb_strrchr($url, "_", true) . "_list";
        
                        if ($channelId != "") {
                            if (!$this->hasRoleForChannel($_SESSION['userRole'], $checkStr, "Delete", $channelId)) {
                                $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                                exit;
                                //$this->error("亲！没有权限操作此页面哦！");exit;
                            }
                        }
        
                        if (!$this->hasRole($_SESSION['userRole'], $url, "Delete")) {
                            $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                            exit;
                            //$this->error("亲！没有权限操作此此功能哦！");exit;
                        }
                        break;
                    default:
                        break;
                }
            } else {
                if (ACTION_NAME == "order_config" || ACTION_NAME == "sys_config" || ACTION_NAME == "user_config") {
                    return;
                }
                $actionType2 = ucfirst(substr(strrchr($url, "_"), 1));
                if ("Edit" == $actionType2) {
                    $checkStr2 = mb_strrchr($url, "_", true) . "_list";
                    if ($this->hasRole($_SESSION['userRole'], $checkStr2, "Edit")) {
                        return;
                    } else {
                        $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                        exit;
                        //$this->error("亲！没有权限操作此页面哦！");exit;
                    }
                } elseif ("Add" == $actionType2) {
                    $checkStr2 = mb_strrchr($url, "_", true) . "_list";
                    if ($this->hasRole($_SESSION['userRole'], $checkStr2, "Add")) {
                        return;
                    } else {
                        $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                        exit;
                        //$this->error("亲！没有权限操作此页面哦！");exit;
                    }
                } else {
                    if ($this->hasRole($_SESSION['userRole'], $url, "Edit")) {
                        return;
                    } else {
                        $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                        exit;
                        //$this->error("亲！没有权限操作此页面哦！");exit;
                    }
                }
            }
        } else {
            //var_dump($_SESSION['userRole']);die();
            if ($this->checkUrl($_SESSION['userRole'], $url)) {

                if ("Category" == $this->getActionName() || "Comment" == $this->getActionName() || "Article" == $this->getActionName() || "Bags"== $this->getActionName() || "News"== $this->getActionName() || "Market"== $this->getActionName() || "Advertise"== $this->getActionName()) {
                    $channelId = $_GET['channel_id'];
                   
                    if (!$this->hasRoleForChannel($_SESSION['userRole'], $url, "View", $channelId)) {
                        $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                        exit;
                        //$this->error("亲！没有权限操作此页面哦！");exit;
                    }
                } else {
                    if (!$this->hasRole($_SESSION['userRole'], $url, "View")) {
                        $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                        exit;
                        //$this->error("亲！没有权限操作此页面哦！");exit;
                    }
                }
            } else {
 
                $channelId = isset($_REQUEST['channel_id']) ? $_REQUEST['channel_id'] : "";
                $checkStr = mb_strrchr($url, "_", true) . "_list";
                $actionType = ucfirst(substr(strrchr($url, "_"), 1));
                if ($channelId != "") {
                    if (!$this->hasRoleForChannel($_SESSION['userRole'], $checkStr, $actionType, $channelId)) {
                        $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                        exit;
                        //$this->error("亲！没有权限操作此页面哦！");exit;
                    }
                }
        
        
                if ($this->hasRole($_SESSION['userRole'], $checkStr, $actionType)) {
                    return;
                } else {
                    $this->redirect("./MomuAdmin/Index/haveNoPrivileges");
                    exit;
                    //$this->error("亲！没有权限操作此页面哦！");exit;
                }
            }
        }
		
    }
    private function checkUrl($role,$url){
        foreach($role as $v){
            if($v['link_url'] == $url){
                return true;
            }
        }
        return false;
    }
    
    
    public function checkAdminSession() {
        $url = $this->getActionName() . '/' . ACTION_NAME;
        //echo "<script language=\"javascript\">alert('".$url."');</script>";
        if (!isset($_SESSION['userID']) && $url != "Index/index" && $url != "Index/Index") {
            echo "<script language=\"javascript\">alert('登录已失效或没有登录，请登录！');window.top.location.href='" . U('Index/index') . "';</script>";
        }
    }
    
    private function hasRole($role,$url,$str){
        foreach($role as $v){
            if($v['link_url'] == $url){
                if($str == $v['action_type']){
                    return true;
                }
            }
        }
        return false;
    }
    private function hasRoleForChannel($role,$url,$str,$channelId){
        foreach($role as $v){
            if($v['link_url'] == $url && $v['channel_id'] == $channelId){
                if($str == $v['action_type']){
                    return true;
                }
            }
        }
        return false;
    }

    public function GetAdminInfo()
    {
        $m=M("manger")->where();
        var_dump($m);
    }
    //分类筛选数据响应方法
    protected  function getWhere($channel_id,$cat,$property='all',$categoryId='all'){
    	$data = array();
        if('all' != $property){
            $data[$property] = 1;
        }
        if('all' != $categoryId){
            $str = '';
            $list = $this->selectCat($cat->where('channel_id="'.$channel_id.'"')->select(),$categoryId);
            foreach($list as $key=>$v){
                $str = $str.$key.',';
            }
            $str = $str.$categoryId;
            $data['category_id'] = array('in',$str);
        }
        return $data;
    }
    //分类筛选方法
    protected function getHasCat($channel_id,$ml,$cat){
        $catlist = $this->selectCat($cat->where('channel_id="'.$channel_id.'"')->select());
        $mllist = $ml->field('category_id')->where('channel_id="'.$channel_id.'"')->select();
        $is_str = '';
        foreach($mllist as $v){
            $is_str = $is_str.$v['category_id'].',';
        }
        $map['id'] = array('in',$is_str);
        $map['channel_id'] = $channel_id;
        $mllist = $cat->where($map)->field('class_list')->select();
        $is_str = '';
        foreach($mllist as $vv){
            $is_str = $is_str.$vv['class_list'];
        }
        $mllist2 =array();
        $mllist = explode(',', $is_str);
        foreach($catlist as $key=>$vvv){
            if(in_array($key, $mllist)){
                $mllist2[$key] = $vvv;
            }
        }
        return $mllist2;
    }
    //分页方法
	protected function getPage($channel_id,$ml,$listRow,$arr = array(),$is_relation=false){
	    $whereListRow['id'] = 49;
	    $listRowResult = M("upload_set")->where($whereListRow)->find();
	    $listRow = $listRowResult['value'];

		$arr['channel_id'] = $channel_id;
		$count = $ml->where($arr)->count();
		$page = new \Think\Page($count,$listRow);
		$array = array();
		$str = $page->show();
		$array['str'] = $str;
		if($is_relation)
		    $array['list'] = $ml->limit($page->firstRow,$page->listRows)->where($arr)->order('id desc')->select();
		else 
		    $array['list'] = $ml->limit($page->firstRow,$page->listRows)->where($arr)->order('id desc')->select();
		$array['curPage'] = $_GET['p']?$_GET['p']:0;
		$array['listRow'] = $listRow;
		$array['count'] = $count;
		return $array;
	}
	//Order分页方法
	protected function getNormalPage($ml,$listRow,$arr = array(),$is_relation=false){
	    $whereListRow['id'] = 49;
	    $listRowResult = M("upload_set")->where($whereListRow)->find();
	    $listRow = $listRowResult['value'];
	    $count = $ml->where($arr)->count();
	    $page = new \Think\Page($count,$listRow);
	    $array = array();
	    $str = $page->show();
	    $array['str'] = $str;
	    if($is_relation)
	        $array['list'] = $ml->limit($page->firstRow,$page->listRows)->where($arr)->order('id desc')->select();
	    else
	        $array['list'] = $ml->limit($page->firstRow,$page->listRows)->where($arr)->order('id desc')->select();
	    $array['curPage'] = $_GET['p']?$_GET['p']:0;
	    $array['listRow'] = $listRow;
	    $array['count'] = $count;
	    return $array;
	}
	
	//select无限极分类
	protected function selectCat($array = array(),$pid = 0,$data = array(),$lev =0){
	    $str = '';
	    if(0 != $lev){
    	    for($i = 0;$i<$lev;$i++){
    	          $str .= '&nbsp;&nbsp;&nbsp;';  
    	    }
    	    $str = $str.'├';
	    }
	    foreach($array as $v){
	        if($pid == $v['parent_id']){
	            $data[$v['id']] = $str.$v['title'];
	            $data = $this->selectCat($array,$v['id'],$data,$lev+1);
	        }
	    }
	    return $data;
	}
	//分类管理无限极
	protected function listCat($array = array(),$pid = 0,$data = array(),$lev =0){
	    $str = '';
	    if(0 != $lev){
	        $ii = -24;
	        for($i = 0;$i<$lev;$i++){
	            $ii = $ii+24;
	        }
	        $str .= '<span style="display:inline-block;width:'.$ii.'px;"></span>';
	        $str = $str.'<span class="folder-line"></span>';
	        $str = $str.'<span class="folder-open"></span>';
	    }else{
	        $str = '<span class="folder-open"></span>';
	    }
	    foreach($array as $v){
	        if($pid == $v['parent_id']){
	            $util = array();
	            $util['id'] = $v['id'];
	            $util['parent_id'] = $v['parent_id'];
	            $util['befor'] = $str;
	            $util['title'] = $v['title'];
	            $util['class_layer'] = $v['class_layer'];
	            $util['sort_id'] = $v['sort_id'];
	            $data[] = $util;
	            $data = $this->listCat($array,$v['id'],$data,$lev+1);
	        }
	    }
	    return $data;
	}
	//菜单权限无限极
	protected function navigation($array = array(),$pid = 0,$data = array(),$lev =0){
	    $str = '';
	    if(0 != $lev){
	        $ii = -24;
	        for($i = 0;$i<$lev;$i++){
	            $ii = $ii+24;
	        }
	        $str .= '<span style="display:inline-block;width:'.$ii.'px;"></span>';
	        $str = $str.'<span class="folder-line"></span>';
	        $str = $str.'<span class="folder-open"></span>';
	    }else{
	        $str = '<span class="folder-open"></span>';
	    }
	    foreach($array as $v){
	        if($pid == $v['parent_id']){
	            $util = array();
	            $util['id'] = $v['id'];
	            $util['parent_id'] = $v['parent_id'];
	            $util['befor'] = $str;
	            $util['title'] = $v['title'];
	            $util['link_url'] = $v['link_url'];
	            $util['name'] = $v['name'];
	            $util['channel_id'] = $v['channel_id'];
	            $util['action_type'] = $v['action_type'];
	            $util['sort_id'] = $v['sort_id'];
	            $data[] = $util;
	            $data = $this->navigation($array,$v['id'],$data,$lev+1);
	        }
	    }
	    return $data;
	}
	//导航管理无限极
	protected function listNav($array = array(),$pid = 0,$data = array(),$lev =0){
	    $str = '';
	    if(0 != $lev){
	        $ii = -24;
	        for($i = 0;$i<$lev;$i++){
	            $ii = $ii+24;
	        }
	        $str .= '<span style="display:inline-block;width:'.$ii.'px;"></span>';
	        $str = $str.'<span class="folder-line"></span>';
	        $str = $str.'<span class="folder-open"></span>';
	    }else{
	        $str = '<span class="folder-open"></span>';
	    }
	    foreach($array as $v){
	        if($pid == $v['parent_id']){
	            $util = array();
	            $util['id'] = $v['id'];
	            $util['name'] = $v['name'];
	            $util['parent_id'] = $v['parent_id'];
	            $util['befor'] = $str;
	            $util['title'] = $v['title'];
	            $util['class_layer'] = $v['class_layer'];
	            $util['link_url'] = $v['link_url'];
	            $util['sort_id'] = $v['sort_id'];
	            $data[] = $util;
	            $data = $this->listNav($array,$v['id'],$data,$lev+1);
	        }
	    }
	    return $data;
	}
	
	protected function sendSMS($username,$password,$mobile,$content,$apikey){
	    $url = 'http://m.5c.com.cn/api/send/index.php';
	    $data = array
	    (
	        'username'=>$username,					//用户账号
	        'password'=>$password,				//密码
	        'mobile'=>$mobile,					//号码
	        'content'=>$content,				//内容
	        'apikey'=>$apikey,				    //apikey
	    );
	    $result= $this->curlSMS($url,$data);			//POST方式提交
	    return $result;
	}
	
	protected function recvSMS($username,$password,$mobile,$apikey,$from,$to){
	    $url = 'http://m.5c.com.cn/api/recv/index.php';
	    $data = array
	    (
	        'username'=>$username,					//用户账号
	        'password'=>$password,				//密码
	        'mobile'=>$mobile,					//号码
	        'apikey'=>$apikey,				    //apikey
	        'from'=>$from,
	        'to'=>$to
	    );
	    $result= $this->curlSMS($url,$data);			//POST方式提交
	    return $result;
	}
	
	protected function curlSMS($url,$post_fields=array()){
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,$url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 3600); //60秒
	    curl_setopt($ch, CURLOPT_HEADER,1);
	    curl_setopt($ch, CURLOPT_REFERER,'http://www.yourdomain.com');
	    curl_setopt($ch,CURLOPT_POST,1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
	    $data = curl_exec($ch);
	    curl_close($ch);
	    $res = explode("\r\n\r\n",$data);
	    return $res;
	}

	/**
	 * 获取当前Action名称
	 * @access protected
	 */
	/* protected function getActionName() {
		if(empty($this->name)) {
			// 获取Action名称
			$this->name     =   substr(get_class($this),0,-6);
		}
		return $this->name;
	} */
	
	/**
	 * 获取当前Action名称
	 * @access protected
	 */
	protected function getActionName() {
	    if (empty($this->name)) {
	        // 获取Action名称
	        $name = substr(get_class($this), 0, -6);
	        $name = str_replace("MomuAdmin\\Action\\", "", $name);
	        $name = str_replace("MomuAdmin/Action/", "", $name);
	        $this->name = $name;
	    }
	    return $this->name;
	}
	
	
	
	
	/***
	 * @time 2016/07/04
	 * @functin 控制器公共部分
	 */
	public function getPublicControlData($model="",$link="",$wherestr="",$coum="",$sort="id desc",$html="",$groups=""){
	    if($model == ""){die('传递模型数据出错了！');}
	    $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
	    $where = "";
	     
	    $txtKeywords = isset($_REQUEST['txtKeywords'])?$_REQUEST['txtKeywords']:"";
	    $ddltype = isset($_REQUEST['ddlType'])?$_REQUEST['ddlType']:"";
	    $ddlGroupId = isset($_REQUEST['ddlGroupId'])?$_REQUEST['ddlGroupId']:"";
	    if(IS_POST){
	        $evename = $_REQUEST['__EVENTTARGET'];
	        $evenval = $_REQUEST['__EVENTARGUMENT'];
	        if($evename == "btnDelete"){
	            $selids = "";
	            $chkid = $_REQUEST['chkId'];
	            $hideid = $_REQUEST['hidId'];
	            foreach($chkid as $k=>$v){
	                $selids .= $hideid[$k].",";
	            }
	            $selids = substr($selids,0,-1);
	    
	            $res = D($model)->delDataById($selids);
	            if($res == "false"){$this->error('删除失败了');die();}
	            $this->redirect($link,array("flag"=>"2"));
	        }
	    }
	    if($txtKeywords != ""){
	        $where[$wherestr] = array("like","%".$txtKeywords."%");
	    }
	    if($ddltype != ""){
	        $where['type'] = $ddltype;
	    }
	    if($ddlGroupId != ""){
	        $where['group_id'] = $ddlGroupId;
	    }
	    $countarr = D($model)->getTabList($coum,$sort,$where);// 查询满足要求的总记录数
	    $count = count($countarr);
	    $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
	    $show = $Page->show();// 分页显示输出
	    $list = D($model)->getTabList($coum,$sort,$where,$Page);// 获取分页数据
	    if($groups != ""){
    	    $groups = D("UserGroups")->getTabList(array("id","title"),"id asc");
    	    $this->assign("groups",$groups);//所有组信息
	    }
	    
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出
	    $this->assign('totalcount',$count);//总条数
	    $this->assign("pagenum",$pagenum);
	    $this->display($html); // 输出模板
	}
	
	
	
	
	
	
	
}

?>