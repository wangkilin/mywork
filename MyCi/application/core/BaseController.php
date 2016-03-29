<?php
/********************************************************/
/*****                 @!!@                          ****/
/********************************************************/
/**
 *@FileName    : BaseController.php
 *@Author      : Kilin WANG <wangkilin@126.com>
 *@Date        : 2016年3月29日
 *@Homepage    : http://www.kinful.com
 *@Version     : 0.1
 */
class BaseController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	protected function _init ()
	{

		return;
	}
}