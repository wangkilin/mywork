<?php
class Welcome extends Controller
{
	public function ready ()
	{
		echo 'Class is ready!';
	}

	public function testAction ()
	{
		echo 'Test action is called!';
		$this->display();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
