<?php
namespace MomuAdmin\Action;
class UsersAction extends CommonAction {
    
    /**
     * @time 2016/06/28
     * @function 获取基本数据列表
     */
    public function user_list() {
        $this->showSysTips();
        $this->getPublicControlData("Users","Users/user_list","user_name|mobile|nick_name|sex","","reg_time desc","user_list","1");
    }
    
    /***
     * @time 2016/06/30
     * @function 会员新增
     */
    public function user_add(){
        if(IS_POST){//提交过来的数据，新增到数据看中
            $res = D("Users")->dealUser();
            if($res == "false"){$this->error('新增用户失败了');die();}
            $this->redirect("Users/user_list",array("flag"=>"1"));
        }
        
        $groups = D("UserGroups")->getTabList(array("id","title"),"id asc");
        $this->assign("groups",$groups);//所有组信息
        
        $this->display();
    }
    
    /**
     * @time 2016/06/30
     * @function 会员编辑
     */
    public function user_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        if($eid==""){$this->error('获取不到编辑的模块');die();}
        
        if(IS_POST){//提交过来的数据，新增到数据看中
            $res = D("Users")->dealUser("1",$eid);
            if($res == "false"){$this->error('修改用户失败了');die();}
            $this->redirect("Users/user_list",array("flag"=>"3"));
        }
        
        $edata = D("Users")->getTabList("","",array("id"=>$eid),"","1");
        $groups = D("UserGroups")->getTabList(array("id","title"),"id asc");
        $this->assign("groups",$groups);//所有组信息
        $this->assign("edata",$edata);
        $this->display();
        
    }
    
    /***
     * @time 2016/06/28
     * @function 组列表
     */
    public function group_list(){
        $this->showSysTips();
        $where = "";
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
            if($evename == "btnDelete"){
                $res = D('UserGroups')->delDataById($selids);
                if($res == "false"){$this->error('删除失败了');die();}
                $this->redirect("Users/group_list",array("flag"=>"2"));
            }
        }
        $list = D("UserGroups")->getTabList("","grade desc",$where);
        $this->assign("list",$list);
        $this->display();
    }
    
    /***
     * @time 2016/07/01
     * @function 新增组别
     */
    public function group_add(){
        if(IS_POST){
            $res = D("UserGroups")->dealGroup();
            if($res == "false"){$this->error('新增组失败了');die();}
            $this->redirect("Users/group_list",array("flag"=>"1"));
        }
        $this->display();
    }
    /***
     * @time 2016/07/01
     * @function 组修改
     */
    public function group_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        if($eid == ""){$this->error('非法操作！');die();}
        if(IS_POST){
            $res = D("UserGroups")->dealGroup("1",$eid);
            if($res == "false"){$this->error('修改组失败了');die();}
            $this->redirect("Users/group_list",array("flag"=>"3"));
        }
        $edata = D("UserGroups")->getTabList("","id asc",array("id"=>$eid),"","1");
        $this->assign("edata",$edata);
        $this->display();
    }
    
    /***
     * @time 2016/06/28
     * @function 用户审核
     */
    public function user_audit(){
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
           if($evename == "btnAudit"){
              $res = D('Users')->passById($selids); 
              if($res == "false"){$this->error('审核通过操作失败了');die();}
              $this->redirect("Users/user_audit",array("msg"=>"审核通过操作成功"));
           }
       }
       if($txtKeywords != ""){
           $where['user_name|mobile|nick_name|sex'] = array("like","%".$txtKeywords."%");
       }
       $where['status'] = "2";//待审核
        $countarr = D("Users")->getTabList("","reg_time desc",$where);// 查询满足要求的总记录数
        $count = count($countarr);
        $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $list = D("Users")->getTabList("","reg_time desc",$where,$Page);// 获取分页数据
        //var_dump($list);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数 
        $this->assign("pagenum",$pagenum);
        $this->display(); // 输出模板
        
    }
    
    /***
     * @time 2016/07/01
     * @function 发送短信
     */
    public function user_sms(){
        $type = isset($_REQUEST['type'])?$_REQUEST['type']:"group";
        if($type == "group"){
            $this->display();
        }else{
            $this->display("userSms");
        }
    }
    
    /***
     * @time 2016/07/01
     * @function 站内消息
     */
    public function message_list(){
        $this->showSysTips();
        $this->getPublicControlData("UserMessage","Users/message_list","accept_user_name|title|post_time","","post_time desc","message_list");
    }
    
    /**
     * @time 2016/07/01
     * @function 查看站内信
     */
    public function message_edit(){
        $type = isset($_REQUEST['type'])?$_REQUEST['type']:"view";
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        
        if(IS_POST){
            $res = D("UserMessage")->insertData("","1");
            if($res == "false"){$this->error('编辑失败');die();}
            $this->redirect("Users/message_list",array("flag"=>"3"));
        }
        
        if($eid == ""){$this->error('非法操作！');die();}
        $edata = D("UserMessage")->getTabList("","post_time desc",array("id"=>$eid),"","1");
        $this->assign("edata",$edata);
        if($type=="view"){
            $this->display();
        }else{
            $this->display("messedit");
        }
    }
    
    /***
     * @time 2016/07/01
     * @function 站内信新增
     */
    public function message_add(){
        if(IS_POST){
            $username = isset($_REQUEST['txtUserName'])?trim($_REQUEST['txtUserName']):"";
            if($username == ""){$this->error("用户不能为空！");die();}
            //检测提交的用户是否存在
            $uidarr = D("Users")->getTabList(array("id"),"id asc",array("user_name"=>$username),"","1");
            if(count($uidarr)<=0){$this->error("该用户不存在，请确认您输入用户是否存在会员中！");die();}
            $res = D("UserMessage")->insertData($username);
            if($res == "false"){$this->error("发站内信失败了！");die();}
            $this->redirect("Users/message_list",array("msg"=>"发送成功！"));
        }
        $this->display();
    }
    
    /***
     * @time 2016/07/01
     * @function 充值记录
     */
    public function recharge_list(){
        $this->showSysTips();
        $this->getPublicControlData("UserRecharge","Users/recharge_list","user_name|recharge_no|add_time","","add_time desc","recharge_list");
    }
    /**
     * @time 2016/07/01
     * @function 充值新增
     */
    public function recharge_add(){
        //检测是否是提交过来的新增数据
        if(IS_POST){
            $username = isset($_REQUEST['txtUserName'])?trim($_REQUEST['txtUserName']):"";
            if($username == ""){$this->error("用户不能为空！");die();}
            //检测提交的用户是否存在
            $uidarr = D("Users")->getTabList(array("id","amount"),"id asc",array("user_name"=>$username),"","1");
            if(count($uidarr)<=0){$this->error("该用户不存在，请确认您输入用户是否存在会员中！");die();}
            $res = D("UserRecharge")->insertData($uidarr['id'],$uidarr['amount']);
            if($res == "false"){
                $this->error('充值失败！');die();
            }
            $this->redirect("Users/recharge_list",array("msg"=>"充值成功！"));die();
        }
        
        $payments = D("Payment")->getTabList(array("id","title"),"id asc");
        $this->assign("randOrder","S".time().rand(1000, 9999));
        $this->assign("payments",$payments);
        $this->display();
    }
    
    
    /***
     * @time 2016/06/28
     * @function 消费记录
     */
    public function amount_log(){
        $this->showSysTips();
        $this->getPublicControlData("UserAmountLog","Users/amount_log","user_name|remark|add_time","","add_time desc","amount_log");
    }
    
    /***
     * @time 2016/07/01
     * @function 积分记录
     */
    public function point_log(){
        $this->showSysTips();
        $this->getPublicControlData("UserPointLog","Users/point_log","user_name|remark|add_time","","add_time desc","point_log");
    }
    
    /***
     * @time 2016/06/28
     * @function 参数设置
     */
    public function user_config(){
        $configpath = "./oconfig/userconfig.json";
        
        if(IS_POST){
            $regverify = isset($_REQUEST['regverify'])?1:0;
            $mobilelogin = isset($_REQUEST['mobilelogin'])?1:0;
            $emaillogin = isset($_REQUEST['emaillogin'])?1:0;
            $rules = isset($_REQUEST['regrules'])?1:0;
            $orderconfig = array(
                "regstatus"=>$_REQUEST['regstatus'],  
                "regverify"=>$regverify, 
                "regmsgstatus"=>$_REQUEST['regmsgstatus'],
                "regmsgtxt"=>$_REQUEST['regmsgtxt'],
                "regkeywords"=>$_REQUEST['regkeywords'],
                "regsmsexpired"=>$_REQUEST['regsmsexpired'],
                "regemailexpired"=>$_REQUEST['regemailexpired'],
                "mobilelogin"=>$mobilelogin,
                "emaillogin"=>$emaillogin,
                "regrules"=>$rules,
                "regrulestxt"=>$_REQUEST['regrulestxt'],
                "invitecodeexpired"=>$_REQUEST['invitecodeexpired'],
                "invitecodecount"=>$_REQUEST['invitecodecount'],
                "invitecodenum"=>$_REQUEST['invitecodenum'],
                "pointcashrate"=>$_REQUEST['pointcashrate'],
                "pointinvitenum"=>$_REQUEST['pointinvitenum'],
                "pointloginnum"=>$_REQUEST['pointloginnum'],
            );
            $res = file_put_contents($configpath, json_encode($orderconfig));
            if($res=="0"){
                die('oconfig目录没有写入配置文件的权限');
            }
            $this->assign("d",$orderconfig);
        }else{
            if(file_exists($configpath)){//已经有了，则获取相应的数据
                $d = file_get_contents($configpath);
                $data = json_decode($d,true);
                $this->assign("d",$data);
            }else{
                //初始化配置文件
                $orderconfig = array(
                    "regstatus"=>"1",  
                    "regverify"=>"1", 
                    "regmsgstatus"=>"1",
                    "regmsgtxt"=>"欢迎您成为本站会员！",
                    "regkeywords"=>"admin,manager,dtcms",
                    "regsmsexpired"=>"10",
                    "regemailexpired"=>"1",
                    "mobilelogin"=>"1",
                    "emaillogin"=>"1",
                    "regrules"=>"1",
                    "regrulestxt"=>"1、在本站注册的会员，必须遵守《互联网电子公告服务管理规定》，不得在本站发表诽谤他人，侵犯他人隐私，侵犯他人知识产权，传播病毒，政治言论，商业讯息等信息。&lt;br/&gt;2、在所有在本站发表的文章，本站都具有最终编辑权，并且保留用于印刷或向第三方发表的权利，如果你的资料不齐全，我们将有权不作任何通知使用你在本站发布的作品。3、在登记过程中，您将选择注册名和密码。注册名的选择应遵守法律法规及社会公德。您必须对您的密码保密，您将对您注册名和密码下发生的所有活动承担责任。",
                    "invitecodeexpired"=>"1",
                    "invitecodecount"=>"1",
                    "invitecodenum"=>"20",
                    "pointcashrate"=>"10",
                    "pointinvitenum"=>"15",
                    "pointloginnum"=>"10",
                );
                $res = file_put_contents($configpath, json_encode($orderconfig));
                if($res=="0"){
                    die('oconfig目录没有写入配置文件的权限');
                }
                $this->assign("d",$orderconfig);
            }
        }
        
        $this->display();
    }
    
    /***
     * @time 2016/07/04
     * @function 第三方权限
     */
    public function oauth_app_list(){
        $this->showSysTips();
        $this->getPublicControlData("UserOauthApp","Users/oauth_app_list","title|remark|sort_id","","id asc","oauth_app_list");
    }
    
    /***
     * @time 2016/07/04
     * @function 权限管理
     */
    public function oauth_list(){
        $this->showSysTips();
        $this->getPublicControlData("UserOauth","Users/oauth_list","user_name|oauth_name","","id asc","oauth_list");
    }
    
    /***
     * @time 2016/07/04
     * @function 新增
     */
    public function oauth_app_add(){
        //检测是否是提交过来的新增数据
        if(IS_POST){
            $res = D("UserOauthApp")->insertData();
            if($res == "false"){
                $this->error('新增失败！');die();
            }
            $this->redirect("Users/oauth_app_list",array("flag"=>"1"));die();
        }
        $this->display();
    }
    
    /**
     * @time 2016/07/04
     * @function 
     */
    public function oauth_app_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        if($eid == ""){$this->error('非法操作！');die();}
        //检测是否是提交过来的数据
        if(IS_POST){
            $res = D("UserOauthApp")->insertData($eid,"1");
            if($res == "false"){
                $this->error('编辑失败！');die();
            }
            $this->redirect("Users/oauth_app_list",array("flag"=>"3"));die();
        }
    
        $edata = D("UserOauthApp")->getTabList("","id asc",array("id"=>$eid),"","1");
        $this->assign("edata",$edata);
        $this->display();
    }
    
    
    /***
     * @time 2016/07/01
     * @function 短信模板
     */
    public function sms_template_list(){
        $this->showSysTips();
        $this->getPublicControlData("SmsTemplate","Users/sms_template_list","title|call_index","","id asc","sms_template_list");
    }
    
    /**
     * @time 2016/07/04
     * @function 短信模板新增
     */
    public function sms_template_add(){
        //检测是否是提交过来的新增数据
        if(IS_POST){
            //var_dump($_REQUEST);die();
            $res = D("SmsTemplate")->insertData();
            if($res == "false"){
                $this->error('新增失败！');die();
            }
            $this->redirect("Users/sms_template_list",array("flag"=>"1"));die();
        }
        $this->display();
    }
    
    /**
     * @time 2016/07/04
     * @function 短信模板
     */
    public function sms_template_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        if($eid == ""){$this->error('非法操作！');die();}
        //检测是否是提交过来的数据
        if(IS_POST){
            $res = D("SmsTemplate")->insertData($eid,"1");
            if($res == "false"){
                $this->error('编辑失败！');die();
            }
            $this->redirect("Users/sms_template_list",array("flag"=>"3"));die();
        }
        
        $edata = D("SmsTemplate")->getTabList("","id asc",array("id"=>$eid),"","1");
        $this->assign("edata",$edata);
        $this->display();
    }
    
    /***
     * @time 2016/06/28
     * @function 邮件模板
     */
    public function mail_template_list(){
        $this->showSysTips();
        $this->getPublicControlData("MailTemplate","Users/mail_template_list","title|call_index","","id asc","mail_template_list");
    }
    
    /**
     * @time 2016/07/04
     * @function 邮件模板新增
     */
    public function mail_template_add(){
        //检测是否是提交过来的新增数据
        if(IS_POST){
            $res = D("MailTemplate")->insertData();
            if($res == "false"){
                $this->error('新增失败！');die();
            }
            $this->redirect("Users/mail_template_list",array("flag"=>"1"));die();
        }
        $this->display();
    }
    
    /**
     * @time 2016/07/04
     * @function 邮件模板编辑
     */
    public function mail_template_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:"";
        if($eid == ""){$this->error('非法操作！');die();}
        //检测是否是提交过来的数据
        if(IS_POST){
            $res = D("MailTemplate")->insertData($eid,"1");
            if($res == "false"){
                $this->error('编辑失败！');die();
            }
            $this->redirect("Users/mail_template_list",array("flag"=>"3"));die();
        }
    
        $edata = D("MailTemplate")->getTabList("","id asc",array("id"=>$eid),"","1");
        $this->assign("edata",$edata);
        $this->display();
    }
    
       
}