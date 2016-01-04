<?php
class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        echo __FUNCTION__;
    }
    public function index()
    {
        echo __FUNCTION__;
        $this->load->view('admin/index');
    }
}