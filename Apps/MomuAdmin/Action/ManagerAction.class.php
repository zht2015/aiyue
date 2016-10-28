<?php
 /*
 *后台管理用户操作
 2016.7.5
 by 小明
 */
namespace MomuAdmin\Action;
class ManagerAction extends CommonAction {
  /*
  管理员列表
  */
  public function manager_list(){
    $result = isset($_REQUEST['flag']) ? $_REQUEST['flag'] : ""; //操作的结果
    $count     = M('manager')->count();
    $Page      = new \Think\Page($count,15);
    $page_show = $Page->show();
    $rs 	   = M('manager')->limit($Page->firstRow,$Page->listRows)->select();
  	foreach ($rs as $k => $v) {
  	  $rs[$k]['role_name'] = M('manager_role')->where(array('id'=>$v['role_id']))->getField('role_name');
  	}
  	// dump($rs);
	$this->assign('page_show',$page_show);
	$this->assign("result", $result);
    $this->assign('rs',$rs);
    $this->display();
  }
  /*
  删除用户
  */
  public function del_user(){
	$id = I('post.id');
	$id = I('post.id');
    $condition['id'] = array('IN',$id);
    M('manager')->where($condition)->delete() ? $this->redirect("Manager/manager_list", array("flag"=>"2")) : fail('删除失败，未知错误');
  
  }
  /*
  添加管理员
  */
  public function manager_add(){

  	if(IS_POST){
  	  $d['role_id']   = I('post.role_id');
  	  $d['role_type'] = I('post.role_type');
  	  $d['user_name'] = I('post.userName');
  	  $d['salt']      = getRandChar(6);
  	  $d['password']  = md5(I('post.Password'));
  	  $d['real_name'] = I('post.real_name');
  	  $d['telephone'] = I('post.tel');
  	  $d['email']     = I('post.email');
  	  $d['is_lock']   = I('post.is_lock') == 'on' ? 1 : 0;
  	  $d['add_time']  = date('Y-m-d H:i:s',time());

  	  $rs = M('manager')->add($d);
  	  if($rs){
        $this->redirect("Manager/manager_list", array("flag"=>"1"));
      }else{
        $this->error('增加失败，未知错误');
      }
  	}else{
  	  $this->assign('role',M('manager_role')->select());
  	  $this->display();
  	}
  }
  /*
  编辑管理员
  */
  public function manager_edit(){
    $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
  	if(IS_POST){
      $uid = I('post.uid');
  	  $d['role_id']   = I('post.role_id');
  	  $d['role_type'] = I('post.role_type');
  	  $d['salt']      = getRandChar(6);
  	  $d['password']  = md5(I('post.Password'));
  	  $d['real_name'] = I('post.real_name');
  	  $d['telephone'] = I('post.tel');
  	  $d['email']     = I('post.email');
  	  $d['is_lock']   = I('post.is_lock') == 'on' ? 1 : 0;
  	  $d['add_time']  = date('Y-m-d H:i:s',time());

  	  $rs = M('manager')->where(array('id'=>$uid))->save($d);
  	  if($rs){
        $this->redirect("Manager/manager_list",array("flag"=>"3"));
      }else{
        $this->error('修改失败，未知错误');
      }
  	}else{
  	  if($eid == ""){
  	      $this->error('获取不到修改的相关参数');
  	  }  
  	    
  	    
  	  $this->assign('userInfo',M('manager')->find($eid));
  	  $this->assign('role',M('manager_role')->select());
  	  $this->display();
  	}
  }
  /*
  判断用户名是否存在
  */
  public function checkUserName(){
    $name  = I('post.param');
    $count = M('manager')->where(array('user_name'=>$name))->count();

    if($count > 0){
        $d['info']   = "该用户名已存在";
        $d['status'] = "n";
    }else{
        $d['info']   = "该用户名可用";
        $d['status'] = "y";
    }
    echo json_encode($d);
  }
  
  /**
   * @time 2016/08/09
   * @function 角色表管理
   */
  public function role_list(){
     $this->showSysTips();
        $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
       $where = "";
       
       $txtKeywords = isset($_REQUEST['txtKeywords'])?$_REQUEST['txtKeywords']:"";
       if(IS_POST){
           $evename = $_REQUEST['__EVENTTARGET'];
           $evenval = $_REQUEST['__EVENTARGUMENT'];
           $selids = "";
           $chkid = $_REQUEST['chkId'];
           $hideid = $_REQUEST['hidId'];
           foreach($chkid as $k=>$v){
               $selids .= $hideid[$k].",";
           }
           $selids = substr($selids,0,-1);
           if($evename == "btnDelete"){//删除角色表操作
              //die($selids);
              $res = D('ManagerRoleValue')->delRoleById($selids); 
              if($res == "false"){$this->redirect("Manager/role_list",array("flag"=>"5"));;die();}
              $this->redirect("Manager/role_list",array("flag"=>"2"));
           }
       }
       if($txtKeywords != ""){
           $where['role_name'] = array("like","%".$txtKeywords."%");
       }
        $countarr = D("ManagerRole")->getTabList("","",$where);// 查询满足要求的总记录数
        $count = count($countarr);
        $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $list = D("ManagerRole")->getTabList("","",$where,$Page);// 获取分页数据
        //var_dump($list);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数 
        $this->assign("pagenum",$pagenum);
        $this->display(); // 输出模板
  }
  
  /***
   * @time 2016/08/09
   * @function 角色新增
   */
  public function role_add(){
      
      if(IS_POST){
          var_dump($_POST);die();
          $rolename = isset($_REQUEST['txtRoleName'])?$_REQUEST['txtRoleName']:"";
          if($rolename == ""){
              $this->redirect("Manager/role_list",array("flag"=>"4"));die();
          }
          //检测该组别是否存在
          $ishas = D("ManagerRole")->isHasRole($rolename);
          if(count($ishas)>0){
              $this->redirect("Manager/role_list",array("flag"=>"7","msg"=>"新增失败，该组名已经存在！"));
          }
          //执行写入操作1、写入角色表2写入角色对应权限表 
          $insertRole = D("ManagerRole")->addData();
          //判断是否执行成功
          if($insertRole == "false"){
              $this->redirect("Manager/role_list",array("flag"=>"4"));die();
          }
          
          $cblActionType = I("cblActionType");//权限
          $hidChannelId = I("hidChannelId");//channel_id
          $hidLinkUrl = I("hidLinkUrl");//link_url
          $hidName = I("hidName");//调用别名
          
          if(count($cblActionType)>0){//已经有权限选择
              $data = array();
              
              foreach($cblActionType as $k=>$v){
                  foreach($v as $key=>$val){
                      $tmp = array();
                      $tmp['role_id'] = $insertRole;//角色组id
                      $tmp['nav_name'] = $hidName[$k];//调用别名
                      $tmp['action_type'] = $val;
                      $tmp['link_url'] = $hidLinkUrl[$k];//链接
                      $tmp['channel_id'] = $hidChannelId[$k];//频道id
                      array_push($data,$tmp);
                  }
              }
              
              //权限数据新增
              $addres = M("manager_role_value")->addAll($data);
              if($addres === "false"){//新增失败
                  $this->redirect("Manager/role_list",array("flag"=>"4"));die();
              }
          }
          
          //没有选择相应的权限，新增成功
          $this->redirect("Manager/role_list",array("flag"=>"1"));die();
      }
      
      $rs = M('navigation')->order('sort_id asc')->select();
      $nav_list = listNav($rs,0);
      foreach($nav_list as $k=>$v){
          $nav_list[$k]['actionarr'] = explode(",", $v['action_type']);
      }
      
      $this->assign('nav_list',$nav_list);
      var_dump($nav_list);die();
      $this->display();
  }
  
  /***
   * @time 2016/08/09
   * @function 修改
   */
  public function role_edit(){
      $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
      if($eid == ""){
          $this->redirect("Manager/role_list",array("flag"=>"7","msg"=>"修改缺少参数"));die();
      }
      
      if(IS_POST){//编辑修改
          //var_dump($_POST);die();
          //判断是否已经存在
          $rolename = isset($_REQUEST['txtRoleName'])?$_REQUEST['txtRoleName']:"";
          if($rolename == ""){
              $this->redirect("Manager/role_list",array("flag"=>"5"));die();
          }
          //检测该组别是否存在
          $ishas = D("ManagerRole")->isHasRole($rolename);
          
          if(count($ishas)>0){//存在
              if($ishas['id'] != $eid){
                  $this->redirect("Manager/role_list",array("flag"=>"7","msg"=>"该角色组已经存在"));die();
              }
          }
          
          //将角色组名称进行更换
          $saveres = D("ManagerRole")->saveData(array("role_name"=>$rolename),array("id"=>$eid));
          
          $cblActionType = I("cblActionType");//权限
          $hidChannelId = I("hidChannelId");//channel_id
          $hidLinkUrl = I("hidLinkUrl");//link_url
          $hidName = I("hidName");//调用别名
          
          if(count($cblActionType)>0){//已经有权限选择
              $data = array();
          
              foreach($cblActionType as $k=>$v){
                  foreach($v as $key=>$val){
                      $tmp = array();
                      $tmp['role_id'] = $eid;//角色组id
                      $tmp['nav_name'] = $hidName[$k];//调用别名
                      $tmp['action_type'] = $val;
                      $tmp['link_url'] = $hidLinkUrl[$k];//链接
                      $tmp['channel_id'] = $hidChannelId[$k];//频道id
                      array_push($data,$tmp);
                  }
              }
              //原先的权限进行删除，相应的权限进行增加（事务）
              
              $editres = D("ManagerRoleValue")->newData($eid,$data);
              if($editres == "false"){
                  $this->redirect("Manager/role_list",array("flag"=>"6"));die();
              }
                  $this->redirect("Manager/role_list",array("flag"=>"3"));die();
              
          }
             //删除原来的权限
            $delres = D("ManagerRoleValue")->newData($eid,"");
            if($delres == "false"){
                  $this->redirect("Manager/role_list",array("flag"=>"6"));die();
              }
                  $this->redirect("Manager/role_list",array("flag"=>"3"));die();
          
      }
      
      
      $rs = M('navigation')->order('sort_id asc')->select();
      $nav_list = listNav($rs,0);
      foreach($nav_list as $k=>$v){
          $nav_list[$k]['actionarr'] = explode(",", $v['action_type']);
      }
      
      $edata = D("ManagerRole")->getTabList("","id asc",array("id"=>$eid),"","1");
      $this->assign("edata",$edata);
      //var_dump($nav_list);
      $this->assign('nav_list',$nav_list);
      $this->display();
      
  }
  
  
  
  
  
}