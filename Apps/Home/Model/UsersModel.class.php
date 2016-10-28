<?php
/**
 * 爱阅
 * User: zht
 * Date: 2016/10/18
 * Time: 16:59
 */
namespace Home\Model;
class UsersModel extends CommonModel{
    /**
    *用户基本信息
    **/
    public function userInfo(){
        $id = session("USERS.id");

        /**获取用户基本信息**/
        $m = M('Users');
        $user=$m->where(array('id'=>$id))->find();
        return $user;
    }
    /**
     * 用户登录
     **/
    public function userLogin(){
        
        $where['user_name'] = I("userName");
        $where['mobile'] = I("userName");
        $where['_logic'] = 'or';
        $map['_complex'] = $where;
        $map['password'] = md5(I("password"));
        $m = M("Users");
        $getUserInfo =$m->where($map)->find();
        if(!empty($getUserInfo)){
            //出版社用户
            if($getUserInfo['user_type']==1){
                if($getUserInfo['status']==1){
                    $rs['status']=-3;
                    $rs['message']="出版社用户还没有提交资料";
                    $rs['id']=$getUserInfo['id'];
                }elseif($getUserInfo['status']==2){
                    $rs['status']=-4;
                    $rs['message']="资料正在审核中";                    
                }elseif($getUserInfo['status']==0){
                    //正常
                    session("USERS",$getUserInfo);
                    if(I('post.remember')){      
                     setcookie("username", $data['user_name'], time()+3600*24, "/"); 
                     setcookie("password", $data['password'], time()+3600*24, "/"); 
                     }
                     $rs['status']=1;
                     $rs['message']="登录成功";
                }
            }elseif($getUserInfo['user_type']==0){
                //个人用户
                session("USERS",$getUserInfo);
                if(I('post.remember')){      
                 setcookie("username", $data['user_name'], time()+3600*24, "/"); 
                 setcookie("password", $data['password'], time()+3600*24, "/"); 
                 }
                 $rs['status']=1;
                 $rs['message']="登录成功";

            }
            
        }else{
            $rs['status']=-2;
            $rs['message']="用户名或密码错误";
        }

        return $rs;
        
    }
    /**
     * 用户注册
     * */
    public function userRegister(){
        $data['user_type']=0;//个人用户
        $data['group_id']=1;
        $data['mobile'] = I("phone");
        $data['user_name'] = I('userName');
        $data['password'] = md5(I('password'));
        $data['status'] = 0;//正常
        $data['reg_time'] = date("Y-m-d H:i:s");
        $data['reg_ip'] = $_SERVER['REMOTE_ADDR'];
        $code    = I('post.verifyCode');
        if($this->check_code($code)){
            
            //验证手机号码格式            
            if(!preg_match("/^1[34578]\d{9}$/", $data['mobile'])){
                $rs['status']=0;
                $rs["message"]="手机号码格式不正确";
                return $rs;
            }
            //验证手机号码是否已注册
            if($this->verifyPhone($data['mobile'])){
                $rs['status']=0;
                $rs["message"]="手机号码已注册";
                return $rs;
            }

            //验证用户名是否已存在
            if($this->verifyUserName($data['user_name'])){
                $rs['status']=-3;
                $rs["message"]="用户名已存在";
                return $rs;
            }

            if($this->add($data)){
                //注册成功
                $rs['status']=1;
                $rs["message"]="注册成功";
            }else{
                //注册成功
                $rs['status']=-2;
                $rs["message"]="注册失败";
            }
            
        }else{
            //验证码错误
            $rs['status']=-1;
            $rs["message"]="验证码错误";
            
        }      
        return $rs;
    }



    public function pressRegister(){
        $data['user_type']=1;//出版社用户
        $data['group_id']=1;
        $data['user_name'] = I('userName');
        //$data['user_name'] = "xiaoming";
        $data['password'] = md5(I('password'));
        //$data['password'] = md5("123456");
        $data['reg_time'] = date("Y-m-d H:i:s");
        $data['press'] = I('press');
        //$data['press'] = "清华出版社";
        $data['status'] = 1;//待验证
        $data['reg_ip'] = $_SERVER['REMOTE_ADDR'];

        //1.对用户名进行判断，为空/已存在
        if($data['user_name']==""){
            $rs['status'] = -1;
            $rs['message'] = "用户名不能为空";
            return $rs;
            die;
        }

        if($this->verifyUserName($data['user_name'])){
            $rs['status'] = -1;
            $rs['message'] = "用户名已存在";
             return $rs;
             die;
        }

        //2.对单位进行判断，为空/已存在
        if($data['press']==""){
            $rs['status'] = -2;
            $rs['message'] = "单位不能为空";
             return $rs;
             die;
        }

        if($this->verifyPress($data['press'])){
            $rs['status'] = -2;
            $rs['message'] = "单位已存在";
             return $rs;
             die;
        }
        //3.对密码进行判断
        if($data['password']==""){
            $rs['status'] = -3;
            $rs['message'] = "密码不能为空";
             return $rs;
             die;
        }

        if($id=$this->add($data)){
            //注册成功
            $rs['status']=1;
            $rs["message"]="注册成功";
            $rs['id']=$id;
        }else{
            //注册失败
            $rs['status']=-4;
            $rs["message"]="注册失败";
        }

        return $rs;


    }


    public function tjzi(){
        $data['name']=I('post.name');
        $data['sex']=I('post.sex');
        $data['position']=I('post.position');
        $data['idnum']=I('post.idnum');
        $data['mobile']=I('post.phone');
        $data['email']=I('post.email');
        $data['license']=I('post.license');
        $data['id']=intval(I('post.id'));
        $data['status'] = 2;//待审核


        if($this->save($data)){
            $rs['status']=1;
            $rs["message"]="资料提交成功";

        }else{
            $rs['status']=-1;
            $rs["message"]="资料提交失败，请重新提交";
        }
        return $rs;
    }


    public function forgetPassword(){
        $mobile=I('post.phone');
        $code = I('post.verifyCode');
        //验证手机号码格式            
        if(!preg_match("/^1[34578]\d{9}$/", $mobile)){
            $rs['status']=-2;
            $rs["message"]="手机号码格式不正确";
            return $rs;
        }
        //验证手机号码是否已注册
        if(!$this->verifyPhone($mobile)){
            $rs['status']=-2;
            $rs["message"]="该手机号码未注册";
            return $rs;
        }

        if($code!==session('verifyCode')){
            $rs['status']=-1;
            $rs["message"]="验证码错误";
            return $rs;die;
        }else{
              $rs['status']=1;
              $rs["message"]="正常";
              session('verifyCode',null);
              return $rs;  
        }

    }

    /**
     * 重置密码
     * @author zht 2016-10-28
     * @param  [type] $newPass         [description]
     * @param  [type] $confirmPassword [description]
     * @return [type]                  [description]
     */
    public function resetPassword($newPassword,$confirmPassword){
        if(empty($newPassword)){
            $rs['status']=-1;
            $rs["message"]="密码不能为空";
            return $rs;die;
        }
        if(empty($confirmPassword)){
            $rs['status']=-2;
            $rs["message"]="确认密码不能为空";
            return $rs;die;
        }
        if($newPassword!==$confirmPassword){
            $rs['status']=-2;
            $rs["message"]="两次密码不一致";
            return $rs;die;
        }

        $data['password']=md5($newPassword);
        $where['mobile']=session('userphone');
        $info = M('Users')->where($where)->save($data);
        if($info){
            session('userphone',null);
            $rs['status']=1;
            $rs["message"]="密码修改成功";
             return $rs;die; 
        }else{
            
           $rs['status']=-3;
           $rs["message"]="服务器错误，密码修改失败";
           return $rs;die; 
        }
    }



    /**
     * 检测手机号码是否存在
     * @author zht 2016-10-20
     * @param  [type] $phone 电话号码
     * @return bool        存在返回true,不存在返回false
     */
    public function verifyPhone($phone){              
        $m = M("Users")->where(array("mobile"=>$phone))->find();
        if($m){
          return true;  
        }else{
            return false;
        }      
    }

  
    /**
     * 检测用户名是否存在
     * @author zht 2016-10-20
     * @param  [type] $username 用户名
     * @return bool        存在返回true,不存在返回false
     */
    public function verifyUserName($username){
        $m = M("Users")->where(array("user_name"=>$username))->find();
        if($m){
          return true;  
        }else{
            return false;
        } 
    }

    /**
     * 检测单位是否存在
     * @author zht 2016-10-20
     * @param  [type] $press [description]
     * @return [type]        [description]
     */
    private function verifyPress($press){
        $m = M("Users")->where(array("press"=>$press))->find();
        if($m){
            return true;  
        }else{
            return false;
        }
    }


    /**
     *修改用户基本信息
     */
    public function saveUserInfo(){
        $data['nick_name']    = I("nickname");
        $sex = intval(I("sex"));
        
        if($sex==1){
            $data['sex']="男";
        }else if($sex==2){
            $data['sex']="女";
        }else{
            $data['sex']="保密";
        }
        $data['birthday'] = I("birthday");
        $data['province'] = I('provinceid');
        $data['city'] = I('cityid');
        $area = D('Areas');
        $province = $area->getFieldByArea_id($data['province'],'area_name');
        $city = $area->getFieldByArea_id($data['city'],'area_name');
        $data['address'] = $province.' '.$city;
       
        $id     = session("USERS.id");
        $m      = M("Users");
      
        $rs     = array("status"=>-1);
       
        $info = $m->where(array("id"=>$id))->save($data);
        if($info){
            $rs['status']=1;
        }
        return $rs;
        
    }

    /**
     * 修改出版社基本信息
     * @author zht 2016-10-27
     * @return [type] [description]
     */
    public function savePressInfo(){
        
        
        $data['province'] = I('provinceid');
        $data['city'] = I('cityid');
        $area = D('Areas');
        $province = $area->getFieldByArea_id($data['province'],'area_name');
        $city = $area->getFieldByArea_id($data['city'],'area_name');
        $data['address'] = $province.' '.$city;
        $data['area'] = I('area');
        $data['press_intro'] = I('press_intro');
        $data['press_url'] = I('press_url');
        if(I('press_qr')!==""){
            $data['press_url']=I('press_url');
        }
       
        $id     = session("USERS.id");
        $m      = M("Users");
      
        $rs     = array("status"=>-1);
       
        $info  = $m->where(array("id"=>$id))->save($data);
        if($info){
            $rs['status']=1;
        }
        return $rs;
        
    }

    /**
     * 修改头像
     * @author zht 2016-10-13
     * @param  [type] $path 头像路径
     * @return [type]       [description]
     */
    public function saveAvatar($path){
        
        $data['avatar']=$path;
        $data['id']=session("USERS.id");
        return $this->save($data);
    } 


    /*
    修改密码
    */
    public function savePwd($newPass){
        $uid = session("USERS.id");
        return (M('users')->where(array('id'=>$uid))->setField('password',$newPass)) !== false ? true : false;
    }

    /*
    近期收藏
    */
    public function LatelyCollect(){
        $uid     = $_SESSION["USERS"]['id'];
        $pex     = C('DB_PREFIX');
        $collect = M('collect')->where(array('user_id'=>$uid))->order('add_time DESC')->limit(5)->select();
        foreach ($collect as $k => $v) {
            $collect[$k]['goodsInfo'] = M('market_value')->where(array("id"=>$v['article_id']))->field('id,img_url,title,stock_quantity,market_price,sell_price')->find();
        }
        return $collect;
    }

    /**
     * 获取用户组别
     */
    public function getUserGroup(){
        $gid = $_SESSION['USERS']['group_id'];
        return  M('user_groups')->where(array('id'=>$gid))->find();

    }

    /**
     * 保存意见反馈
     * @author zht 2016-10-17
     * @return [type] [description]
     */
    public function saveMessage(){
        $data['user_name'] = I('POST.user_name');
        $data['user_email'] = I('POST.user_email');
        $data['user_tel'] = I('POST.user_tel');
        $data['content'] = I('POST.content');
        $data['add_time'] = date('Y-m-d H:i:s',time());

       
        $res  =array();
        if($data['user_name']=="" || $data['user_email']=="" ||$data['user_tel']=="" || $data['content']==""){
            $res['status']=0;
            $res['msg']="信息不能为空";
            return $res;
        }
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (!preg_match( $pattern, $data['user_email'])) {
            $res['status']=-1;
            $res['msg']="邮箱格式不正确";
            return $res;
        }
        
        $feedback  =D('Feedback');
        
       
        $info = $feedback->add($data);
        
        if($info){
            $res['status']=1;
            $res['msg']="留言成功";
            return $res;
        }else{
            $res['status']=-2;
            $res['msg']="留言失败";
            return $res;
        }

    }


    
}