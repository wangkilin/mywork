<?php

class Wordpress extends CI_Model
{
	protected $tableName = 'posts';
    public function __construct()
    {
        $this->load->database();
    }

    public function getPost ($conditions=array())
    {
        $query = $this->db->get($this->tableName);
        $all = $query->result_array();
        $query = $this->db->get_where($this->tableName, array('ID'=>1));
        $one = $query->row_array();

        return array('all'=>$all, 'one'=>$one);
    }
}