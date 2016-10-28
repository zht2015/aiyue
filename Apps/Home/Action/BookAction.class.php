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
			/*ȡ���Ƽ���ǩ��Ϣ*/			
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
	* ͼƬ�ϴ�����
	* $isthum�Ƿ��Ƴ�ԭͼ
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
	        'maxSize' =>200000000, // �ϴ��ļ������ֵ
	        'supportMulti' => true, // �Ƿ�֧�ֶ��ļ��ϴ�
	        'allowExts' => $imgAllowExts, // ���ø����ϴ�����
	        'thumb' => true, // ʹ�ö��ϴ�ͼƬ��������ͼ����
	        'thumbMaxWidth' => $width, // ����ͼ�����
	        'thumbMaxHeight' => $height, // ����ͼ���߶�
	        'thumbPrefix' => $th, // ����ͼǰ׺
	        'thumbSuffix' => '',
	        'thumbPath' => $savepath, // ����ͼ����·��
	        'thumbFile' => '', // ����ͼ�ļ���
	        'thumbExt' => '', // ����ͼ��չ��
	        'thumbRemoveOrigin' => $isthum, // �Ƿ��Ƴ�ԭͼ
	        'zipImages' => false, // ѹ��ͼƬ�ļ��ϴ�
	        'autoSub' => false, // ������Ŀ¼�����ļ�
	        'subType' => 'hash', // ��Ŀ¼������ʽ ����ʹ��hash date
	        'dateFormat' => 'Ymd',
	        'hashLevel' => 1, // hash��Ŀ¼���
	        'savePath' => $savepath, // �ϴ��ļ�����·��
	        'autoCheck' => true, // �Ƿ��Զ���鸽��
	        'uploadReplace' => false, // ����ͬ���Ƿ񸲸�
	        'saveRule' => 'uniqid', // �ϴ��ļ���������
	        'hashType' => 'md5_file', // �ϴ��ļ�Hash��������
	    );
	    $upload = new \UploadFile($config); // ʵ�����ϴ���
	    if (!$upload->upload()) {// �ϴ�������ʾ������Ϣ
	        return array('status' => 0, 'msg' => $upload->getErrorMsg());
	    } else {// �ϴ��ɹ� ��ȡ�ϴ��ļ���Ϣ
	        $info = $upload->getUploadFileInfo();

	        return array(
	            'status' => 1,
	            'savepath' => $info[0]['savepath'],
	            'savename' => $info[0]['savename']
	        );
	    }
	}


	/**
	 * �����鵥-ȫ���鵥
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
		/*$Page->setConfig('first','��ҳ');
		$Page->setConfig('last','ĩҳ');*/
		//$Page->setConfig('theme',"��%TOTAL_ROW%�� ��%TOTAL_PAGE%ҳ %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
		$show = $Page->show();
		$bookListInfo = $bookList ->where($map)->order('c_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		//$bookListInfo = $bookList->getBookList();
		$this->assign('bookListInfo',$bookListInfo);
		$this->assign("show",$show);
		$this->display();
	}

	/**
	 * �������鵥
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
	 * ��������-�༭�鵥-���鵥�����ͼ��
	 * @author zht 2016-10-26
	 * @param  [type] $id �鵥id
	 * @return [type]     [description]
	 */
	public function editSd($id){
		$this->checkLogin();
		//��ȡ����ǰ�鵥�е�ͼ��id
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
	 * ��������--�༭�鵥--����ͼ��
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
			$res['result']="û�в鵽���ͼ��";
		}
		$this->ajaxReturn($res);
	}

	/**
	 * ��������--�༭�鵥--ͼ������ҳ
	 * @author zht 2016-10-27
	 * @return [type] [description]
	 */
	public function bookDetail($bookid){
		$this->checkLogin();
		$title = "ͼ������";
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
			$res['result']="û�в鵽���ͼ��";
		}
		$this->ajaxReturn($res);
	}

	/**
	 * ������-�ϴ��鵥-���е��鵥
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


	/*�ϴ��ļ�excel*/
    public function uploadFile(){
               $config = array(
		   				'mimes'         =>  array(), //�����ϴ����ļ�MiMe����
		   				'maxSize'       =>  0, //�ϴ����ļ���С���� (0-��������)
		   				'exts'          =>  array('xlsx','xls'), //�����ϴ����ļ���׺
		   				'autoSub'       =>  true, //�Զ���Ŀ¼�����ļ�
		   				'subName'       =>  array(), //��Ŀ¼������ʽ��[0]-��������[1]-�������������ʹ������
		   				'rootPath'      =>  './userupload/uploadexcel/', //�����·��
		   				'savePath'      =>  '',//����·��
		   			  
		   		);
		   		$upload = new \Think\Upload($config);// ʵ�����ϴ���	   		
		   		$info   =   $upload->upload();
		   		
		   		if(!$info) {		   			 
		   			$this->ajaxReturn(array('status' => 0, 'msg' => $upload->getError())) ;
		   		}else{// �ϴ��ɹ�
		   			
		   			$path = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
                    
		   			$rs=array(
		   				'status'=>1,
		   				'savepath' => $path,
		   				);
		   			$this->ajaxReturn($rs);
		   			
		   		}
    }

	/**
	 * һ�������鵥��ͼ��,ֻ�����ڳ�����
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
	    	//���excel�ļ���׺��Ϊ.xls�����������
	    	import("Org.Util.PHPExcel.Reader.Excel5");
	    	$PHPReader=new \PHPExcel_Reader_Excel5();
	    }elseif($fileExtension=="xlsx"){
	    	//���excel�ļ���׺��Ϊ.xlsx������������
	    	import("Org.Util.PHPExcel.Reader.Excel2007");
	    	$PHPReader=new \PHPExcel_Reader_Excel2007();
	    }
	    
	    	    	    
	    $PHPExcel=$PHPReader->load($filename);
	    //��ȡ���еĵ�һ�����������Ҫ��ȡ�ڶ�������0��Ϊ1����������
	    $currentSheet=$PHPExcel->getSheet(0);
	    //��ȡ������
	    $allColumn=$currentSheet->getHighestColumn();
	    //��ȡ������
	    $allRow=$currentSheet->getHighestRow();
	    //ѭ����ȡ���е����ݣ�$currentRow��ʾ��ǰ�У������п�ʼ��ȡ���ݣ�����ֵ��0��ʼ
	    for($currentRow=1;$currentRow<=$allRow;$currentRow++){
	        //�����п�ʼ��A��ʾ��һ��
	        for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
	            //��������
	            $address=$currentColumn.$currentRow;
	            //��ȡ�������ݣ����浽����$arr��
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
	 * ���浼����鵥����
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
     * ����һ�������ͼ��
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
     * ����ͼ��
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
    	
    	//����PHPExcel��⣬��ΪPHPExcelû���������ռ䣬ֻ��inport����
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");
		$headArr=array("ISBN","����","������","������","����ʱ��","�۸�","����׶�","�������","��ǩ","������","���ݼ��","���߽���","ͼƬ����","����Ϣ");
		$filename="book_excel";
		
		$this->getExcel($filename,$headArr,$data);
	}

	private	function getExcel($fileName,$headArr,$data){
			//�����ݽ��м���
		    if(empty($data) || !is_array($data)){
		        die("data must be a array");
		    }
		    //����ļ���
		    if(empty($fileName)){
		        exit;
		    }

		    $date = date("Y_m_d",time());
		    $fileName .= "_{$date}.xls";

			//����PHPExcel����ע�⣬��������\
		    $objPHPExcel = new \PHPExcel();
		    $objProps = $objPHPExcel->getProperties();
			
		    //���ñ�ͷ
		    $key = ord("A");
		    foreach($headArr as $v){
		        $colum = chr($key);
		        $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
		        $key += 1;
		    }
		    
		    $column = 2;
		    $objActSheet = $objPHPExcel->getActiveSheet();
		    foreach($data as $key => $rows){ //��д��
		        $span = ord("A");
		        foreach($rows as $keyName=>$value){// ��д��
		            $j = chr($span);
		            $objActSheet->setCellValue($j.$column, $value);
		            $span++;
		        }
		        $column++;
	    }

		    $fileName = iconv("utf-8", "gb2312", $fileName);
		    //��������
		   	// $objPHPExcel->getActiveSheet()->setTitle('test');
		    //���û��ָ������һ����,����Excel�����ǵ�һ����
		    $objPHPExcel->setActiveSheetIndex(0);
		    header('Content-Type: application/vnd.ms-excel');
			header("Content-Disposition: attachment;filename=\"$fileName\"");
			header('Cache-Control: max-age=0');

		  	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		    $objWriter->save('php://output'); //�ļ�ͨ�����������
		    exit;
		}



	/**
	 * ͼ���б�
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
	 * ͼ������
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
	 * ����ʼ�
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function readingNotes(){
		$this->display();
	}

	
	/**
	 * ���ʼ�
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function makeNotes(){
		$this->display();
	}

	/**
	 * �Ķ���¼
	 * @author zht 2016-10-19
	 * @return [type] [description]
	 */
	public function readingRecord(){
		$this->display();
	}

}