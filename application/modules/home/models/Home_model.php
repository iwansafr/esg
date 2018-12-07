<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		// $this->esg_model->set_meta();
		$this->init();
	}
	public function init()
	{
		$this->esg_model->navigation();
		$this->esg_model->set_meta();
		$this->logo();
		$this->site();
		$this->meta();
		$this->template();
		// $this->home();
		// $this->js();
	}

	public function template()
	{
		$data = $this->esg->get_config('templates');
		if(!empty($data))
		{
			$this->esg->set_esg('templates', $data);
		}
	}

	public function js()
	{
		$this->esg->set_esg('extra_js',base_url('templates/'.$this->templates['public_template'].'/assets/dist/js/script.js'));
	}

	public function meta()
	{
		$data = $this->esg->get_config('contact');
		$c_data = $this->esg->get_esg('meta');
		if(!empty($data))
		{
			$c_data['contact'] = $data;
			$this->esg->set_esg('meta', $c_data);
		}
	}

	public function home()
	{
		$widget = $this->esg->get_config($this->esg->get_esg('templates')['public_template'].'_widget');
		$this->esg->set_esg('block', $widget);
		$this->block();
	}

	public function block()
	{
		$block = $this->esg->get_esg('block');
		if(!empty($block))
		{
			foreach ($block as $key => $value)
			{
				if(is_array($value))
				{
					if(preg_match('~menu_~', $key))
					{
						$this->menu($key, $value);
					}else if(preg_match('~content~', $key))
					{
						$this->content($key, $value);
					}else{
						$this->custom($key, $value);
					}
				}
			}
		}
	}

	public function menu($key = '', $data = array())
	{
		if(!empty($data['content']))
		{
			$tmp_data = $this->db->query('SELECT * FROM menu WHERE position_id = ? AND publish = 1', @intval($data['content']))->result_array();
			if(!empty($tmp_data))
			{
				$output = array();
				$data = array();
				foreach ($tmp_data as $tkey => $tvalue)
				{
					if($tvalue['par_id'] == 0)
					{
						$data[$tvalue['id']] = $tvalue;
					}else if($tvalue['par_id'] > 0)
					{
						$data[$tvalue['par_id']]['child'][$tvalue['id']]  = $tvalue;
					}
				}
				$output[$key] = $data;
				$home = $this->esg->get_esg('home');
				if(!empty($home))
				{
					$home = array_merge($home, $output);
				}else{
					$home = $output;
				}
				$this->esg->set_esg('home', $home);
			}
		}
	}

	public function content($key = '', $data = array())
	{
		if(!empty($data['content']))
		{
			$id = $data['content'];
			$limit = 'LIMIT '.@intval($data['limit']);
			$q = "SELECT * FROM content WHERE cat_ids LIKE '%,{$id},%' AND publish = 1 ORDER BY id DESC {$limit}";
			if(!is_numeric($id))
			{
				$q = 'SELECT * FROM content WHERE publish = 1 ORDER BY id DESC '.$limit;
			}
			$tmp_data = $this->db->query($q)->result_array();
			if(!empty($tmp_data))
			{
				if(is_numeric($id))
				{
					$cat_title = $this->db->query('SELECT title FROM content_cat WHERE id = '.$id)->row_array();
				}else{
					$cat_title['title'] = 'LATEST';
				}
				$output = array();
				$tmp_data[0]['cat_title'] = $cat_title['title'];
				$output[$key] = $tmp_data;
				$home = $this->esg->get_esg('home');
				if(!empty($home))
				{
					$home = array_merge($home, $output);
				}else{
					$home = $output;
				}
				$this->esg->set_esg('home', $home);
			}
		}
	}

	public function custom($key = '', $data = array())
	{
		if(!empty($data['content']))
		{
			$id    = $data['content'];
			$limit = 'LIMIT '.@intval($data['limit']);
			$table = array('content_cat','content_tag','content','content');
			$table = array_start_one($table);
			$table = $table[$id];

			$tmp_data = $this->db->query('SELECT * FROM '.$table.' ORDER BY id DESC '.$limit)->result_array();
			if(!empty($tmp_data))
			{
				$output = array();
				$output[$key] = $tmp_data;
				$home = $this->esg->get_esg('home');
				if(!empty($home))
				{
					$home = array_merge($home, $output);
				}else{
					$home = $output;
				}
				$this->esg->set_esg('home', $home);
			}
		}
	}

	public function logo()
	{
		$data = $this->esg->get_config('logo');
		if(!empty($data))
		{
			$this->esg->set_esg('logo', $data);
		}
	}

	public function site()
	{
		$data = $this->esg->get_config('site');
		if(!empty($data))
		{
			$this->esg->set_esg('site', $data);
		}
	}
}