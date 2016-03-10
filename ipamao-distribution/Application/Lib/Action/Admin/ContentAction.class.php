<?php

class ContentAction extends PublicAction {

	function _initialize() {

		parent::_initialize ();

	}

	public function index() {

		import ( 'ORG.Util.Page' );

		$m = M ( "Content" );

		

		$count = $m->count (); // 查询满足要求的总记录数

		$Page = new Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数

		$Page -> setConfig('header', '条记录');

        $Page -> setConfig('theme', '<li><a>%totalRow% %header%</a></li> <li>%upPage%</li> <li>%downPage%</li> <li>%first%</li>  <li>%prePage%</li>  <li>%linkPage%</li>  <li>%nextPage%</li> <li>%end%</li> ');//(对thinkphp自带分页的格式进行自定义)

		$show = $Page->show (); // 分页显示输出

		

		$result = $m->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();

		$this->assign ( "page", $show ); // 赋值分页输出

		$this->assign ( "result", $result );


		$this->display ();

	}

	public function add() {
		if ($_POST) {

			if ($_POST ["goodid"]) {       	   
				$data ["id"] = $_POST ["goodid"];
				$data ["vip"] = $_POST ["vip"];
				$data ["title"] = $_POST ["title"];
				$data ["content"] = $_POST ["editorValue"]; 
				if ($_FILES ['image'] ['name'] !== '') {

				$img = $this->upload ();

				$picurl = $img [0] [savename];

				$data ["image"] = $picurl;

			   }          
				$arr = M('Content');
				$info = $arr->save($data);			

				$this->success ( "成功！" );


			}else{
				$data ["vip"] = $_POST ["vip"];
				$data ["title"] = $_POST ["title"];
				$data ["content"] = $_POST ["editorValue"];
				if ($_FILES ['image'] ['name'] !== '') {

				$img = $this->upload ();

				$picurl = $img [0] [savename];

				$data ["image"] = $picurl;

			   } else {

				$this->error ( "未上传图片！" );

			   }           
				$arr = M('Content');
				$info = $arr->add($data);			

				$this->success ( "成功！" );

			}

		}

	}
	

	public function del() {
		$data ["id"] = I('id');;
		 $arr = M('Content');
		 $arr->where($data)->delete(); 
		$this->success ( "成功！" );

	}

	public function get() {

		$id = $_POST ["id"];

		$result = M ( "Content" )->where ( array (

				"id" => $id 

		) )->find ();

		if ($result) {

			$this->ajaxReturn ( $result );

		}

	}

	
}