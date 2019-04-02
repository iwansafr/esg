<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->library('zip');
		$this->esg_model->init();
	}
	public function index()
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
		$i = 0;
		if(is_dir(FCPATH.'images/tmp'))
		{
			recursive_rmdir(FCPATH.'images/tmp/');
		}
		foreach(glob(FCPATH.'/application/modules/home/views/templates/*/index.esg') AS $template)
		{
			$template_dir = explode('/', $template);
			array_pop($template_dir);
			$template_name = end($template_dir);
			$template_dir = reduce_double_slashes(implode('/', $template_dir));
			$data['templates'][$i]['link'] = base_url('admin/config/download_template/'.$template_name);
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
}