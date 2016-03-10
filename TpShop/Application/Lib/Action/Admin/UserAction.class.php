<?php

class UserAction extends PublicAction {

	function _initialize() {

		parent::_initialize ();

	}

	public function index() {

		import ( 'ORG.Util.Page' );

		$m = M ( "User" );

		

		$count = $m->count (); // 查询满足要求的总记录数

		$Page = new Page ( $count, 12 ); // 实例化分页类 传入总记录数和每页显示的记录数

		$Page -> setConfig('header', '条记录');

        $Page -> setConfig('theme', '<li><a>%totalRow% %header%</a></li> <li>%upPage%</li> <li>%downPage%</li> <li>%first%</li>  <li>%prePage%</li>  <li>%linkPage%</li>  <li>%nextPage%</li> <li>%end%</li> ');//(对thinkphp自带分页的格式进行自定义)

		$show = $Page->show (); // 分页显示输出

		

		$result = $m->limit ( $Page->firstRow . ',' . $Page->listRows )->order('guanliyuan desc,id desc')->select ();

		

		$this->assign ( "result", $result );

		$this->assign ( "page", $show ); // 赋值分页输出

		$this->display ();

	}
	public function del(){

		$result = R ( "Api/Api/deluser", array (

			$_GET ['id'],

			) );

		$this->success ( "操作成功" );

	}
	public function edit(){
		$arr = M('user');
		$id = I('id');
		$info = $arr->where('id='.$id)->find();
		if ($_POST) {
			$arr->create();
			if ($m = $arr->save()) {
				$this->success("操作成功");
			}else{
				$this->success("操作失败,可能是没有修改任何资料!ERROR>".$m);
			}
		}else{
			$this->assign('info',$info);
			$this->display();
		}
		
	}
	public function tixing(){
		if ($_POST) {
			$content = I('content');
			if ($_POST['gid']) {
			    $gid = explode(',', $_POST['gid']);
				foreach ($gid as $key => $value) {
					  R ( "Api/Api/kefu", array("content"=>$content,"uid"=>$value));
				}
				$this->success('all ok');
				exit();
			}
			$uid = I('uid');
		    R ( "Api/Api/kefu", array("content"=>$content,"uid"=>$uid));
		    $this->success('ok');
		}
		
	}
	public function up_vipsave()
    	{
            $data=$this->_post();
            $id = I('id');
            $user = M("user");
        $userdata=$user->where("id=".$id)->find();
       if (!$userdata) {
                exit('未找到用户信息');
            }
              if(empty($userdata["ticket"])) {
           // if ($userdata["member"] != 1) {
                $user_id = $userdata ["id"];
                $member_obj =D('App/Member');
              $result = $member_obj->add_meber($user_id);
                //生成分享图片
                $url = 'http://' . $_SERVER ['SERVER_NAME'] . U('App/Index/get_pic', array('uid' => $user_id));
                $oCurl = curl_init();
                curl_setopt($oCurl, CURLOPT_URL, $url);
                curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($oCurl, CURLOPT_TIMEOUT, 1);
                $sContent = curl_exec($oCurl);
                $aStatus = curl_getinfo($oCurl);
                curl_close($oCurl);

            }
            $data['id']= $id;
            $data['member']=1;
            $data['limit_time']="1707797636";
            $user->save($data);
            $this->success("保存成功",U('Admin/User/index'));
    	}

}