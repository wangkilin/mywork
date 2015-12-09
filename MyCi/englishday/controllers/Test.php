<?php

class Test extends CI_Controller
{
    public function index ()
    {
        show_404();
        echo __CLASS__ .'::'.__FUNCTION__.' is called';
        $this->load->model('wordpress');
        $result = $this->wordpress->getPost();
        //var_dump($result);
        $this->load->view('test/index', $result);
    }

    public function processNum ()
    {
        var_dump(func_get_args());
        var_dump($GLOBALS['params']);
    }
}