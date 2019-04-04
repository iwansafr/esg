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
		$this->db->cache_off();
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
			if(!empty($data) && is_array($data))
			{
				foreach ($data as $key => $value) 
				{
					if(!is_array($value))
					{
						$c_data[$key] = $value;
					}
				}
			}
		}
		$this->esg->set_esg('meta', $c_data);
	}

	public function list()
	{
		$module   = @$this->esg->get_esg('navigation')['array'][0];
		$task     = @$this->esg->get_esg('navigation')['array'][1];
		$zea_t    = 'title';
		$taxonomy = TRUE;
		$table    = 'content';
		
		$this->db->cache_off();
		if($module != 'search')
		{
			if($module=='category')
			{
				$table  = 'content_cat';
				$where  = 'WHERE slug = ? AND publish = 1 ';
				$zea_t  = 'cat_ids';
			}else if($module == 'content'){
				if(empty($task))
				{
					$table = 'latest';
				}else if($task == 'popular'){
					$table = 'popular';
				}
				$zea_t = '';
			}else{
				$table  = 'content_tag';
				$where  = 'WHERE title = ? ';
				$zea_t  = 'tag_ids';
			}
			$slug = end($this->esg->get_esg('navigation')['array']);
			$link = @$this->esg->get_esg('navigation')['string'];
			if(!empty($link))
			{
				$tpl = $this->db->query('SELECT tpl FROM menu WHERE link = ?', $link)->row_array();
				if(!empty($tpl))
				{
					$tpl = $tpl['tpl'];
					$this->esg->set_esg('tpl', $tpl);
				}
			}
			if(!empty($slug))
			{
				$slug = str_replace('.html', '', $slug);
			}
			if($table == 'latest')
			{
				$taxonomy = array('title'=>'LATEST CONTENT');
			}else if($table == 'popular'){
				$taxonomy = array('title'=>'MOST POPULAR');
			}else{
				$taxonomy = $this->db->query('SELECT * FROM '.$table.' '.$where, $slug)->row_array();
				$id       = $taxonomy['id'];
			}
		}


		if(!empty($zea_t) && $module != 'search')
		{
			$this->zea->setWhere("{$zea_t} LIKE '%,{$id},%' AND publish = 1 ");
		}else if($table == 'latest'){
			$this->zea->setWhere(" publish = 1 ");
		}else if($table == 'popular'){
			$this->zea->setWhere(" publish = 1 ");
			$this->zea->order_by('hits', 'DESC');
		}
		$data = array();
		if(!empty($taxonomy))
		{
			$this->zea->init('roll');
			$this->zea->setTable('content');
			$this->zea->addInput('id','plaintext');
			$this->zea->addInput('title','plaintext');
			$this->zea->addInput('image','plaintext');
			$this->zea->addInput('icon','plaintext');
			$this->zea->addInput('image_link','plaintext');
			$this->zea->addInput('intro','plaintext');
			$this->zea->addInput('content','plaintext');
			$this->zea->addInput('source','plaintext');
			$this->zea->addInput('description','plaintext');
			$this->zea->addInput('author','plaintext');
			$this->zea->addInput('slug','plaintext');
			$this->zea->addInput('created','plaintext');
			$data = $this->zea->getData();
			$data['taxonomy'] = @$taxonomy;
		}
		$this->meta($data);
		$this->esg->set_esg('content', $data);
	}

}