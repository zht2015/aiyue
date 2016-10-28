<?php
namespace MomuAdmin\Action;
class UploadJsonAction extends CommonAction{
    protected $uploadSet;
    public function __construct() {
        parent::__construct();
       // $this->uploadSet = M('upload_set');
    }
    //图片上传
    public function uploadImg() {
        import('ORG.Net.UploadFile');
        import('ORG.Util.Image');
        $config =   array(
            'maxSize'           =>  C("maxSize"),    // 上传文件的最大值
            'supportMulti'      =>  true,    // 是否支持多文件上传
            'allowExts'         =>  explode(",", "gif,jpg,png,bmp"),// 设置附件上传类型
            'thumb'             =>  true,    // 使用对上传图片进行缩略图处理
            'thumbMaxWidth'     =>  C("thumbMaxWidth"),// 缩略图最大宽度
            'thumbMaxHeight'    =>  C("thumbMaxHeight"),// 缩略图最大高度
            'thumbPrefix'       =>  'thumb_',// 缩略图前缀
            'thumbSuffix'       =>  '',
            'thumbPath'         =>  "./upload/".date("Ymd")."/",// 缩略图保存路径
            'thumbFile'         =>  '',// 缩略图文件名
            'thumbExt'          =>  '',// 缩略图扩展名
            'thumbRemoveOrigin' =>  false,// 是否移除原图
            'zipImages'         =>  false,// 压缩图片文件上传
            'autoSub'           =>  false,// 启用子目录保存文件
            'subType'           =>  'date',// 子目录创建方式 可以使用hash date
            'dateFormat'        =>  'Ymd',
            'hashLevel'         =>  1, // hash的目录层次
            'savePath'          =>  "./upload/".date("Ymd")."/",// 上传文件保存路径
            'autoCheck'         =>  true, // 是否自动检查附件
            'uploadReplace'     =>  false,// 存在同名是否覆盖
            'saveRule'          =>  'uniqid',// 上传文件命名规则
            'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
        );
    
        $upload = new \UploadFile($config);// 实例化上传类
        $image = new \Image();
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"status\": 0, \"msg\":\"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            //$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            $imgInfo = $image->getImageInfo($imgPath);
            $thumb = $info[0]['savepath'].'thumb_'.$info[0]['savename'];
            if(C("imageMaxWidth")<$imgInfo['width']||C("imageMaxHeight")<$imgInfo['height']){
                $image->thumb($imgPath,$imgPath,'',C("imageMaxWidth"),C("imageMaxHeight"));
            }
            //$image->thumb($imgPath,$info[0]['savepath'].'bthumb_'.$info[0]['savename'],'',"1024","1024");
            //$image->thumb($imgPath,$info[0]['savepath'].'sthumb_'.$info[0]['savename'],'',"1024","1024");
            if(2 == C("WATERTYPE")){
                    import('ORG.Util.WaterMask');
                    $water = new \WaterMask($imgPath);
                    $water->waterType = 0;//水印类型：0为文字水印、1为图片水印
                    $water->pos = 5;    //水印位置
                    $water->transparent = 5*10;//水印透明度
                    $water->waterStr = C("WATERTXT");//水印文字
                    $water->fontFile = "./Public/Admin/font/Arial.ttf"; //字体名称
                    $water->fontSize = C("WATERSIZE");//字体大小
                    $water->fontColor = array(255,0,255);//水印文字颜色（RGB值）
                    $water->output(); //输出水印图片
                }elseif (3 == C("WATERTYPE")){
                    import('ORG.Util.WaterMask');
                    $water = new \WaterMask($imgPath);
                    $water->waterType = 1;//水印类型：0为文字水印、1为图片水印
                    $water->pos = 9;    //水印位置
                    $water->transparent = 5*10;//水印透明度
                    $water->waterStr = C("WATERTXT");//水印文字
                    $water->fontFile = "./Public/Admin/font/Arial.ttf"; //字体名称
                    $water->fontSize = C("WATERSIZE");//字体大小
                    $water->fontColor = array(255,0,255);//水印文字颜色（RGB值）
                    $water->waterImg = "./Public/Admin/waterImg/watermark.png"; //水印图片
                    $water->output(); //输出水印图片
                }else{}
                //写入登录日志
                
                /* $l = M('manager_log');
                $data['user_id'] = $_SESSION['userID'];
                $data['user_name'] = $_SESSION['userName'];
                $data['action_type'] = "uploadImg";
                $data['remark'] = "上传图片";
                $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
                $data['add_time'] = date('y-m-d h:i:s', time());
                $data['time'] = time();
                $flag = $l->add($data); */
                //if ($flag) {
                    print_r("{\"status\": 1,\"thumb\":\"".substr($thumb, 1)."\", \"path\": \"".substr($imgPath, 1)."\"}");
                //} else {
                //    $this->error('用户日志操作失败，请重试');
                //}
                
        }
    }
    
    //文件上传
    public function uploadFile() {
        import('ORG.Net.UploadFile');
        import('ORG.Util.Image');
        $config =   array(
            'maxSize'           =>  C("maxSize"),    // 上传文件的最大值
            'supportMulti'      =>  true,    // 是否支持多文件上传
            'allowExts'         =>  explode(",", "gif,jpg,png,bmp"),    // 允许上传的文件后缀 留空不作后缀检查
            'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
            'autoSub'           =>  false,// 启用子目录保存文件
            'subType'           =>  'hash',// 子目录创建方式 可以使用hash date
            'dateFormat'        =>  'Ymd',
            'hashLevel'         =>  1, // hash的目录层次
            'savePath'          =>  "./upload/".date("Ymd")."/",// 上传文件保存路径
            'autoCheck'         =>  true, // 是否自动检查附件
            'uploadReplace'     =>  false,// 存在同名是否覆盖
            'saveRule'          =>  'uniqid',// 上传文件命名规则
            'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
        );
    
        $upload = new \UploadFile($config);// 实例化上传类
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"error\": 1, \"msg\": \"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            // 			$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            //写入登录日志
            /*
            $l = M('managerlog');
            $data['user_id'] = $_SESSION['userID'];
            $data['user_name'] = $_SESSION['userName'];
            $data['action_type'] = "uploadFile";
            $data['remark'] = "上传文件";
            $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
            $data['add_time'] = date('y-m-d h:i:s', time());
            $data['time'] = time();
            $flag = $l->add($data);
            */
            //if ($flag) {
                print_r("{\"error\": 0, \"url\": \"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].__ROOT__.substr($imgPath, 1)."\"}");
            //} else {
            //    $this->error('用户日志操作失败，请重试');
            //}
        }
    }
    
    public function uploadFileF() {
        import('ORG.Net.UploadFile');
        $allowExts = explode(',', C("FILEUPEXT"));
        
        $config =   array(
            'maxSize'           =>  C("FILEUPMAX")*1024,    // 上传文件的最大值
            'supportMulti'      =>  true,    // 是否支持多文件上传
            'allowExts'         =>  $allowExts,    // 允许上传的文件后缀 留空不作后缀检查
            'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
            'autoSub'           =>  false,// 启用子目录保存文件
            'subType'           =>  'hash',// 子目录创建方式 可以使用hash date
            'dateFormat'        =>  'Ymd',
            'hashLevel'         =>  1, // hash的目录层次
            'savePath'          =>  "./upload/".date("Ymd")."/",// 上传文件保存路径
            'autoCheck'         =>  true, // 是否自动检查附件
            'uploadReplace'     =>  false,// 存在同名是否覆盖
            'saveRule'          =>  'uniqid',// 上传文件命名规则
            'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
        );
    
        $upload = new \UploadFile($config);// 实例化上传类
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"status\": 0, \"msg\": \"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            // 			$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            //写入登录日志
            /*
            $l = M('managerlog');
            $data['user_id'] = $_SESSION['userID'];
            $data['user_name'] = $_SESSION['userName'];
            $data['action_type'] = "uploadFile";
            $data['remark'] = "上传文件";
            $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
            $data['add_time'] = date('y-m-d h:i:s', time());
            $data['time'] = time();
            $flag = $l->add($data);
            */
            //if ($flag) {
                print_r("{\"status\": 1, \"msg\": \"上传文件成功！\",\"name\": \"".$info[0]['savename']."\",\"path\": \"".substr($imgPath, 1)."\",\"size\":\"".$info[0]['size']."\"}");
            //} else {
            //    $this->error('用户日志操作失败，请重试');
            //}
        }
    }
    
    //视频上传
    public function uploadVideo() {
        import('ORG.Net.UploadFile');
        $where['id'] = array('in',array('1','2','4','6'));
        $setInfo = $this->uploadSet->where($where)->select();
        $allowExts = explode(',', $setInfo[2]['value']);
        if (!file_exists('./'.$setInfo[0]['value'])){
            mkdir('./'.$setInfo[0]['value']);
        }
        $savepath='./'.$setInfo[0]['value'];
        if('1' == $setInfo[1]['value']){
            $savepath = $savepath.'/'.date('Ymd').'/';
        }else{
            if(!file_exists($savepath.'/'.date('Ym'))){
                mkdir($savepath.'/'.date('Ym'));
            }
            $savepath = $savepath.'/'.date('Ym').'/'.date('d').'/';
        }
        if (!file_exists($savepath)){
            mkdir($savepath);
        }
        $config =   array(
            'maxSize'           =>  $setInfo[3]['value']*1024,    // 上传文件的最大值
            'supportMulti'      =>  true,    // 是否支持多文件上传
            'allowExts'         =>  $allowExts,    // 允许上传的文件后缀 留空不作后缀检查
            'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
            'autoSub'           =>  false,// 启用子目录保存文件
            'subType'           =>  'hash',// 子目录创建方式 可以使用hash date
            'dateFormat'        =>  'Ymd',
            'hashLevel'         =>  1, // hash的目录层次
            'savePath'          =>  $savepath,// 上传文件保存路径
            'autoCheck'         =>  true, // 是否自动检查附件
            'uploadReplace'     =>  false,// 存在同名是否覆盖
            'saveRule'          =>  'uniqid',// 上传文件命名规则
            'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
        );
    
        $upload = new \UploadFile($config);// 实例化上传类
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"status\": 0, \"msg\": \"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            // 			$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            //写入登录日志
            $l = M('managerlog');
            $data['user_id'] = $_SESSION['userID'];
            $data['user_name'] = $_SESSION['userName'];
            $data['action_type'] = "uploadVideo";
            $data['remark'] = "上传视频";
            $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
            $data['add_time'] = date('y-m-d h:i:s', time());
            $data['time'] = time();
            $flag = $l->add($data);
            if ($flag) {
                print_r("{\"status\": 1, \"path\": \"".substr($imgPath, 1)."\"}");
            } else {
                $this->error('用户日志操作失败，请重试');
            }
        }
    }
    public function dialog_attach(){
        if(IS_POST){
            
        }else{
            $this->assign('uploadSetValue',$this->uploadSetValue);
            $this->display();
        }
    }
    public function dialog_info(){
        $filePath = $_GET['remotepath'];
        $fileName = substr(strrchr($filePath, "/"), 1);
        $fileExt = substr(strrchr($filePath, "."), 1);
        $file = file_get_contents(__ROOT__.$filePath);
        $fileSize = strlen($file)/1024;
        print_r("{\"status\": 1, \"msg\": \"获取远程文件成功！\", \"name\": \"" .$fileName . "\", \"path\": \"" .$filePath. "\", \"size\": " .$fileSize. ", \"ext\": \"" .$fileExt. "\"}");
    }
}