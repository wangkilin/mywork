<?php

class XiaoiAction extends PublicAction {

	function _initialize() {

		parent::_initialize ();

	}

	public function index() {
      $m = M('xiaoi');
	  $arr = $m->find();
	  $this->assign('arr',$arr);
	  $this->display();

	}
	public function edit(){
		$arr = M('xiaoi');
		$info = $arr->find();
		if ($_POST) {
			$arr->create();
			if ($m = $arr->where('id=1')->save()) {
				$this->success("操作成功");
			}else{
				$this->success("操作失败,可能是没有修改任何资料!ERROR>".$m);
				//var_dump($arr->create());
			}
		}else{
			$this->assign('info',$info);
			$this->display();
		}
		
	}
	

}