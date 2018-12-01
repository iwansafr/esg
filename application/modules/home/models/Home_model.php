<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		$this->esg_model->set_meta();
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
		$this->home();
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
			foreach ($data as $key => $value) 
			{
				if(!empty($c_data[$key]))
				{
					$c_data[$key] = $value;
				}
			}
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
					}else if(preg_match('~content_~', $key))
					{
						$this->content($key, $value);
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
				$data = array();
				foreach ($tmp_data as $key => $value) 
				{
					if($value['par_id'] == 0)
					{
						$data[$value['id']] = $value;
					}else if($value['par_id'] > 0)
					{
						$data[$value['par_id']]['child'][$value['id']]  = $value;
					}
				}
				$this->esg->set_esg('')
			}
		}
	}

	public function content($key = '', $data = array())
	{
		// pr($data);
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