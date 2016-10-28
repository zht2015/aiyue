<?php
namespace Home\Action;
class UploadJsonAction extends CommonAction{
    //图片上传
    public function uploadImg() {
      $configfilejson = "./Apps/MomuAdmin/Conf/config.json";
      $d    = file_get_contents($configfilejson);
      $data = json_decode($d,true);
      
        import('ORG.Net.UploadFile');
        import('ORG.Util.Image');
        // $where['id'] = array('in',array('1','2','3','7','8','9','10','11','12','13','14','15','16','48','52','53'));
        // $setInfo = $this->uploadSet->where($where)->select();
        // $imgAllowExts = explode(',',$data['fileextension']);
        // $thumbMax = explode('x', $setInfo[5]['value']);
        // $imageMax = explode('x', $setInfo[4]['value']);
        // $bthumbMax = explode('x', $setInfo[14]['value']);
        // $sthumbMax = explode('x', $setInfo[15]['value']);
        if (!file_exists('./upload')){
            mkdir('./upload');
        }
        $savepath='./upload';
  
        if (!file_exists($savepath)){
            mkdir($savepath);
        }
        $config =   array(
            'maxSize'           =>  $data['maxSize'],    // 上传文件的最大值
            'supportMulti'      =>  true,    // 是否支持多文件上传
            'allowExts'         =>  $data['FILEUPEXT'],// 设置附件上传类型
            'thumb'             =>  true,    // 使用对上传图片进行缩略图处理
            'thumbMaxWidth'     =>  $data['thumbMaxWidth'],// 缩略图最大宽度
            'thumbMaxHeight'    =>  $data['thumbMaxHeight'],// 缩略图最大高度
            'thumbPrefix'       =>  'thumb_',// 缩略图前缀
            'thumbSuffix'       =>  '',
            'thumbPath'         =>  $savepath,// 缩略图保存路径
            'thumbFile'         =>  '',// 缩略图文件名
            'thumbExt'          =>  '',// 缩略图扩展名
            'thumbRemoveOrigin' =>  false,// 是否移除原图
            'zipImages'         =>  false,// 压缩图片文件上传
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
        $image = new \Image();
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"status\": 0, \"msg\":\"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            // 			$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            $imgInfo = $image->getImageInfo($imgPath);
            $thumb = $info[0]['savepath'].'thumb_'.$info[0]['savename'];
            if($imageMax[0]<$imgInfo['width']||$imageMax[1]<$imgInfo['height']){
                $image->thumb($imgPath,$imgPath,'',$imageMax[0],$imageMax[1]);
            }
            $image->thumb($imgPath,$info[0]['savepath'].'bthumb_'.$info[0]['savename'],'',$bthumbMax[0],$bthumbMax[1]);
            $image->thumb($imgPath,$info[0]['savepath'].'sthumb_'.$info[0]['savename'],'',$sthumbMax[0],$sthumbMax[1]);
            if(2 == $setInfo[6]['value']){
                    import(APP_NAME.".Action.WaterMask");
                    $water = new WaterMask($imgPath);
                    $water->waterType = 0;//水印类型：0为文字水印、1为图片水印
                    $water->pos = $setInfo[7]['value'];    //水印位置
                    $water->transparent = $setInfo[10]['value']*10;//水印透明度
                    $water->waterStr = $setInfo[11]['value'];//水印文字
                    $water->fontFile = "./Public/font/".$setInfo[12]['value'].".ttf"; //字体名称
                    $water->fontSize = $setInfo[13]['value'];//字体大小
                    $water->fontColor = array(255,0,255);//水印文字颜色（RGB值）
                    $water->output(); //输出水印图片
                }elseif (3 == $setInfo[6]['value']){
                    import(APP_NAME.".Action.WaterMask");
                    $water = new WaterMask($imgPath);
                    $water->waterType = 1;//水印类型：0为文字水印、1为图片水印
                    $water->pos = $setInfo[7]['value'];    //水印位置
                    $water->transparent = $setInfo[10]['value']*10;//水印透明度
                    $water->waterStr = $setInfo[11]['value'];//水印文字
                    $water->fontFile = "./Public/font/".$setInfo[12]['value'].".ttf"; //字体名称
                    $water->fontSize = $setInfo[13]['value'];//字体大小
                    $water->fontColor = array(255,0,255);//水印文字颜色（RGB值）
                    $water->waterImg = "./Public/waterImg/".$setInfo[9]['value']; //水印图片
                    $water->output(); //输出水印图片
                }else{}
           
                
        }
    }
    
    //文件上传
    public function uploadFile() {
        import('ORG.Net.UploadFile');
        $where['id'] = array('in',array('1','2','3','5'));
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
            'maxSize'           =>  $data['maxSize'],    // 上传文件的最大值
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
    
        $upload = new UploadFile($config);// 实例化上传类
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"error\": 1, \"msg\": \"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            print_r("{\"error\": 0, \"url\": \"".substr($imgPath, 1)."\"}");
        }
    }
    
    public function uploadFileF() {
        import('ORG.Net.UploadFile');
        $where['id'] = array('in',array('1','2','3','5'));
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
            'maxSize'           =>   $data['maxSize'],    // 上传文件的最大值
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
    
        $upload = new UploadFile($config);// 实例化上传类
        if(!$upload->upload()) {// 上传错误提示错误信息
            $msg = $upload->getErrorMsg();
            print_r("{\"status\": 0, \"msg\": \"".$msg."\"}");
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            // 			$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
            $imgPath = $info[0]['savepath'].$info[0]['savename'];
            print_r("{\"status\": 1, \"msg\": \"上传文件成功！\",\"name\": \"".$info[0]['savename']."\",\"path\": \"".substr($imgPath, 1)."\",\"size\":\"".$info[0]['size']."\"}");
        }
    }
    
    // //视频上传
    // public function uploadVideo() {
    //     import('ORG.Net.UploadFile');
    //     $allowExts = explode(',', $setInfo[2]['value']);
    //     if (!file_exists('./'.$setInfo[0]['value'])){
    //         mkdir('./'.$setInfo[0]['value']);
    //     }
    //     $savepath='./'.$setInfo[0]['value'];
    //     if('1' == $setInfo[1]['value']){
    //         $savepath = $savepath.'/'.date('Ymd').'/';
    //     }else{
    //         if(!file_exists($savepath.'/'.date('Ym'))){
    //             mkdir($savepath.'/'.date('Ym'));
    //         }
    //         $savepath = $savepath.'/'.date('Ym').'/'.date('d').'/';
    //     }
    //     if (!file_exists($savepath)){
    //         mkdir($savepath);
    //     }
    //     $config =   array(
    //         'maxSize'           =>  $setInfo[3]['value']*1024,    // 上传文件的最大值
    //         'supportMulti'      =>  true,    // 是否支持多文件上传
    //         'allowExts'         =>  $allowExts,    // 允许上传的文件后缀 留空不作后缀检查
    //         'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
    //         'autoSub'           =>  false,// 启用子目录保存文件
    //         'subType'           =>  'hash',// 子目录创建方式 可以使用hash date
    //         'dateFormat'        =>  'Ymd',
    //         'hashLevel'         =>  1, // hash的目录层次
    //         'savePath'          =>  $savepath,// 上传文件保存路径
    //         'autoCheck'         =>  true, // 是否自动检查附件
    //         'uploadReplace'     =>  false,// 存在同名是否覆盖
    //         'saveRule'          =>  'uniqid',// 上传文件命名规则
    //         'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
    //     );
    
    //     $upload = new UploadFile($config);// 实例化上传类
    //     if(!$upload->upload()) {// 上传错误提示错误信息
    //         $msg = $upload->getErrorMsg();
    //         print_r("{\"status\": 0, \"msg\": \"".$msg."\"}");
    //     }else{// 上传成功 获取上传文件信息
    //         $info =  $upload->getUploadFileInfo();
    //         // 			$imgPath = substr($info[0]['savepath'].$info[0]['savename'],1);
    //         $imgPath = $info[0]['savepath'].$info[0]['savename'];
    //         //写入登录日志
    //         $l = M('managerlog');
    //         $data['user_id'] = $_SESSION['userID'];
    //         $data['user_name'] = $_SESSION['userName'];
    //         $data['action_type'] = "uploadVideo";
    //         $data['remark'] = "上传视频";
    //         $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
    //         $data['add_time'] = date('y-m-d h:i:s', time());
    //         $data['time'] = time();
    //         $flag = $l->add($data);
    //         if ($flag) {
    //             print_r("{\"status\": 1, \"path\": \"".substr($imgPath, 1)."\"}");
    //         } else {
    //             $this->error('用户日志操作失败，请重试');
    //         }
    //     }
    // }
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