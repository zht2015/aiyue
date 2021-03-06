<?php
namespace MomuAdmin\Action;
class IndexAction extends CommonAction {

    //登陆展示及操作方法
    public function index() {
        $msg = "请输入用户名和密码";
        $m = M('manager');
        if (!IS_POST) {
            $this->assign('msg', $msg);
            $this->display();
        } else {
            $username = $_POST['txtUserName'];
            $userpwd = md5($_POST['txtPassword']);
            if (empty($username) || empty($userpwd)) {//为空直接返回
                $this->assign('msg', $msg);
                $this->display();
            } else {
                $username = $_POST['txtUserName'];
                $userpwd = $_POST['txtPassword'];
                $where['user_name'] = $username;
                $where['password'] = md5(trim($userpwd));
                $i = $m->where($where)->count();
                $arr = $m->where($where)->select();
                if ($i > 0) {
                    if(0 == $arr[0]['is_lock']){
                        $this->error('此用户已禁用！');
                    }
                    $userid = $arr[0]['id'];
                    session('userID', $userid);
                    session('userName', $username);
                    $map['role_id'] = $arr[0]['role_id'];
                    $userRole = M('manager_role_value')->where($map)->select();
                   session("userRole", $userRole);
                    //写入登录日志
                   /* $l = M('managerlog');
                    $data['user_id'] = $userid;
                    $data['user_name'] = $username;
                    $data['action_type'] = "Login";
                    $data['remark'] = "用户登录";
                    $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
                    $data['add_time'] = date('y-m-d h:i:s', time());
                    $data['time'] = time();
                    $flag = $l->add($data);*/


                        $this->redirect('Index/LoginIndex');

                } else {

                    $this->error('用户名或密码错误');
                }
            }
        }
    }
    
    /***
     * @time 2016/08/10
     * @function 没有操作权限
     */
    public function haveNoPrivileges(){
        $this->display();
    }

    //用户中心页面
    public function LoginIndex() {
        if (!IS_POST) {

            $userInfo = D('Manager')->where(array("id" => $_SESSION['userID']))->find();
            $this->assign("userInfo", $userInfo);
            $this->display();
        } else {
            $event = $_POST['__EVENTTARGET'];
            if ("lbtnExit" == $event) {
                unset($_SESSION['userID']);
                unset($_SESSION['userRole']);
                $this->redirect("Index/index");
            }
        }
    }

    //用户中心框架页面
    public function center() {
        //$this->Getnum();
        //$this->assign('uploadSetValue', $this->uploadSetValue);
        $this->display();
    }

    private function Getnum() {
        $orders = M("orders");
        $Demo = M('article');
        //获取代发货订单数
        $DFHCount = $orders->where('express_status=1')->count();
        //待支付订单
        $DZFCount = $orders->where('payment_status=1')->count();
        //已完成订单
        $YWCCount = $orders->where('status=3')->count();
        //已确认订单
        $YQRCount = $orders->where('status=2')->count();
        //产品总数
        $SPZSConut =  $Demo->where('channel_id=7')->count();
        //库存预警商品数
        $score = M('upload_set')->where('id=50')->getField('value'); //商品预警值

        $pronum = $Demo->where("channel_id=7")->join('RIGHT JOIN t_articleattributevalue ON t_article.id = t_articleattributevalue.article_id')->select(); //获得所有商品及剩余数
        $j = 0;
        for ($i = 0; $i < count($pronum); $i++) {
            if ($pronum[$i]['stock_quantity'] < $score) {
                ++$j;
            }
        }
        //首页产品数
        $indexnum = $Demo->where("channel_id=7 and is_top=1")->count();
        //推荐产品数
        $topnum = $Demo->where("channel_id=7 and is_red=1")->count();
        //兑换产品数
        $dhcConut = M('article')->where('channel_id=12')->count();
        //库存预警
        $pronum1 = $Demo->where("channel_id=12")->join('RIGHT JOIN t_articleattributevalue ON t_article.id = t_articleattributevalue.article_id')->select(); //获得所有商品及剩余数
        $p = 0;
        for ($i = 0; $i < count($pronum1); $i++) {
            if ($pronum1[$i]['stock_quantity'] < $score) {
                ++$p;
            }
        }
        //会员数
        $usercont=M('users')->count();
        //待审核会员
        $daiuser=M('users')->where('status=2')->count();
        $arr = array("dfh" => $DFHCount, 'dzf' => $DZFCount, 'ywc' => $YWCCount, 'yqr' => $YQRCount, 'cps' => $SPZSConut, 'yjs' => $j, 'syc' => $indexnum, 'tjs' => $topnum, 'dhc' => $dhcConut, 'dhyj' => $p,'hys'=>$usercont,'dhy'=>$daiuser);
        $this->assign("statenum", $arr);
    }

}
