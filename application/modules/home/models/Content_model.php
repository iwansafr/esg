<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
	}
	
	public function detail()
	{
		$slug = end($this->esg->get_esg('navigation')['array']);
		if(!empty($slug))
		{
			$slug = preg_replace('~.html~', '', $slug);
		}
		$data = $this->db->query('SELECT * FROM content WHERE slug = ? AND publish = 1', $slug)->row_array();
		$this->esg->set_esg('content', $data);
	}


}