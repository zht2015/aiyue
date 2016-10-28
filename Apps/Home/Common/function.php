<?php 
    /***
     * @time 2016/06/01
     * @biking
     * @function 检测频道和扩展字段是否吻合
     */
     function checkChannelField($channel,$field){
         //获取频道表关联的扩展属性
           $usefields = M("channel_field")->field("field_id")->where(array("channel_id"=>$channel))->select();
           foreach($usefields as $v){
               if($field == $v['field_id']){return "checked";}
           }
            return "";
     }
     
     /***
      * @time 2016/06/02
      * @biking
      * @function 检测编辑器类型是否为简洁型
      */
     function checkEditorType($attributefile){
         $editortype = M("article_attribute_field")->getFieldById($attributefile,"editor_type");
         return $editortype=="0"?"":"checked";
     }
     
     /***
      * @time 2016/06/27
      * @function 检测产品和产品分类是否吻合
      */
     function getChoseCategory($cateid,$id){
         $num = M("art_cat_relation")->where(array("articleid"=>$id,"categoryid"=>$cateid))->find();
         if(count($num)>0){
             return "checked";
         }
     }
     
     /***
      * @time 2016/06/29
      * @function  返回订单的状态
      */
     function showOrderStatus($type){
         $message = "未知";
         switch($type){
             case '1':
                 $message = "已生成";
             break;
             case '2':
                 $message = "已支付";
             break;
             case '3':
                 $message = "已确认";
             break;
             case '4':
                 $message = "已发货";
             break;
             case '5':
                 $message = "已完成";
             break;
             case '6':
                 $message = "已取消";
             break;
             case '7':
                 $message = "已作废";
             break;
         }
         return $message;
     }
     
     /***
      * @time 2016/06/30
      * @function 返回article表id所对应的分类字符串
      */
     function getCategoryName($id){
         $categorystr = "未知";
         if($id == "" || $id== "0"){
            return $categorystr; 
         }
         
         $d = M()->field("title")->table("m_art_cat_relation acr")->join("m_article_category ac on acr.categoryid=ac.id","left")->where(array("acr.articleid"=>$id))->select();
         if(count($d)>0){
            $categorystr = "";
            foreach($d as $v){
                $categorystr .= $v['title'].",";
            }
            return substr($categorystr,0,-1);
         }
         
            return $categorystr;
     }
     
     /***
      * @time 2016/06/30
      * @function 返回用户的状态
      */
     function showUserStatus($status){
         $str = "未知";
         switch($status){
             case '0':
                 $str = "正常";
             break;
             case '1':
                 $str = "待校验";
             break;
             case '2':
                 $str = "待审核";
             break;
             case '3':
                 $str = "锁定";
             break;
         }
         return $str;
     }
     
     /***
      * @time 2016/06/30
      * @function 返回用户的组名称
      */
     function getGroupName($gid){
         $str = M("user_groups")->getFieldById($gid,"title");
         if($str == ""){return "未知";}
         return $str;
     }
     /***
      * @time 2016/07/01
      * @function 返回用户的支付方式名称
      * 
      */
     function getPaymentName($pid){
         $str = M("payment")->getFieldById($pid,"title");
         if($str == ""){return "未知";}
         return $str;
     }
     
     /***
      * @time 2016/07/04
      * @function 显示订单的流程
      */
     function showCurrentStatus($status){
        $str = "";
        $p= '<div class="order-flow-right-wait"><a class="order-flow-input">完成</a><span><p class="name">等待完成</p></span></div>';
        switch($status){    
            case '2':
                $str .= '<div class="order-flow-left"><a class="order-flow-input">确认</a><span><p class="name">等待确认</p></span></div><div class="order-flow-wait"><a class="order-flow-input">发货</a><span><p class="name">等待发货</p></span></div>'.$p;
            break;    
            case '3':
                $str .= '<div class="order-flow-left"><a class="order-flow-input">发货</a><span><p class="name">等待发货</p></span></div>'.$p;
            break;    
            case '4':
                $str .= '<div class="order-flow-right-left"><a class="order-flow-input">完成</a><span><p class="name">等待完成</p></span></div>';
            break;    
        }
        return $str;
     }
     
     

     //判断查询数据是否为空
     function emptyListTemplate($array){
         if(count($array) == 0){
             echo '<div class="emptydata" style="text-align:center;margin: 10px 0;font-size: 15px;">这里空空如也呐~~</div>';
         }
     }
     //返回信息
     function return_json($data){
         echo json_encode($data);
         exit;
     }
     //成功返回
     function success($info='success',$url='',$status='success'){
         $data['info']   = $info;
         $data['url']    = $url;
         $data['status'] = $status;
         echo json_encode($data);
         exit;
     }
     //失败返回
     function fail($info='fail',$status='fail'){
         $data['info']   = $info;
         $data['status'] = $status;
         echo json_encode($data);
         exit;
     }
     /*
      后台导航管理无限极
      */
     function listNav($array = array(),$pid = 0,$data = array(),$lev =0){
         $str = '';
         if(0 != $lev){
             $ii = -24;
             for($i = 0;$i<$lev;$i++){
                 $ii = $ii+24;
             }
             $str .= '<span style="display:inline-block;width:'.$ii.'px;"></span>';
             $str = $str.'<span class="folder-line"></span>';
             $str = $str.'<span class="folder-open"></span>';
         }else{
             $str = '<span class="folder-open"></span>';
         }
         foreach($array as $v){
             if($pid == $v['parent_id']){
                 $util = array();
                 $util['id']          = $v['id'];
                 $util['name']        = $v['name'];
                 $util['parent_id']   = $v['parent_id'];
                 $util['befor']       = $str;
                 $util['title']       = $v['title'];
                 $util['class_layer'] = $v['class_layer'];
                 $util['link_url']    = $v['link_url'];
                 $util['sort_id']     = $v['sort_id'];
                 $util['icon_url']    = $v['icon_url'];
                 $util['is_lock']     = $v['is_lock'];
                 $util['remark']      = $v['remark'];
                 $util['action_type'] = $v['action_type'];
                 $util['is_sys']      = $v['is_sys'];
                 $data[]              = $util;
                 $data                = listNav($array,$v['id'],$data,$lev+1);
             }
         }
         return $data;
     }
     function p_r($str) {
     	return dump($str,1,'<pre>',0);
     }
     
     /*
      随机数生成
      */
     function getRandChar($length){
         $str = null;
         $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
         $max = strlen($strPol)-1;
     
         for($i=0;$i<$length;$i++){
             $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
         }
         return $str;
     }
     /**
 * 字符截取
 * @param $string 需要截取的字符串
 * @param $length 长度
 * @param $dot
 */
function str_cut($sourcestr, $length, $dot = '...') {
    $returnstr = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($sourcestr); //字符串的字节数 
    while (($n < $length) && ($i <= $str_length)) {
        $temp_str = substr($sourcestr, $i, 1);
        $ascnum = Ord($temp_str); //得到字符串中第$i位字符的ascii码 
        if ($ascnum >= 224) {//如果ASCII位高与224，
            $returnstr = $returnstr . substr($sourcestr, $i, 3); //根据UTF-8编码规范，将3个连续的字符计为单个字符         
            $i = $i + 3; //实际Byte计为3
            $n++; //字串长度计1
        } elseif ($ascnum >= 192) { //如果ASCII位高与192，
            $returnstr = $returnstr . substr($sourcestr, $i, 2); //根据UTF-8编码规范，将2个连续的字符计为单个字符 
            $i = $i + 2; //实际Byte计为2
            $n++; //字串长度计1
        } elseif ($ascnum >= 65 && $ascnum <= 90) { //如果是大写字母，
            $returnstr = $returnstr . substr($sourcestr, $i, 1);
            $i = $i + 1; //实际的Byte数仍计1个
            $n++; //但考虑整体美观，大写字母计成一个高位字符
        } else {//其他情况下，包括小写字母和半角标点符号，
            $returnstr = $returnstr . substr($sourcestr, $i, 1);
            $i = $i + 1;            //实际的Byte数计1个
            $n = $n + 0.5;        //小写字母和半角标点等与半个高位字符宽...
        }
    }
    if ($str_length > strlen($returnstr)) {
        $returnstr = $returnstr . $dot; //超过长度时在尾处加上省略号
    }
    return $returnstr;
}    
?>