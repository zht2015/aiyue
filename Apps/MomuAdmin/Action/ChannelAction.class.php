<?php
namespace MomuAdmin\Action;
class ChannelAction extends CommonAction {
    protected $channel_id = '';
    public function __construct(){
        parent::__construct();
        $this->channel_id = $_GET['channel_id'];
    }
    
    /***
     * @time 2016/05/31
     * @biking
     * @function 配置搜索条件
     */
    public function getCondition(){
        $map = array();
        $ddlControlType = isset($_REQUEST['ddlControlType'])?I("ddlControlType"):"";
        $ddlCoumType = isset($_REQUEST['ddlCoumType'])?I("ddlCoumType"):"";
        $channelType = isset($_REQUEST['channelType'])?I("channelType"):"";
        $txtKeywords = isset($_REQUEST['txtKeywords'])?I("txtKeywords"):"";
        $siteid = isset($_REQUEST['siteid'])?$_REQUEST['siteid']:"";
        $channelwords = isset($_REQUEST['channelwords'])?I("channelwords"):""; 
        if(!empty($ddlControlType)){
            $map['control_type'] =array("eq",$ddlControlType); 
        }
        if(!empty($ddlCoumType)){
            $map['belongstab'] = array("eq",$ddlCoumType);
        }
        if(!empty($channelType)){
            $map['site_id'] = array("eq",$channelType);
        }
        
        if(!empty($txtKeywords)){
            $map['title']= array("like","%".$txtKeywords."%");
        }
        if(!empty($siteid)){
            $map['mcs.id'] = array("eq",$siteid);
        }
        if(!empty($channelwords)){
            $map['c.title'] = array("like","%".$channelwords."%");
        }
        
        return $map;
    }
    
    
    /**
     * @time 2016/05/30
     * @biking
     * @function 获取基本数据列表
     */
    public function attribute_field_list() {
        $where = $this->getCondition();
        $count = D("ArticleAttributeField")->getTabCount($where);// 查询满足要求的总记录数
        $Page = new \Think\Page($count,C('PAGE_SIZE'));// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $list = D("ArticleAttributeField")->getTabList("","sort_id desc",$where,$Page);// 获取分页数据
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数
        $this->display(); // 输出模板
    }
    
    /**
     * @time 2016/05/31
     * @biking
     * @function 获取基本数据列表
     */
    public function channel_list() {
        $this->showSysTips();
        
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
            if($evename == "btnDelete"){//删除频道操作
                //die($selids);
                $res = D("Channel")->delByCondition($selids);
                if($res == "false"){$this->redirect("Channel/channel_list",array("flag"=>"5"));;die();}
                $this->redirect("Channel/channel_list",array("flag"=>"2"));
            }
        }
        
        
        
        $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
        //$sites = D("ChannelSite")->getTabList(array("id","title"));//获取站点信息
        $where = $this->getCondition();//获取搜索条件
        $aaf = M('channel'); // 实例化
        $count = $aaf->alias('c')->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        //进行分页数据查询 
        $list = $aaf->alias("c")->where($where)->order('sort_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数
        //$this->assign('sites',$sites);//站点信息
        $this->assign("pagenum",$pagenum);
        $this->assign("txtkeywords",$_REQUEST['channelwords']);
        $this->display(); // 输出模板
    }
    
    
    /**
     * @time 2016/05/30
     * @biking
     * @function 将扩展字段写入数据库中
     */
    public function addData(){
       $res = D("ArticleAttributeField")->setFieldAndValue();
       //$res = D("ArticleAttributeField")->test();
    }
    
    /**
     * @time 2016/06/01
     * @biking
     * @function 修改表数据内容
     */
    public function saveData(){
        $res = D("ArticleAttributeField")->saveValue();
        echo $res;
    }
    
    /***
     * @time 2016/05/31
     * @biking
     * @function 通过传递过来的ids批量删除后台数据
     */
    public function del(){
        $deids = I("deids");
        $flag = isset($_REQUEST['flag'])?$_REQUEST['flag']:"";
        if(!empty($deids)) {
            if(empty($flag)){
                $res = D("ArticleAttributeField")->delByCondition($deids);
            }else{
                $res = D("Channel")->delByCondition($deids);
            }
            if($res=="error"){echo "error";die();}
            echo $res;
        }else{
            echo "error";
        }
    }
    
    /***
     * @time 2016/05/31
     * @biking
     * @function 获取编辑数据
     */
    public function attribute_field_edit(){
        $eid = I('id');
        if(empty($eid)){$this->error('操作失败','Channel/attribute_field_list',5);}
        $data = D("ArticleAttributeField")->getTabList("","",array("id"=>$eid),"","1");
        $this->assign("data",$data);
        $this->display();
    }
    
    /***
     * @time 2016/06/01
     * @biking
     * @function 获取编辑数据
     */
    public function channel_edit(){
        $eid = I('id');
        $tabid = isset($_REQUEST['tabid'])?$_REQUEST['tabid']:'';
        if(empty($eid)){$this->error('操作失败','Channel/channel_list',5);}
        //获取频道表中的数据
        $data = D("Channel")->getTabList("","",array("id"=>$eid),"","1");

        //获取站点数据
        //$site = D("ChannelSite")->getTabList(array("id","title"));
        //获取扩展字段信息
        //$files = D("ArticleAttributeField")->getTabList(array("id","title"),"",array("id"=>array("not in","3,4,5,6,7,8")));
        
        //获取该栏目的字段内容
        if($tabid != ''){
            $coums = D('ArticleAttributeField')->getTabList("","",array("belongstab"=>$tabid));
        }else{
            $coums = D('ArticleAttributeField')->getTabList("","",array("belongstab"=>$data['site_id']));
        }
        
        $this->assign('tabid',$tabid);
        $this->assign("data",$data);
        $this->assign('coums',$coums);
        //$this->assign("sites",$site);
        //$this->assign("files",$files);
        $this->display();
        
    }
    /***
     * @time 2016/06/01
     * @biking
     * @function 修改频道内容
     */
    public function save_channel(){
       //var_dump($_REQUEST);die();
       $res = D("Channel")->saveChannel();
       if($res == "success"){
           $this->redirect('Channel/channel_list', array("flag"=>"3"));die();
       }
       $this->error("保存数据失败");
    }
    
    
    /***
     * @time 2016/05/31
     * @biking
     * @function 更改表的排序值
     */
    public function edit_sort(){
        $eid = I("eid");
        $sortnum = I("sortnum");
        $flag = isset($_REQUEST['flag'])?$_REQUEST['flag']:"";
        if($flag == ""){
            $res = M("article_attribute_field")->where("id=".$eid)->setField(array("sort_id"=>$sortnum));
        }else{
            $res = M("channel")->where("id=".$eid)->setField(array("sort_id"=>$sortnum));
        }
        if($res !=="false"){
            echo "success";die();
        }
        echo "error";
    }
    
    
    public function attribute_field_add() {
        $this->display();
    }
    
    /**
     * @time 2016/06/01
     * @biking
     * @function 新增频道模板
     */
    public function channel_add() {
        //获取站点信息
        //$sites = D("ChannelSite")->getTabList(array("id","title"));
        //获取扩展字段信息
        //$files =D("ArticleAttributeField")->getTabList(array("id","title"),"",array("id"=>array("not in","3,4,5,6,7,8")));
        //$this->assign("sites",$sites);
        //$this->assign("files",$files);
        $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
        if($id != ''){
            $coumsdata = D('ArticleAttributeField')->getTabList('','id asc',array('belongstab'=>$id));
            $this->assign('coumsdata',$coumsdata);
            $this->assign('partnum',$id);
        }
        $this->display();
    }
    
    /***
     * @time 2016/06/01
     * @biking
     * @function 新增频道
     */
    public function insert_channel(){
        $res = D("Channel")->addData();
        if($res == "false"){
            //$this->error("新增失败");
            $this->redirect('Channel/channel_list', array("flag"=>"3"));
        }else{
            $this->redirect('Channel/channel_list', array("flag"=>"1"));
        }
    }
    
    /***
     * @time 2016/09/19
     * @function 获取相应栏目下的字段
     */
    public function getCoums(){
        $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
        if($id == ''){
            echo json_encode(array('code'=>0,'message'=>'栏目参数获取不到！'));exit();
        }
        
        $coumsdata = D('ArticleAttributeField')->getTabList('','id asc',array('belongstab'=>$id));
        
        if(count($coumsdata)<1){
            echo json_encode(array('code'=>1,'message'=>'栏目参数获取不到！'));exit();
        }
            
            echo json_encode(array('code'=>200,'message'=>'成功获取到数据！','data'=>$coumsdata));exit();
        
        
    }
    
    
}