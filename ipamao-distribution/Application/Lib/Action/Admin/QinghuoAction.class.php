<?php

class QinghuoAction extends PublicAction {

	function _initialize() {

		parent::_initialize ();

	}

	public function index() {
        import ( 'ORG.Util.Page' );

		$m = M ( "qinghuo_good" );
	
		$count = $m->count (); // 查询满足要求的总记录数
		$Page = new Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数
		$Page -> setConfig('header', '条记录');
        $Page -> setConfig('theme', '<li><a>%totalRow% %header%</a></li> <li>%upPage%</li> <li>%downPage%</li> <li>%first%</li>  <li>%prePage%</li>  <li>%linkPage%</li>  <li>%nextPage%</li> <li>%end%</li> ');//(对thinkphp自带分页的格式进行自定义)
		$show = $Page->show (); // 分页显示输出		

		$result = $m->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();
		$this->assign ( "page", $show ); // 赋值分页输出
        

        $arr = M('qinghuo_cat');
		$info = $arr->select();
		$this->assign('addmenu',$info);

		$this->assign ( "result", $result );
		$this->display ();

	}
	public function addgood(){
      if ($_POST) {

			if (I('id')) {
			   $data ["id"] = $_POST ["id"];       	   
				  $data ["catid"] = $_POST ["catid"];
				$data ["title"] = $_POST ["title"];
				$data ["zdtime"] = $_POST ["zdtime"];
				$data ["miaoshu"] = $_POST ["miaoshu"];
				$data ["headimg"] = $_POST ["headimg"];
				$data ["codeimg"] = $_POST ["codeimg"];
				$data ["headimg"]= str_replace('../../Public/Uploads/','', $data ["headimg"]);
				$data ["codeimg"]= str_replace('../../Public/Uploads/','',$data ["codeimg"]);
				$data ["xianjia"] = $_POST ["xianjia"];
				$data ["yuanjia"] = $_POST ["yuanjia"];

				if ($_FILES ['goodimg'] ['name'] !== '') {

				$img = $this->upload ();

				$picurl = $img [0] [savename];

				$data ["goodimg"] = $picurl;

			    }           
				$arr = M('qinghuo_good');
				$info = $arr->save($data);			

				$this->success ( "成功！" );


			}else{
				$data ["catid"] = $_POST ["catid"];
				$data ["title"] = $_POST ["title"];
				$data ["zdtime"] = $_POST ["zdtime"];
				$data ["miaoshu"] = $_POST ["miaoshu"];
				$data ["headimg"] = $_POST ["headimg"];
				$data ["codeimg"] = $_POST ["codeimg"];
				$data ["headimg"]= str_replace('../../Public/Uploads/','', $data ["headimg"]);
				$data ["codeimg"]= str_replace('../../Public/Uploads/','',$data ["codeimg"]);
				$data ["xianjia"] = $_POST ["xianjia"];
				$data ["yuanjia"] = $_POST ["yuanjia"];

				if ($_FILES ['image'] ['name'] !== '') {

				$img = $this->upload ();

				$picurl = $img [0] [savename];

				$data ["goodimg"] = $picurl;

			   } else {

				$this->error ( "未上传图片！" );

			   }           
				$arr = M('qinghuo_good');
				$info = $arr->add($data);			

				$this->success ( "成功！" );

			}

		}

	}
	public function delgood(){
		$id = I('id');
		$arr = M('qinghuo_good');
		$arr->where('id='.$id)->delete();
		if ($arr) {
		  $this->success("操作成功");
		}else{
		   $this->success("失败");	
		}
	}
	public function cat(){
		$arr = M('qinghuo_cat');
		$info = $arr->select();
		$this->assign('info',$info);
	    $this->display();
		
	}
	public function catadd(){
		$id = I('goodid');
		$arr = M('qinghuo_cat');
		$arr->create();
		if ($_POST && $id>0) {
			
			if ($m = $arr->where('id='.$id)->save()) {
				$this->success("操作成功");
			}else{
				$this->success("操作失败,可能是没有修改任何资料!ERROR>".$m);
				//var_dump($arr->create());
			}
		}else{
		
			if ($m = $arr->add()) {
				$this->success("操作成功");
			}else{
				$this->success("添加失败");
				//var_dump($arr->create());
			}
		}
		
	}
	public function catdel(){
		$id = I('id');
		$arr = M('qinghuo_cat');
		$arr->where('id='.$id)->delete();
		if ($arr) {
		  $this->success("操作成功");
		}else{
		   $this->success("添加失败");	
		}

	}
	public function getcat(){
		$id = I('id');
		$arr = M('qinghuo_cat');
		$result = $arr -> where('id='.$id)->find();
		if ($result) {

			$this->ajaxReturn ( $result );

		}

	}


	public function zdtime(){
		$arr = M('qinghuo_zdtime');
		$info = $arr->select();
		$this->assign('info',$info);
	    $this->display();
		
	}
	public function zdadd(){
		$id = I('goodid');
		$arr = M('qinghuo_zdtime');
		$arr->create();
		if ($_POST && $id>0) {
			
			if ($m = $arr->where('id='.$id)->save()) {
				$this->success("操作成功");
			}else{
				$this->success("操作失败,可能是没有修改任何资料!ERROR>".$m);
				//var_dump($arr->create());
			}
		}else{
		
			if ($m = $arr->add()) {
				$this->success("操作成功");
			}else{
				$this->success("添加失败");
				//var_dump($arr->create());
			}
		}
		
	}
	public function zddel(){
		$id = I('id');
		$arr = M('qinghuo_zdtime');
		$arr->where('id='.$id)->delete();
		if ($arr) {
		  $this->success("操作成功");
		}else{
		   $this->success("添加失败");	
		}

	}
	public function getzdtime(){
		$id = I('id');
		$arr = M('qinghuo_zdtime');
		$result = $arr -> where('id='.$id)->find();
		if ($result) {

			$this->ajaxReturn ( $result );

		}

	}
	public function getgoodid(){
		$id = I('id');
		$arr = M('qinghuo_good');
		$result = $arr -> where('id='.$id)->find();
		if ($result) {

			$this->ajaxReturn ( $result );

		}
	}
	

}