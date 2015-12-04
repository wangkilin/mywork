<?php

class Wordpress extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPost ($conditions=array())
    {
        $query = $this->db->get('posts');
        $all = $query->result_array();
        $query = $this->db->get_where('posts', array('ID'=>1));
        $one = $query->row_array();

        return array('all'=>$all, 'one'=>$one);
    }
}