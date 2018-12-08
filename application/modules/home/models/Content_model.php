<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
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


	public function list()
	{
		$slug = end($this->esg->get_esg('navigation')['array']);
		$data = array();
		if(!empty($slug))
		{
			$slug = preg_replace('~.html~', '', $slug);
		}
		$id = $this->db->query('SELECT id FROM content_cat WHERE slug = ? AND publish = 1', $slug)->row_array();
		if(!empty($id))
		{
			$id = $id['id'];
			$this->zea->init('roll');
			$this->zea->setTable('content');
			$this->zea->setWhere("cat_ids LIKE '%,{$id},%'");
			$this->zea->addInput('id','plaintext');
			$this->zea->addInput('title','plaintext');
			$this->zea->addInput('image','plaintext');
			$this->zea->addInput('intro','plaintext');
			$this->zea->addInput('slug','plaintext');
			$this->zea->addInput('created','plaintext');
			$data = $this->zea->getData();
		}
		$this->esg->set_esg('content', $data);
	}

}