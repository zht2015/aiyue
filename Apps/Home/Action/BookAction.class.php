<?php
/**
 * User: zht
 * Date: 2016/10/17
 */
namespace Home\Action;
class BookAction extends CommonAction{
	function uploadBook(){
		$this->checkLogin();
		$book = D('Book');
		if(!IS_AJAX){
			/*取得推荐标签信息*/			
			$taginfo = $book->getTag();

			$this->assign('tag',$taginfo);
			$this->display();
		}else{
			$rs = array("status"=>-1);
			$info =$book->saveBook();
			
			if($info){
				$rs['status']=1;				
			}
			$this->ajaxReturn($rs);


		}
		
	}

	public function uploadCover(){
		$this->checkLogin();
	    $upload = $this->_upload('156', '194', 'thumb_', FALSE);
	      
	    if($upload['status']){
	        $path=$upload['savepath'].$upload['savename'];
	        $path=ltrim($path,'.');
	        
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
	            'savename' => $info[0]['savename']
	        );
	    }
	}


	/**
	 * 制作书单-全部书单
	 * @author zht 2016-10-18
	 */
	public function bookList(){
		$this->checkLogin();
		$bookList  = D('Booklist');

		$map['user_id'] = session('USERS.id');
        $map['is_del'] = 0;
		$count = $bookList->where($map)->count();
		$Page  = new \Think\Page($count,15);
		$Page->setConfig('next','>');
		$Page->setConfig('prev','<');
		/*$Page->setConfig('first','首页');
		$Page->setConfig('last','末页');*/
		//$Page->setConfig('theme',"共%TOTAL_ROW%条 共%TOTAL_PAGE%页 %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
		$show = $Page->show();
		$bookListInfo = $bookList ->where($map)->order('c_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		//$bookListInfo = $bookList->getBookList();
		$this->assign('bookListInfo',$bookListInfo);
		$this->assign("show",$show);
		$this->display();
	}

	/**
	 * 制作新书单
	 * @author zht 2016-10-18
	 */
	public function makeBookList(){
		$this->checkLogin();
		if(!IS_AJAX){
			$this->display();
		}else{
			$rs = array("status"=>-1);
			$bookList = D('Booklist');
			$info = $bookList->makeBookList();
			if($info){
				$rs['status']=1;				
			}
			$this->ajaxReturn($rs);
		}
	}

	/**
	 * 个人中心-编辑书单-向书单中添加图书
	 * @author zht 2016-10-26
	 * @param  [type] $id 书单id
	 * @return [type]     [description]
	 */
	public function editSd($id){
		$this->checkLogin();
		//获取到当前书单中的图书id
		$model = D("book_sd_relation");
		$condition['sd_id']=intval($id);
		$count  = $model->where($condition)->count();
		$ids = $model->where($condition)->getField('book_id',true);
		$ids = implode(',',$ids);
		
		$book = D('News_value');
		$bookinfo = $book->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select($ids);
		$Page  = new \Think\Page($count,15);
		$Page->setConfig('next','>');
		$Page->setConfig('prev','<');
		

		
		$show = $Page->show();
		$this->assign('show',$show);
		
		$this->assign('bookinfo',$bookinfo);
		$this->display();
	}


	/**
	 * 个人中心--编辑书单--搜索图书
	 * @author zht 2016-10-27
	 * @return [type] [description]
	 */
	public function searchBookByName(){
		$this->checkLogin();
		$bookname = I('post.bookname');
		$model =  D('News_value');
		$map['book_name']=array('like',"%$bookname%");
		$info = $model->where($map)->field('id,book_name,book_author,book_cover')->select();
		if($info){
			$res['status']=1;
			$res['result']=$info;
		}else{
			$res['status']=-1;
			$res['result']="没有查到相关图书";
		}
		$this->ajaxReturn($res);
	}

	/**
	 * 个人中心--编辑书单--图书详情页
	 * @author zht 2016-10-27
	 * @return [type] [description]
	 */
	public function bookDetail($bookid){
		$this->checkLogin();
		$title = "图书详情";
		$model = D("Book");
		$bookinfo = $model->getBookById($bookid);


		$this->assign('title',$title);
		$this->assign('bookinfo',$bookinfo);
		$this->display();

	}

	public function getBookById($id){
		//$bookid = I('get.id')
		$info =  D('Book')->getBookById($id);
		
		if($info){
			$res['status']=1;
			$res['result']=$info;
		}else{
			$res['status']=-1;
			$res['result']="没有查到相关图书";
		}
		$this->ajaxReturn($res);
	}

	/**
	 * 出版社-上传书单-所有的书单
	 * @author zht 2016-10-24
	 * @return [type] [description]
	 */
	public function press_booklist(){
		$this->checkLogin();
		$bookList  = D('Booklist');

		$map['user_id'] = session('USERS.id');
        $map['is_del'] = 0;
		$count = $bookList->where($map)->count();
		$Page  = new \Think\Page($count,10);
		$Page->setConfig('next','>');
		$Page->setConfig('prev','<');
		
		$show = $Page->show();
		$bookListInfo = $bookList ->where($map)->order('C_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		
		$this->assign('bookListInfo',$bookListInfo);
		$this->assign("show",$show);
		$this->display();
		
	}

	public function recommendBooks(){
		$this->checkLogin();
		$this->display();
	}


	/*上传文件excel*/
    public function uploadFile(){
               $config = array(
		   				'mimes'         =>  array(), //允许上传的文件MiMe类型
		   				'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
		   				'exts'          =>  array('xlsx','xls'), //允许上传的文件后缀
		   				'autoSub'       =>  true, //自动子目录保存文件
		   				'subName'       =>  array(), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		   				'rootPath'      =>  './userupload/uploadexcel/', //保存根路径
		   				'savePath'      =>  '',//保存路径
		   			  
		   		);
		   		$upload = new \Think\Upload($config);// 实例化上传类	   		
		   		$info   =   $upload->upload();
		   		
		   		if(!$info) {		   			 
		   			$this->ajaxReturn(array('status' => 0, 'msg' => $upload->getError())) ;
		   		}else{// 上传成功
		   			
		   			$path = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
                    
		   			$rs=array(
		   				'status'=>1,
		   				'savepath' => $path,
		   				);
		   			$this->ajaxReturn($rs);
		   			
		   		}
    }

	/**
	 * 一键导入书单及图书,只适用于出版社
	 * @author zht 2016-10-24
	 * @return [type] [description]
	 */
	public function importBooklist(){
	    
	    import("Org.Util.PHPExcel");
	    
	    //$filename="./Public/222.xlsx";
	    $filename=I('post.file');
	    
	    $PHPExcel=new \PHPExcel();
	    
	    $fileExtension=substr(strrchr($filename, '.'), 1);
	    
	    if($fileExtension=="xls"){
	    	//如果excel文件后缀名为.xls，导入这个类
	    	import("Org.Util.PHPExcel.Reader.Excel5");
	    	$PHPReader=new \PHPExcel_Reader_Excel5();
	    }elseif($fileExtension=="xlsx"){
	    	//如果excel文件后缀名为.xlsx，导入这下类
	    	import("Org.Util.PHPExcel.Reader.Excel2007");
	    	$PHPReader=new \PHPExcel_Reader_Excel2007();
	    }
	    
	    	    	    
	    $PHPExcel=$PHPReader->load($filename);
	    //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
	    $currentSheet=$PHPExcel->getSheet(0);
	    //获取总列数
	    $allColumn=$currentSheet->getHighestColumn();
	    //获取总行数
	    $allRow=$currentSheet->getHighestRow();
	    //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
	    for($currentRow=1;$currentRow<=$allRow;$currentRow++){
	        //从哪列开始，A表示第一列
	        for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
	            //数据坐标
	            $address=$currentColumn.$currentRow;
	            //读取到的数据，保存到数组$arr中
	            $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
	        }
	    
	    }
	       
        //var_dump($data);die;
        if(I('post.flag')==1){

        	$rs = $this->save_import_book($data);
        	//$this->save_import_book($data);
        }elseif(I('post.flag')==0){
        	$rs = $this->save_import($data);
        }

	     $this->ajaxReturn($rs);   
	}

	/**
	 * 保存导入的书单数据
	 * @author zht 2016-10-24
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function save_import($data){
	        
        $booklist = M('Booklist');
        //$add_time = date('Y-m-d H:i:s', time());
        foreach ($data as $k=>$v){
            if($k >= 2){	               
                $info[$k-2]['user_id'] = session('USERS.id');                
                $info[$k-2]['booklist_name'] = $v['A'];                
                $info[$k-2]['booklist_cover'] = $v['B'];	                
                $info[$k-2]['booklist_tag'] = $v['C'];
                $info[$k-2]['booklist_discription'] = $v['D'];
                $info[$k-2]['recomend'] = $v['E'];
                $info[$k-2]['c_time'] =  date('Y-m-d H:i:s', time());;

                $result = $booklist->add($info[$k-2]);
            }
        }

        if($result){
        	 $rs['status']=1;
        	 return $rs;
        }else{
        	$rs['status']=-1;
        	 return $rs;
        }	      
    }


    /**
     * 保存一键导入的图书
     * @author zht 2016-10-25
     * @return [type] [description]
     */
    public function save_import_book($data){
    	
		$book =D('News_value');
    	//var_dump($result);die;
    	foreach ($data as $k=>$v){
    		
    	    if($k >= 2){	
    	    	$info[$k-2]['channel_id']=M('channel')->getFieldByName('book','id');            
    	        $info[$k-2]['user_id'] = session('USERS.id');                
    	                        
    	        $info[$k-2]['ISBN'] = $v['B'];	                
    	        $info[$k-2]['book_name'] = $v['C'];
    	        $info[$k-2]['book_press'] = $v['D'];
    	        $info[$k-2]['book_author'] = $v['E'];
    	        $info[$k-2]['book_publication_time'] = $v['F'];
    	        $info[$k-2]['price'] = $v['G'];
    	        $info[$k-2]['age'] = $v['H'];
    	        $info[$k-2]['category'] = $v['I'];
    	        $info[$k-2]['book_tag'] = $v['J'];
    	        $info[$k-2]['prize'] = $v['K'];
    	        $info[$k-2]['content_intro'] = $v['L'];
    	        $info[$k-2]['author_intro'] = $v['M'];
    	        $info[$k-2]['book_cover'] = $v['N'];
    	        $info[$k-2]['list_info'] = $v['O'];
    	        $info[$k-2]['book_add_time'] =  date('Y-m-d H:i:s', time());
    	        
    	        $result = D('News_value')->add($info[$k-2]);    
    	        
    	    }
    	    
    	}	 
		    if($result){
		    	$rs['status']=1;
	    	 	return $rs;;
		    }else{
	    		$rs['status']=-1;
	    	 	return $rs;
	    	}  
    }

    /**
     * 导出图书
     * @author zht 2016-10-25
     * @return [type] [description]
     */
    public function export(){
    	$book = M('News_value');

    
    	$chkid=I('post.chkId');
    	$hidid =I('post.hidId');
    	
    	foreach ($chkid as $key => $value) {
    		$ids[]=$hidid[$key];
    	}
    	

    	$ids  = implode(",",$ids);
    	$field =array('ISBN','book_name','book_press','book_author','book_publication_time','price','age','category','book_tag','prize','content_intro','author_intro','book_cover','list_info');
    	$data  = $book->field($field)->select($ids);
    	//var_dump($data);die;
    	
    	//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");
		$headArr=array("ISBN","书名","出版社","著作者","出版时间","价格","年龄阶段","所属类别","标签","所获奖项","内容简介","作者介绍","图片名称","榜单信息");
		$filename="book_excel";
		
		$this->getExcel($filename,$headArr,$data);
	}

	private	function getExcel($fileName,$headArr,$data){
			//对数据进行检验
		    if(empty($data) || !is_array($data)){
		        die("data must be a array");
		    }
		    //检查文件名
		    if(empty($fileName)){
		        exit;
		    }

		    $date = date("Y_m_d",time());
		    $fileName .= "_{$date}.xls";

			//创建PHPExcel对象，注意，不能少了\
		    $objPHPExcel = new \PHPExcel();
		    $objProps = $objPHPExcel->getProperties();
			
		    //设置表头
		    $key = ord("A");
		    foreach($headArr as $v){
		        $colum = chr($key);
		        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
		        $key += 1;
		    }
		    
		    $column = 2;
		    $objActSheet = $objPHPExcel->getActiveSheet();
		    foreach($data as $key => $rows){ //行写入
		        $span = ord("A");
		        foreach($rows as $keyName=>$value){// 列写入
		            $j = chr($span);
		            $objActSheet->setCellValue($j.$column, $value);
		            $span++;
		        }
		        $column++;
	    }

		    $fileName = iconv("utf-8", "gb2312", $fileName);
		    //重命名表
		   	// $objPHPExcel->getActiveSheet()->setTitle('test');
		    //设置活动单指数到第一个表,所以Excel打开这是第一个表
		    $objPHPExcel->setActiveSheetIndex(0);
		    header('Content-Type: application/vnd.ms-excel');
			header("Content-Disposition: attachment;filename=\"$fileName\"");
			header('Cache-Control: max-age=0');

		  	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		    $objWriter->save('php://output'); //文件通过浏览器下载
		    exit;
		}



	/**
	 * 图书列表
	 * @author zht 2016-10-18
	 */
	public function tsList(){
		$book=M('News_value');
		$map['channel_id']=M('channel')->getFieldByName('book','id');
		$count = $book->where($map)->count();
		$Page  = new \Think\Page($count,10);
		$Page->setConfig('next','>');
		$Page->setConfig('prev','<');
		
		$show = $Page->show();
		$bookinfo = $book->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('book',$bookinfo);
		$this->assign("show",$show);
		$this->display();
	}

	/**
	 * 图书详情
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function tsDetail($id){
		$book  = D("Book");
		$bookinfo = $book->getBookById($id);

		$this->assign('bookinfo',$bookinfo);
		$this->display();
	}


	public function sdList(){
		$booklist=M('Booklist');
		
		$count = $booklist->count();
		$Page  = new \Think\Page($count,10);
		$Page->setConfig('next','>');
		$Page->setConfig('prev','<');
		
		$show = $Page->show();
		$booklist = $booklist->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('booklist',$booklist);
		$this->assign("show",$show);
		$this->display();
	}
	
	/**
	 * 读书笔记
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function readingNotes(){
		$this->display();
	}

	
	/**
	 * 做笔记
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function makeNotes(){
		$this->display();
	}

	/**
	 * 阅读记录
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function readingRecord(){
		$this->display();
	}

}