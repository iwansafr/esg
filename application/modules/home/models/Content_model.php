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
			$slug = str_replace('.html', '', $slug);
		}
		$data = $this->db->query('SELECT * FROM content WHERE slug = ? AND publish = 1', $slug)->row_array();
		if(!empty($data))
		{
			$this->zea->set_data('content', $data['id'], array('hits'=>$data['hits']+1));
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
		$this->meta($data);
		$this->esg->set_esg('content', $data);
	}


	public function meta($data = array())
	{
		$c_data = $this->esg->get_esg('meta');
		if(!empty($c_data))
		{
			$data = !empty($data['taxonomy']) ? $data['taxonomy'] : $data;
			foreach ($data as $key => $value) 
			{
				if(!is_array($value))
				{
					$c_data[$key] = $value;
				}
			}
		}
		$this->esg->set_esg('meta', $c_data);
	}

	public function list()
	{
		$module = @$this->esg->get_esg('navigation')['array'][0];
		if($module != 'search')
		{
			$table  = $module == 'category' ? 'content_cat' : 'content_tag';
			$where  = $module == 'category' ? 'WHERE slug = ? AND publish = 1 ' : 'WHERE title = ? ';
			$zea_t  = $module == 'category' ? 'cat_ids' : 'tag_ids';
			$slug   = end($this->esg->get_esg('navigation')['array']);
		}else{
			$zea_t  = 'title';
		}
		$data   = array();
		if(!empty($slug))
		{
			$slug = str_replace('.html', '', $slug);
		}
		if($module != 'search')
		{
			$taxonomy = $this->db->query('SELECT * FROM '.$table.' '.$where, $slug)->row_array();
		}else{
			$taxonomy = TRUE;
		}
		if(!empty($taxonomy))
		{
			$this->zea->init('roll');
			if($module != 'search')
			{
				$id = $taxonomy['id'];
				$this->zea->setWhere("{$zea_t} LIKE '%,{$id},%' AND publish = 1 ");
			}
			$this->zea->setTable('content');
			$this->zea->addInput('id','plaintext');
			$this->zea->addInput('title','plaintext');
			$this->zea->addInput('image','plaintext');
			$this->zea->addInput('intro','plaintext');
			$this->zea->addInput('slug','plaintext');
			$this->zea->addInput('created','plaintext');
			$data = $this->zea->getData();
			$data['taxonomy'] = @$taxonomy;
		}
		$this->meta($data);
		$this->esg->set_esg('content', $data);
	}

}