<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function test($id, $uid)
	{
	    var_dump(func_get_args());
	    var_dump($this->load->get_vars());
	    echo 'id:' . $id . '<br/>';
	    echo 'uid:'.$uid . '<br/>';
		echo 'hello World!';
	}

	public function _remap ($method, $params)
	{
	    var_dump(func_get_args());
	}
}
