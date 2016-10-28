<?php
/**
 * 爱阅用户个人中心模块
 * User: zht
 * Date: 2016/10/14
 */

namespace Home\Action;
class UsersAction extends CommonAction{


    /**用户注册**/
    public function userRegister(){
        if(!IS_AJAX){
            $this->display();             
        }else{
            $m  = D("Home/Users");
            //type=1 个人用户注册，type=2 出版社用户注册
            if(I("type")==1){
                $rs = $m->userRegister();
            }elseif(I('type')==2){
                $rs = $m->pressRegister();
            }
             $this->ajaxReturn($rs);              
        }
    }

    /**
     * 出版社注册提交资料
     * @author zht 2016-10-20
     * @return [type] [description]
     */
    public function tjzl(){
        if(!IS_AJAX){
            $this->display();
        }else{
            $m  = D("Home/Users");
            $rs = $m->tjzi();
            $this->ajaxReturn($rs);
        }
    }

    /**
     * 出版社审核中
     * @author zht 2016-10-24
     * @return [type] [description]
     */
    public function pressCheck(){
        $this->display();
    }


    public function registerSuccess(){
        $this->display();
    }



    /**
     * 忘记密码 第一步安全验证,验证手机号和验证码
     * @author zht 2016-10-14
     * @return [type] [description]
     */
    public function forgetPassword(){
        if(IS_AJAX){
            $user =D('Users');
            $rs = $user->forgetPassword();
            $this->ajaxReturn($rs);
        }else{
            $this->display();  
        }

    }

    /**
     * 发送手机验证码
     * @author zht 2016-10-28
     * @return [type] [description]
     */
    public function sendMsg(){
        //校验手机号
        $user =D('Users');
        $to  =I('post.phone');
        $templateId  =I('post.templateId');
        $type =I('post.type');
        //验证手机号码格式  
        
        if(!preg_match("/^1[34578]\d{9}$/", $to)){
            $rs['status']=-2;
            $rs["message"]="手机号码格式不正确";
            $this->ajaxReturn($rs);die;
        }

        if($type=="register"){
            if($user->verifyPhone($to)){
                //手机号码已注册返回false
                $rs['status']=-2;
                $rs["message"]="该手机号码已注册";
                $this->ajaxReturn($rs);die;
            }
        }elseif($type=="findPwd"){
            if(!$user->verifyPhone($to)){
                //手机号码未注册返回false
                $rs['status']=-2;
                $rs["message"]="该手机号码未注册";
                $this->ajaxReturn($rs);die;
            }
             
        }
                 
        //发送验证码
        $rs = $this->sendVerifyCode($templateId,$to);
        

        $this->ajaxReturn($rs);
    }

    /**
     * 忘记密码第二步 重置密码
     * @author zht 2016-10-14
     * @return [type] [description]
     */
    public function resetPassword(){
        if(!IS_AJAX){
            $this->display();
        }else{
            $user = D('Users');
            $newPassword=I('post.newPassword');
            $confirmPassword = I("post.confirmPassword");
            $rs = $user->resetPassword($newPassword,$confirmPassword);
            $this->ajaxReturn($rs);
        }

    }

    /**
     * 忘记密码第三步 重置密码成功
     * @author zht 2016-10-14
     * @return [type] [description]
     */
    public function resetSuccess(){
        $this->display();
    }



    /**用户登录**/
    public function userLogin(){
        
        $rs = array("status"=>-1);

        if(IS_AJAX){
             $m = D("Home/Users");
             /**验证验证码**/
             $checkVerify= $this->checkVerify(I("verify"));
             if($checkVerify){
                $rs = $m->userLogin();              
            }else{
                $rs['status']=-1;//验证码错误
                $rs['message']="验证码错误";
            }

            $this->ajaxReturn($rs);
            
        }else{
            $this->display();
        }
    }


    /**
     * 退出登录
     */
    public function logout(){
        $session=session('USERS',null);
        
        setcookie("username", "", time()-3600, "/"); 
        setcookie("password", "", time()-3600, "/"); 
        
        $this->redirect('Index/index', array(), 0);
       
    }

 


    /**个人资料**/
    public function userInfo(){
        $this->checkLogin();
        $m     = D("Home/Users");     
        if(IS_AJAX){
            /**修改用户基本信息**/
            $rs = $m->saveUserInfo();
            $this->ajaxReturn($rs);
        }else{

            $model =D('Areas');
            $province  = $model->where('area_type=1')->select(); 
            $city  = $model->where('area_type=2')->select(); 
            $this->assign('province',$province);
            $this->assign('city',$city);
            $this->display();
        }
    }



    /**
     * 出版社中心
     * @author zht 2016-10-24
     * @return [type] [description]
     */
    public function pressCenter(){
        $this->checkLogin();
        
        $this->display();
    }

    /**
     * 修改出版社信息
     * @author zht 2016-10-27
     * @return [type] [description]
     */
    public function pressInfo(){
        if(!IS_AJAX){
            $title="出版社资料";
            $model =D('Areas');
            $province  = $model->where('area_type=1')->select(); 
            $city  = $model->where('area_type=2')->select(); 
            $this->assign('title',$title);
            $this->assign('province',$province);
            $this->assign('city',$city);
            $this->display();
        }else{
            /**修改出版社基本信息**/
            $m     = D("Home/Users"); 
            $rs = $m->savePressInfo();
            $this->ajaxReturn($rs);
        }
    }

    /**加载城市**/
    public function loadCity(){
        $model =D('Areas');
        $provinceid=I('post.provinceid');
        $city  = $model->where("area_type=2 and parent_id='$provinceid'")->select();
        $this->ajaxReturn($city);
    }



    /**修改密码**/
    public function savePwd(){
        $this->checkLogin();
        if(IS_POST){
        $newPass=I('POST.password');
        $re_Pass=I('POST.re_password');
        if($newPass!==$re_Pass){
            $rs['status']=-1;//两次密码不一致
        }
        $checkVerify= $this->checkVerify(I("verify"));
        if($checkVerify){
            $newPass=md5($newPass);
            $res = D('Users')->savePwd($newPass);
            if($res){
              $rs['status']=1;//成功  
            }
            
        }else{
            $rs['status']=-2;//验证码错误
        }
         $this->ajaxReturn($rs);
        }else{
            $this->display();
        }
    }



    /*用户上传头像*/
    public function uploadIdCarts(){
        if(IS_POST){
            $upload = $this->_upload('300', '97', 'thumb_', FALSE);
            $url = "/".$upload['savepath'].$upload['savename'];
            $this->ajaxReturn(1);
        }else{
           
        }
    }

    public function uploadIdCart(){
        $upload = $this->_upload('300', '97', 'thumb_', FALSE);
        $model = D('Users');  
        if($upload['status']){
            $path=$upload['savepath'].$upload['savename'];
            $path=ltrim($path,'.');
            $model->saveAvatar($path);
        }
        echo json_encode($upload);
    }




    /*
    * 图片上传方法
    * $isthum是否移除原图
    */
    private function _upload($width, $height, $th, $isthum) {
        import('ORG.Net.UploadFile');
        $imgAllowExts = C('UPLOAD_EXTS');
        if (!file_exists(C('UPLOAD_PATH'))) {
            mkdir(C('UPLOAD_PATH'));
        }
        $savepath = C('UPLOAD_PATH');
        if (!file_exists($savepath . '/' . date('Ym'))) {
            mkdir($savepath . '/' . date('Ym'));
        }
        $savepath = $savepath . '/' . date('Ym') . '/' . date('d') . '/';
        if (!file_exists($savepath)) {
            mkdir($savepath);
        }
        $config = array(
            'maxSize' =>200000000, // 上传文件的最大值
            'supportMulti' => true, // 是否支持多文件上传
            'allowExts' => $imgAllowExts, // 设置附件上传类型
            'thumb' => true, // 使用对上传图片进行缩略图处理
            'thumbMaxWidth' => $width, // 缩略图最大宽度
            'thumbMaxHeight' => $height, // 缩略图最大高度
            'thumbPrefix' => $th, // 缩略图前缀
            'thumbSuffix' => '',
            'thumbPath' => $savepath, // 缩略图保存路径
            'thumbFile' => '', // 缩略图文件名
            'thumbExt' => '', // 缩略图扩展名
            'thumbRemoveOrigin' => $isthum, // 是否移除原图
            'zipImages' => false, // 压缩图片文件上传
            'autoSub' => false, // 启用子目录保存文件
            'subType' => 'hash', // 子目录创建方式 可以使用hash date
            'dateFormat' => 'Ymd',
            'hashLevel' => 1, // hash的目录层次
            'savePath' => $savepath, // 上传文件保存路径
            'autoCheck' => true, // 是否自动检查附件
            'uploadReplace' => false, // 存在同名是否覆盖
            'saveRule' => 'uniqid', // 上传文件命名规则
            'hashType' => 'md5_file', // 上传文件Hash规则函数名
        );
        $upload = new \UploadFile($config); // 实例化上传类
        if (!$upload->upload()) {// 上传错误提示错误信息
            return array('status' => 0, 'msg' => $upload->getErrorMsg());
        } else {// 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();

            return array(
                'status' => 1,
                'savepath' => $info[0]['savepath'],
                'savename' => $info[0]['savename'],
                'name'     => $info[0]['name'],
            );
        }
    }


        


    /**
     * 发送短信验证码
     * @author zht 2016-10-20
     * @return [type] [description]
     */
    public function sendVerifyCode($templateId,$to){
        //初始化必填
        $options['accountsid']='71ee68ee5e39a9bdc2c759460db803cd'; 
        $options['token']='eb5fb103d7129a51bf19b812c2705df4';
        //初始化 $options必填
        $ucpass = new \Org\Momu\Ucpaas($options);
                
        //随机生成6位验证码
        srand(mktime());//create a random number feed.
        $ychar="0,1,2,3,4,5,6,7,8,9";
        $list=explode(",",$ychar);
        for($i=0;$i<6;$i++){
        $randnum=rand(0,9); // 10+26;
        $authnum.=$list[$randnum];
        }
      
        $authnum = strtolower($authnum);
        $appId = "17ef883218ae40e492af7312e0b25149";
        //$to = "13303859657";
        //$to = I("post.phone");
        //$templateId = "30746";
        if($templateId =="30746"){
            $param="爱阅,$authnum,10";
        }else{
            $param=$authnum;
        }
        
        $arr=$ucpass->templateSMS($appId,$to,$templateId,$param);           
        $result  =json_decode($arr,true);            
        
        if($result['resp']['respCode']=="000000"){
            /*在服务器端保存验证码*/
            session('verifyCode',$authnum);
            session('userphone',$to);
            //session(array($to=>$authnum,'expire'=>60));
            $rs['status']=1;
            $rs['message']="验证码已发送成功，请注意查收短信";
        }else{
            $rs['status']=-1;
            $rs['message']="短信验证码发送失败(".$result['resp']['respCode'].")，请联系客服";
        }

        
          return $rs;  
         
          
    }

  


    /**
     * 意见反馈
     * @author zht 2016-10-17
     * @return [type] [description]
     */
    public function feedBack(){
        $this->checkLogin();
        if(!IS_AJAX){
            $this->display();
        }else{
            $feedback = D('Users');
            $res = $feedback->saveMessage();
            $this->ajaxReturn($res);
        }
    }

    /**
     * 站内信
     * @author zht 2016-10-19
     * @return [type] [description]
     */
    public function message(){
        $this->display();
    }


    /**
     * 我关注的
     * @author zht 2016-10-19
     * @return [type] [description]
     */
    public function myFollow(){
         $this->display();
    }


    /**
     * 关注我的
     * @author zht 2016-10-19
     * @return [type] [description]
     */
    public function followMe(){
        $this->display(); 
    }

}