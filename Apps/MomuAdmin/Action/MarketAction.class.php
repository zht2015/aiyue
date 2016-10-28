<?php
namespace MomuAdmin\Action;
class MarketAction extends CommonAction {
    protected $channel_id = '';
    public function __construct(){
        parent::__construct();
        $this->channel_id = $_GET['channel_id'];
    }
    
    /***
     * @time 2016/06/27
     * @function 获取删除的id字符串
     * 
     */
    public function getDelIdStr(){
        $hideid = $_REQUEST['hidId'];//列表的id
        $checkid = $_REQUEST['chkId'];//选中的id的下标
        //获取选中的产品的id字符串
        $checkidstr = "";
        foreach($checkid as $k=>$v){
            $checkidstr .= $hideid[$k].",";
        }
        $checkidstr = substr($checkidstr,0,-1);//选中的id的字符串
        return $checkidstr;      
    }
    
    /**
     * @time 2016/06/02
     * @biking
     * @function 获取基本数据列表
     */
    public function article_list() {
       $result = isset($_REQUEST['flag'])?$_REQUEST['flag']:"";//操作的结果 
       $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
       $defaultview = isset($_REQUEST['viewtype'])?$_REQUEST['viewtype']:"viewimg";
       
       $ddlCategoryId = isset($_REQUEST['ddlCategoryId'])?I("ddlCategoryId"):"";//筛选条件
       $txtKeywords = isset($_REQUEST['txtKeywords'])?I("txtKeywords"):"";//筛选条件
       
       $startt = isset($_REQUEST['startt']) ? I("startt") : ""; //筛选条件
       $deadlinet = isset($_REQUEST['deadlinet']) ? I("deadlinet") : ""; //筛选条件

       $where = "";
       
       if(IS_POST){
           $evenname = $_REQUEST['__EVENTTARGET'];
           $eventip = $_REQUEST['__EVENTARGUMENT'];
           if($evenname == "lbtnViewTxt"){
               $defaultview = "viewtxt";
           }elseif($evenname == "lbtnViewImg"){
               $defaultview = "viewimg";
           }else if($evenname == "ddlCategoryId" || $evenname == "lbtnSearch" ){
               if(!empty($_REQUEST['ddlCategoryId'])){$ddlCategoryId =$_REQUEST['ddlCategoryId']; }
               if(!empty($_REQUEST['txtKeywords'])){$txtKeywords =$_REQUEST['txtKeywords']; }
           }else if($evenname == "textPageNum"){
               $pagenum = $_REQUEST['txtPageNum'];
           }else{
               if($evenname=="btnDelete"){
                   //执行删除操作
                   $checkidstr = $this->getDelIdStr();//选中的id的字符串
                   $dres = D("MarketValue")->delDataById($checkidstr);
                   $this->redirect("Market/article_list",array("channel_id"=>$this->channel_id,"flag"=>"2","viewtype"=>$defaultview,"txtPageNum"=>$pagenum));
               }
           }
           
       }
       
       
       $where['channel_id'] = $this->channel_id;//内容所属的频道
       //var_dump($_REQUEST);echo "----";var_dump($where);
       
       if($ddlCategoryId != "" && $ddlCategoryId != "0"){//筛选分类
           $articleidarr = D("MarketCatRelation")->getTabList(array("articleid"),"id asc",array("categoryid"=>$ddlCategoryId)); 
           if(count($articleidarr)>0){
               foreach($articleidarr as $v){//构造该分类下的articleid字符串
                   $articleids .=$v['articleid'].","; 
               }
               $articleids = substr($articleids,0,-1);
               $where['id'] = array("in",$articleids);
           }else{
               $where['id'] = array("in","0");
           }
       }
       
       $searchcoums = D("SearchField")->showListCoum($this->channel_id);
       if($searchcoums != ''){
           $searchstr = '';
           foreach($searchcoums as $v){
               $searchstr .= $v['title'].",";
           }
           $searchstr = rtrim($searchstr,",");
       }
       if($txtKeywords != ""){//筛选提示信息
           //获取搜索的字段名称和字段
           if($searchcoums != ''){
              $scoum = '';
              foreach($searchcoums as $v){
                  if($v['name'] != ''){
                      $scoum .= $v['name']."|";
                  }
              }
              if($scoum != ''){
                  $scoum = rtrim($scoum,"|");
              }
              if($scoum != ''){
                  $where[$scoum] = array("like","%".$txtKeywords."%");
              }
           }
       }
       
       //时间搜索
       if($startt != ''){
           $where['add_time'] = array('egt',$startt." 00:00:00");
       }
      
       if($deadlinet != ''){
           $where['add_time'] = array('elt',$deadlinet." 23:59:59");
       }
       
       if($startt != '' && $deadlinet != ''){
           $where['add_time'] = array('between',array($startt." 00:00:00",$deadlinet." 23:59:59"));
       }
       
       //var_dump($where);die();
       
       //获取需要展示的字段
       if($defaultview == 'viewimg'){//列表视图模板
           $listcoums = D("MarketField")->showListCoum($this->channel_id);
       }else{//图片视图模板
           $listcoums = '';
       }
       
        $count = D("MarketValue")->getTabCount($where);// 查询满足要求的总记录数
        $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $list = D("MarketValue")->getTabList('',"id desc",$where,$Page);// 获取分页数据

        $this->assign("result",$result);
        
        $categorys = $this->getParentData("1");//获取内容所属分类
        $this->assign("categorys",$categorys);
        
        $this->assign("searchstr",$searchstr);
        $this->assign('listcoums',$listcoums);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('totalcount',$count);//总条数 
        $this->assign("channelid",$this->channel_id);
        $this->assign("pagenum",$pagenum);
        if($defaultview == "viewimg"){
            $this->display(); // 输出模板列表
        }else{
            $this->display("articleViewTxt"); //输出模板图片
        }
    }
    
    /***
     * @time 2016/06/03
     * @biking
     * @function 返回频道的扩展字段（html拼接） 
     */
    public function getExtensionHtml($extarr=""){
        //return "";
        $exthtml = "";
        $coums = "";//需要的扩展字段的多个id字符串
        $extcoum = D("ChannelField")->getTabList(array('field_id'),"",array("channel_id"=>$this->channel_id));//获取频道的扩展字段数据
        foreach($extcoum as $v){
            $coums .= $v['field_id'].",";
        }
        if(empty($coums)){
            return "";//没有可扩展的字段
        }
        $coums = substr($coums,0,-1);//处理id字符串，将最后一个，去除
        
        $extcoummess = D("ArticleAttributeField")->getTabList("","sort_id desc",array("id"=>array("in",$coums)));//获取所扩展的字段相关信息
        if($extarr != ""){
            foreach($extcoummess as $k){
                //遍历字段的信息，拼接扩展字段模块的html数据
                switch($k['control_type']){
                    //单文本
                    case 'single-text':
                        $exthtml .= "<dl id='div_".$k[name]."'><dt><span id='div_".$k['name']."_title'>".$k['title']."</span></dt><dd><input name='".$k['name']."' type='text' value='".$extarr[$k['name']]."' id='".$k['name']."' class='input normal' /><span id='div_".$k['name']."_tip' class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //数字
                    case 'number':
                        $exthtml .= "<dl id='div_".$k[name]."'><dt><span id='div_".$k['name']."_title'>".$k['title']."</span></dt><dd><input name='".$k['name']."' type='text' value='".$extarr[$k['name']]."' id='".$k['name']."' class='input small' datatype='n' /><span id='div_".$k['name']."_tip' class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //多项单选
                    case 'multi-radio':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><div class='rule-multi-radio'><span id='".$k['name']."'>";   
                        $tmparr = explode(";", $k['item_option']);
                        for($i=0;$i<count($tmparr);$i++){
                            $inarr = explode("|",$tmparr[$i]);
                            if(!empty($tmparr[$i])){
                                if($extarr[$k['name']] == $inarr[1]){
                                    $exthtml .= "<input id='".$k['name']."_".$i."' type='radio' checked name='".$k['name']."' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                                }else{
                                    $exthtml .= "<input id='".$k['name']."_".$i."' type='radio' name='".$k['name']."' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                                }
                            }
                        }
                        $exthtml .= "</span></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";
                    break;
                    //单选
                    case 'checkbox':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><div class='rule-single-checkbox'><input id='".$k['name']."' type='checkbox' name='".$k['name']."' /></div></dd></dl>";    
                    break;
                    //多行文本
                    case 'multi-text':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><textarea name='".$k['name']."' rows='2' cols='20' id='".$k['name']."' class='input'>".$extarr[$k['name']]."</textarea><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //多项多选
                    case 'multi-checkbox':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><div class='rule-multi-checkbox'><span id='".$k['name']."'>";
                        $tmparr = explode(";", trim($k['item_option']));
                        for($i=0;$i<count($tmparr);$i++){
                            $inarr = explode("|",$tmparr[$i]);
                            if(!empty($tmparr[$i])){
                                if($extarr[$k['name']] == $inarr[1]){
                                    $exthtml .= "<input id='".$k['name']."_".$i."' checked type='checkbox' name='".$k['name']."[]' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                                }else{
                                    $exthtml .= "<input id='".$k['name']."_".$i."' type='checkbox' name='".$k['name']."[]' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                                }
                            }
                        }
                        $exthtml .= "</span></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";
                    break;
                    //图片上传
                    case 'images':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='".$k['name']."' value='".$extarr[$k['name']]."' type='text' id='".$k['name']."' class='input normal upload-path' /><div class='upload-box upload-img' style='margin-left:4px;'></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //视频上传
                    case 'video':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='".$k['name']."' value='".$extarr[$k['name']]."' type='text' id='".$k['name']."' class='input normal upload-path' /><div class='upload-box upload-video' style='margin-left:4px;'></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //编辑器
                    case 'editor':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><textarea name='".$k['name']."' id='".$k['name']."' style='visibility:hidden;' class='editor'>".$extarr[$k['name']]."</textarea><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //时间
                    case 'date-input':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='".$k['name']."' value='".$extarr[$k['name']]."' type='text' id='".$k['name']."' class='input rule-date-input' onfocus='WdatePicker({dateFmt:&#39;yyyy-MM-dd HH:mm:ss&#39;})' datatype='/^\s*$|^\d{4}\-\d{1,2}\-\d{1,2}\s{1}(\d{1,2}:){2}\d{1,2}$/' errormsg='请选择正确的日期' sucmsg='' /><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                        /* $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='field_control_".$k['name']."' type='text' id='field_control_".$k['name']."' class='input rule-date-input' onfocus='WdatePicker({dateFmt:&#39;yyyy-MM-dd HH:mm:ss&#39;})' datatype='/^\s*$|^\d{4}\-\d{1,2}\-\d{1,2}\s{1}(\d{1,2}:){2}\d{1,2}$/' errormsg='请选择正确的日期' sucmsg='' /><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";     */
                    break;
                    default: $exthtml = "";
                }
            }
            
        }else{
            foreach($extcoummess as $k){
                //遍历字段的信息，拼接扩展字段模块的html数据
                switch($k['control_type']){
                    //单文本
                    case 'single-text':
                        $exthtml .= "<dl id='div_".$k[name]."'><dt><span id='div_".$k['name']."_title'>".$k['title']."</span></dt><dd><input name='".$k['name']."' type='text' value='".$k['default_value']."' id='".$k['name']."' class='input normal' /><span id='div_".$k['name']."_tip' class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //数字
                    case 'number':
                        $exthtml .= "<dl id='div_".$k[name]."'><dt><span id='div_".$k['name']."_title'>".$k['title']."</span></dt><dd><input name='".$k['name']."' type='text' value='".$k['default_value']."' id='".$k['name']."' class='input small' datatype='n' /><span id='div_".$k['name']."_tip' class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //多项单选
                    case 'multi-radio':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><div class='rule-multi-radio'><span id='".$k['name']."'>";   
                        $tmparr = explode(";", $k['item_option']);
                        for($i=0;$i<count($tmparr);$i++){
                            $inarr = explode("|",$tmparr[$i]);
                            if(!empty($tmparr[$i])){
                                if($k['default_value'] == $inarr[1]){
                                    $exthtml .= "<input id='".$k['name']."_".$i."' checked type='radio' name='".$k['name']."' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                                }else{
                                    $exthtml .= "<input id='".$k['name']."_".$i."' type='radio' name='".$k['name']."' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                                }
                            }
                        }
                        $exthtml .= "</span></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";
                    break;
                    //单选
                    case 'checkbox':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><div class='rule-single-checkbox'><input id='".$k['name']."' type='checkbox' name='".$k['name']."' /></div></dd></dl>";    
                    break;
                    //多行文本
                    case 'multi-text':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><textarea name='".$k['name']."' rows='2' cols='20' id='".$k['name']."' class='input'>".$k['default_value']."</textarea><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //多项多选
                    case 'multi-checkbox':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><div class='rule-multi-checkbox'><span id='".$k['name']."'>";
                        $tmparr = explode(";", trim($k['item_option']));
                        for($i=0;$i<count($tmparr);$i++){
                            $inarr = explode("|",$tmparr[$i]);
                            if(!empty($tmparr[$i])){
                                $exthtml .= "<input id='".$k['name']."_".$i."' type='checkbox' name='".$k['name']."[]' value='".$inarr[1]."' /><label for='".$k['name']."_".$i."'>".$inarr[0]."</label>";
                            }
                        }
                        $exthtml .= "</span></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";
                    break;
                    //图片上传
                    case 'images':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='".$k['name']."' type='text' id='".$k['name']."' class='input normal upload-path' /><div class='upload-box upload-img' style='margin-left:4px;'></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //视频上传
                    case 'video':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='".$k['name']."' type='text' id='".$k['name']."' class='input normal upload-path' /><div class='upload-box upload-video' style='margin-left:4px;'></div><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //编辑器
                    case 'editor':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><textarea name='".$k['name']."' id='".$k['name']."' style='visibility:hidden;' class='editor'></textarea><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                    break;
                    //时间
                    case 'date-input':
                        $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='".$k['name']."' type='text' id='".$k['name']."' class='input rule-date-input' onfocus='WdatePicker({dateFmt:&#39;yyyy-MM-dd HH:mm:ss&#39;})' datatype='/^\s*$|^\d{4}\-\d{1,2}\-\d{1,2}\s{1}(\d{1,2}:){2}\d{1,2}$/' errormsg='请选择正确的日期' sucmsg='' /><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";    
                        /* $exthtml .= "<dl><dt>".$k['title']."</dt><dd><input name='field_control_".$k['name']."' type='text' id='field_control_".$k['name']."' class='input rule-date-input' onfocus='WdatePicker({dateFmt:&#39;yyyy-MM-dd HH:mm:ss&#39;})' datatype='/^\s*$|^\d{4}\-\d{1,2}\-\d{1,2}\s{1}(\d{1,2}:){2}\d{1,2}$/' errormsg='请选择正确的日期' sucmsg='' /><span class='Validform_checktip'>".$k['valid_tip_msg']."</span></dd></dl>";     */
                    break;
                    default: $exthtml = "";
                }
            }
            
        }
        
        return $exthtml;
    }
    
    /***
     * @time 2016/06/03
     * @biking
     * @function 新增模板
     */
    public function article_add(){
        $channeld = D("Channel")->getTabList(array("is_albums","is_attach","is_spec"),"id asc",array("id"=>$this->channel_id),"","1");//获取频道数据
        $extencoum = $this->getExtensionHtml();//获取频道的扩展字段html内容
        $articlecate = array();
        //获取一级分类的数据
        $catdata = D('MarketCategory')->getTabList(array('id','title'),'id asc',array('channel_id'=>$this->channel_id,'parent_id'=>0));

        //将一级分类和该一级分类下的二级分类数据全部写入到二维数组中
        foreach($catdata as $v){
            $tmp = array();
            array_push($tmp,array('id'=>$v['id'],'title'=>$v['title']));
            $subcatdata = D('MarketCategory')->getTabList(array('id','title'),'id asc',array('parent_id'=>$v['id']));
            if(count($subcatdata)>0){
                foreach($subcatdata as $val){
                    array_push($tmp,$val);
                }
            }
            
            array_push($articlecate,$tmp);
        }
        
        //echo "<pre />";var_dump($articlecate);die();
        
        $this->assign("extcoum",$extencoum);
        $this->assign("categorydata",$articlecate);
        $this->assign("channeldata",$channeld);
        $this->assign("channelid",$this->channel_id);
        $this->assign("viewtype",$_REQUEST['viewtype']);
        $this->display();
    }
    
    /***
     * @time 2016/06/20
     * @function 新增
     */
    public function article_insert(){
        //var_dump($_REQUEST);die();
        $viewtype = $_REQUEST['viewtype'];
        $res = D("MarketValue")->articleDataInsert($this->channel_id);
        if($res == "false"){
            $this->error("新增失败了！请重试");die();
        }
        $this->redirect("Market/article_list",array("channel_id"=>$this->channel_id,"viewtype"=>$viewtype,"flag"=>"1"));
        
    }
    
    /***
     * @time 2016/06/27
     * @function 编辑模板
     */
    public function article_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){$this->error('获取不到需要编辑的模块！');die();}
        $channeld = D("Channel")->getTabList(array("is_albums","is_attach","is_spec"),"id asc",array("id"=>$this->channel_id),"","1");//获取频道数据
        
        $articlecate = array();
        //获取一级分类的数据
        $catdata = D('MarketCategory')->getTabList(array('id','title'),'id asc',array('channel_id'=>$this->channel_id,'parent_id'=>0));
        
        //将一级分类和该一级分类下的二级分类数据全部写入到二维数组中
        foreach($catdata as $v){
            $tmp = array();
            array_push($tmp,array('id'=>$v['id'],'title'=>$v['title']));
            $subcatdata = D('MarketCategory')->getTabList(array('id','title'),'id asc',array('parent_id'=>$v['id']));
            if(count($subcatdata)>0){
                foreach($subcatdata as $val){
                    array_push($tmp,$val);
                }
            }
        
            array_push($articlecate,$tmp);
        }
        
        
        //获取产品的相册信息
        $albums = D("MarketAlbums")->getTabList("","",array("article_id"=>$eid));
        //获取产品的附件信息
        $attachs = D("MarketAttach")->getTabList("","",array("article_id"=>$eid));
        //获取产品的扩展信息
        $extval  = D("MarketValue")->getTabList("","",array("id"=>$eid),"","1");
        
        //echo "<pre/>";var_dump($extval);die();
        
        $this->assign("albums",$albums);
        $this->assign("attachs",$attachs);
        $this->assign("extval",$extval);
        $extencoum = $this->getExtensionHtml($extval);//获取频道的扩展字段html内容
            
        $this->assign("extcoum",$extencoum);
        $this->assign("categorydata",$articlecate);
        
        $this->assign("channeldata",$channeld);
        $this->assign("channelid",$this->channel_id);
        $this->assign("eid",$eid);
        $this->assign("viewtype",$_REQUEST['viewtype']);
        $this->display();
    }
    
    /***
     * @time 2016/06/27
     * @function 编辑数据写入
     */
    public function article_save(){
        //var_dump($_REQUEST);die();
        $viewtype = $_REQUEST['viewtype'];
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){$this->error('获取不到需要编辑的模块！');die();}
        $res = D("MarketValue")->articleDataSave($this->channel_id,$eid);
        if($res == "false"){
            //$this->error("编辑失败了！请重试");die();
            $this->redirect("Market/article_list",array("channel_id"=>$this->channel_id,"viewtype"=>$viewtype,"flag"=>"6"));
        }
        $this->redirect("Market/article_list",array("channel_id"=>$this->channel_id,"viewtype"=>$viewtype,"flag"=>"3"));
    }
    /***
     * @time 2016/06/24
     * @function 无限极分类列表
     * 
     */
    public function category_list(){

        $result = isset($_REQUEST['flag'])?$_REQUEST['flag']:"";//操作的结果
        $msg = isset($_REQUEST['msg'])?$_REQUEST['msg']:"";//操作的提示
        //获取无限极分类的数据
        $categorydata=$this->getParentData();  
        if(IS_POST){
            //删除操作
            if($_REQUEST['__EVENTTARGET'] == "btnDelete"){
                //获取删除的id字符串序列
                $delstr = "";
                foreach($_REQUEST['chkId'] as $k=>$v){
                    $delstr .= $_REQUEST['hidId'][$k].",";
                }
                $delstr = substr($delstr,0,-1);
                
                //判断是否分类是否包含子层，如果包含，则本次批量删除失败
                $flag = true;
                $didarr = explode(",", $delstr);
                for($i=0;$i<count($didarr);$i++){
                    if($this->isHaveSubCategory($didarr[$i])){
                        $flag = false;
                        break;
                    }
                }
                if($flag){//可进行批量删除操作
                    $delres = D("MarketCategory")->delDataById($delstr);
                    if($delres){
                        $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"2"));
                    }else{
                        $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"5"));
                    }
                }else{
                     $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"7","msg"=>"批量删除失败!选中的分类不能包含子分类！请先将子分类进行删除后再将该父分类删除！"));die();
                }
                
            }
            
        }

        $this->assign("result",$result);
        $this->assign("msg",$msg);
        $this->assign("channelid",$this->channel_id);
        $this->assign("categorylist",$categorydata);
        $this->display();
    }
    
    /***
     * @time 2016/06/24
     * @function 分类新增(模板页)
     */
    public function category_add(){
        $cates = $this->getParentData("1");
        $this->assign("cates",$cates);
        
        if(isset($_REQUEST['id'])){
            $this->assign('cateid',$_REQUEST['id']);
        }
        $this->assign("channelid",$this->channel_id);
        $this->display();
    }
    
    /***
     * @time 2016/06/24
     * @function 分类新增（数据新增）
     */
    public function category_insert(){
        //var_dump($_REQUEST);die();
        $res = D("MarketCategory")->dataInsert();
        if($res){
            $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"1"));die();
        }
             $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"4"));
        
    }
    
    /***
     * @time 2016/06/27
     * @function 编辑分类模板
     */
    public function category_edit(){
        $eid = isset($_REQUEST['id'])?$_REQUEST['id']:0;
        if($eid == 0){$this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"msg"=>"获取不到需要编辑的行"));die();}
        $edata = D("MarketCategory")->getTabList("","",array("id"=>$eid),"","1");
        //var_dump($edata);
        
        $cates = $this->getParentData("1");//获取分类数据
        $this->assign("cates",$cates);
        $this->assign("channelid",$this->channel_id);
        $this->assign("edata",$edata);
        $this->display();
    }
    
    /***
     * @time 2016/06/27
     * @function 编辑分类保存
     */
    public function category_save(){
        //var_dump($_REQUEST);die();
        $res = D("MarketCategory")->dataSave();
        if($res){
            $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"3"));die();
        }
        $this->redirect('Market/category_list',array("channel_id"=>$this->channel_id,"flag"=>"6"));
    }
    
    /***
     * @time 2016/06/24
     * @function 获取一级分类
     */
    public function getParentData($type=""){
        $categorydata = array();
        //1、获取所有的一级分类
        if(!empty($type)){
            $data = D("MarketCategory")->getTabList(array("id","title"),"sort_id asc",array("channel_id"=>$this->channel_id,"parent_id"=>0));
        }else{
            $data = D("MarketCategory")->getTabList("","sort_id asc",array("channel_id"=>$this->channel_id,"parent_id"=>0));
        }
        //2、根据分类id自动递归获取所有子类id
        foreach($data as $v){
            if($this->isHaveSubCategory($v['id'])){
                $v['befor'] = empty($type)?"<span class='folder-open'></span>":"├";
                array_push($categorydata,$v);
                $this->getAllSubCategory($v['id'], 1, $categorydata,$type);
            }else{
                $v['befor'] = "";
                array_push($categorydata,$v);
            }
        }
        return $categorydata;
    }
    
    /***
     * @time 2016/06/24
     * @function 递归获取所有子分类数据
     */
    public function getAllSubCategory($pid,$leve,&$categorydata,$type=""){
        $strper = "&emsp;&emsp;";
        if(!empty($type)){
            $tmp = D("MarketCategory")->getTabList(array("id","title"),"sort_id asc",array("channel_id"=>$this->channel_id,"parent_id"=>$pid));
        }else{
            $tmp = D("MarketCategory")->getTabList("","sort_id asc",array("channel_id"=>$this->channel_id,"parent_id"=>$pid));
        }
        for($i=0;$i<$leve;$i++){
            $str.= $strper;
        }
        ++$leve;
        foreach($tmp as $val){
            if($this->isHaveSubCategory($val['id'])){
                //有子类
                if(!empty($type)){
                    $val['befor'] = $str."├";
                }else{
                    $val['befor'] = $str."<span class='folder-line'></span><span class='folder-open'></span>";
                }
                array_push($categorydata,$val);
                $this->getAllSubCategory($val['id'], $leve, $categorydata,$type);
            }else{
               //没有子类
               if(!empty($type)){
                 $val['befor'] = $str."├";
               }else{
                 $val['befor'] = $str."<span class='folder-line'></span>";
               }
                array_push($categorydata,$val);
            }
        }
    }
    
    /***
     * @time 2016/06/24
     * @function 检测改id是否包含子类
     */
    public function isHaveSubCategory($id){
        $res = D("MarketCategory")->getTabList("","",array("parent_id"=>$id));
        if(count($res)>0){
            //存在
            return true;
        }
            return false;
    }
    
    
    /***
     * @time 2016/06/27
     * @function 评论列表
     */
    public function comment_list(){
        $pagenum = isset($_REQUEST['txtPageNum'])?$_REQUEST['txtPageNum']:C('PAGE_SIZE');//获取分页的每页数据条数
        $where['channel_id'] = $this->channel_id;
        if(IS_POST){
            if($_REQUEST['__EVENTTARGET'] == "btnDelete"){
                $checkidstr = $this->getDelIdStr();//选中的id的字符串
                $dres = D("ArticleComment")->delById($checkidstr);
                if($dres){
                    $this->redirect("Article/comment_list",array("channel_id"=>$this->channel_id),1,"删除成功！自动为您跳转中。。。");
                }else{
                    $this->redirect("Article/comment_list",array("channel_id"=>$this->channel_id),3,"删除失败！自动为您跳转中。。。");
                }
            }
            
        }
        
        $count = D("ArticleComment")->getTabCount($where);// 查询满足要求的总记录数
        if($count<=0){
            $this->assign("isempty","0");
        }else{
            $Page = new \Think\Page($count,$pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            $list = D("ArticleComment")->getTabList("","",$where,$Page);// 获取分页数据
            
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('totalcount',$count);//总条数
            $this->assign("channelid",$this->channel_id);
            $this->assign("pagenum",$pagenum);
        }
        
        $this->display(); // 输出模板
        
    }
    
    
}