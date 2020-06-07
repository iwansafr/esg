<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('config_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->library('zip');
		$this->esg_model->init();
	}
	public function index()
	{
		$this->load->view('index');
	}
	
	public function image()
	{
		$this->db->cache_off();
		$data = $this->config_model->save_default_image();
		$this->load->view('index',['data'=>$data]);
	}

	public function dashboard()
	{
		$data['msg'] = $this->config_model->dashboard_save();
		$data['table'] = $this->config_model->get_table();
		$data['dashboard_config'] = $this->esg->get_config('dashboard');
		$this->load->view('index', $data);
	}

	public function custom_dashboard()
	{
		$this->load->view('index');	
	}
	public function clear_custom_dashboard()
	{
		$this->load->view('config/custom_dashboard');	
	}

	public function mail()
	{
		$this->load->view('index');
	}

	public function site()
	{
		$this->load->view('index');
	}
	public function logo()
	{
		$this->load->view('index');
	}
	public function templates()
	{
		$this->load->view('index');
	}
	public function widget()
	{
		$this->load->view('index');
	}
	public function contact()
	{
		$this->load->view('index');
	}
	public function header()
	{
		$this->load->view('index');
	}
	public function footer()
	{
		$this->load->view('index');
	}
	public function style()
	{
		$this->load->view('index');
	}
	public function script()
	{
		$this->load->view('index');
	}
	public function template_list()
	{
		$this->load->helper('string');
		$data = array();
		if(!empty($_FILES) && (is_root() || is_admin()))
		{
			$data['msg'] = $this->config_model->upload($_FILES['template_arch']);
		}
		$i = 0;
		if(is_dir(FCPATH.'images/tmp'))
		{
			recursive_rmdir(FCPATH.'images/tmp/');
		}
		$data['upload_link'] = base_url('admin/config/upload_success');
		foreach(glob(FCPATH.'/application/modules/home/views/templates/*/index.esg') AS $template)
		{
			$template_dir = explode('/', $template);
			array_pop($template_dir);
			$template_name = end($template_dir);
			$template_dir = reduce_double_slashes(implode('/', $template_dir));
			$data['templates'][$i]['link'] = base_url('admin/config/download_template/'.$template_name);
			$data['templates'][$i]['delete_link'] = base_url('admin/config/delete_template/'.$template_name);
			$data['templates'][$i]['title'] = $template_name;
			$i++;
		}
		$this->load->library('parser');
		$this->parser->parse('index', $data);
	}
	public function download_template($title = '')
	{
		$data = array('title'=>$title);
		if(!empty($title) && !is_dir(FCPATH.'images/tmp/'.$title.'/home/'.$title))
		{
			$path = FCPATH.'application/modules/home/views/templates/'.$title;
			$temp_path = FCPATH.'templates/'.$title;
			if(is_dir($path))
			{
				copy_dir($path, FCPATH.'images/tmp/'.$title.'/home/'.$title);
			}
			if(is_dir($temp_path))
			{
				copy_dir($temp_path, FCPATH.'images/tmp/'.$title.'/templates/'.$title);
			}
			$this->zip->read_dir(FCPATH.'images/tmp/'.$title, FALSE);
			$this->zip->archive(FCPATH.'images/tmp/'.$title.'.zip');
			recursive_rmdir(FCPATH.'images/tmp/'.$title);
		}
		$this->load->view('index', $data);
	}
	public function delete_template($title = '')
	{
		if(!empty($title))
		{
			recursive_rmdir(FCPATH.'application/modules/home/views/templates/'.$title);
			recursive_rmdir(FCPATH.'templates/'.$title);
		}
		$this->load->view('index',['title'=>$title]);
	}

	public function subscriber_feed($data = '')
	{
		$output = $this->config_model->subscriber_feed($data);
	}

	public function upload_success()
	{
		if(!empty($_FILES['template_arch']))
		{

		}
	}
	public function delete_cache()
	{
		foreach(glob(FCPATH.'application/cache/*') AS $file)
		{
			if(!preg_match('~.index.html~', $file))
			{
				unlink($file);
			}
		}
		foreach(glob(FCPATH.'images/cache/*') AS $file)
		{
			if(!preg_match('~.index.html~', $file))
			{
				recursive_rmdir($file);
			}
		}
		$this->load->view('index');
	}

	public function testing()
	{
		$this->load->view('index');
	}
}