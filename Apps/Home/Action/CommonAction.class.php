<?php
/**
 * aiyue公共模块
 * User: zht
 * Date: 2016/10/13
 * Time: 9:54
 */
namespace Home\Action;
use Think\Controller;
class CommonAction extends Controller{
    public function __construct(){
        parent::__construct();
        /**获取用户信息**/
        /*$userInfo = D("Home/Users");
        $user=$userInfo->userInfo();
        $this->assign("user",$user);*/

        
        if(empty(session("USERS"))){
            if(!empty($_COOKIE['username']) && !empty($_COOKIE['password'])){  
                $map['user_name']=$_COOKIE['username'];
                $map['password']=$_COOKIE['password'];
                $user = D('Users')->where($map)->find();
                if(!empty($user)){                   
                    $_SESSION['USERS'] = $user;   //用户名和密码对了，把用户的个人资料放到session里面
                    $this->assign("user",$user); 
                }  
            }
        }else{
            $userInfo = D("Home/Users");
            $user=$userInfo->userInfo();
            $this->assign("user",$user);
            //$this->assign("user",session("USERS"));
        }
        
 
    }


    /**验证码**/
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->length=4;
        $Verify->imageH="38px";
        $Verify->imageW="85px";
        $Verify->fontSize="13px";
        $Verify->useNoise=false;
        $Verify->entry();
    }

    /**
     * 验证码检测
     * 检测输入的验证码是否正确，$code为用户输入的验证码字符串
     **/
    function checkVerify($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }

    /**
     *检测用户是否登录
     */
    public function checkLogin(){
        $user = session("USERS");
        /*if(empty($user)){
            $this->redirect("Users/userLogin");
        }*/
        if(empty($user)){
            if(empty($_COOKIE['username']) || empty($_COOKIE['password'])){  
                $this->redirect("Users/userLogin"); 
            }else{
                $map['user_name']=$_COOKIE['username'];
                $map['password']=$_COOKIE['password'];
                $user = D('Users')->where($map)->find();
                if(empty($user)){    //用户名密码不对没取到信息，转到登录页面 
                    $this->redirect("Users/userLogin"); 
                }else{ 
                    $_SESSION['USERS'] = $user;   //用户名和密码对了，把用户的个人资料放到session里面 
                }  
            }         
        }
    }



}