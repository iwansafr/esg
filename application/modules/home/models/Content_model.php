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
		if(!empty($data))
		{
			$tag_ids = $data['tag_ids'];
			$cat_ids = $data['cat_ids'];
			if(!empty($tag_ids))
			{
				$tag_ids = string_to_array($tag_ids);
				$tag_ids = implode(',',$tag_ids);
				$tag = $this->db->query('SELECT * FROM content_tag WHERE id IN('.$tag_ids.')')->result_array();
				$data['tag'] = $tag;
			}
			if(!empty($cat_ids))
			{
				$cat_ids = string_to_array($cat_ids);
				$cat_ids = implode(',',$cat_ids);
				$cat = $this->db->query('SELECT * FROM content_cat WHERE id IN('.$cat_ids.')')->result_array();
				$data['cat'] = $cat;
			}
		}
		$this->esg->set_esg('content', $data);
	}


	public function list()
	{
		$module = @$this->esg->get_esg('navigation')['array'][0];
		$table  = $module == 'category' ? 'content_cat' : 'content_tag';
		$where  = $module == 'category' ? 'WHERE slug = ? AND publish = 1 ' : 'WHERE title = ? ';
		$zea_t  = $module == 'category' ? 'cat_ids' : 'tag_ids';
		$slug   = end($this->esg->get_esg('navigation')['array']);
		$data   = array();

		if(!empty($slug))
		{
			$slug = preg_replace('~.html~', '', $slug);
		}
		$id = $this->db->query('SELECT id FROM '.$table.' '.$where, $slug)->row_array();
		if(!empty($id))
		{
			$id = $id['id'];
			$this->zea->init('roll');
			$this->zea->setTable('content');
			$this->zea->setWhere("{$zea_t} LIKE '%,{$id},%'");
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