<?php

class HdpAction extends PublicAction {

	function _initialize() {

		parent::_initialize ();

	}

	public function index() {

		import ( 'ORG.Util.Page' );

		$m = M ( "Hdp" );

		

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

	public function addgood() {

		$m = M ( "Hdp" );

		if ($_POST["goodid"]) {

			$data ["id"] = $_POST["goodid"];

			$data ["title"] = $_POST ["title"];

			$data ["url"] = $_POST ["url"];

			

			if ($_FILES ['addimage'] ['name'] !== '') {

				$img = $this->upload ();

				$picurl = $img [0] [savename];

				$data ["img"] = $picurl;

			}

			
			$arr = $m->save($data);
            if ($arr) {
            	$this->success ( "成功！" );
            }else{
            	$this->success ( "失败！" );
            }

		}else{

	

			$data ["title"] = $_POST ["title"];

			$data ["url"] = $_POST ["url"];

			if ($_FILES ['addimage'] ['name'] !== '') {

				$img = $this->upload ();

				$picurl = $img [0] [savename];

				$data ["img"] = $picurl;

			} else {

				$this->error ( "未上传图片！" );

			}
            

            $arr=$m->add($data);
            if ($arr) {
            	$this->success ( "添加商品成功！" );
            }else{
            	$this->success ( "添加商品失败！" );
            }
			

			

			

		}

	}

	public function delgood() {
		
		$m = M('Hdp');
		$arr = $m->where('id='.$_GET ["id"])->delete();

		$this->success ( "删除商品成功！" );

	}

	public function getgoodid() {

		$id = $_POST ["id"];

		$result = M ( "Hdp" )->where ( array (

				"id" => $id 

		) )->find ();

		if ($result) {

			$this->ajaxReturn ( $result );

		}

	}

	

	

	

}