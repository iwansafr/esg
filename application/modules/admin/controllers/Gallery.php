<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('gallery_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->library('zip');
		$this->esg_model->init();
	}
	public function index()
	{
		$data['module'] = $this->gallery_model->get_module();
		$this->load->view('index', $data);
	}

	public function images($module = '')
	{
		$data['module'] = $module;
		$data['images'] = $this->gallery_model->get_images($module);
		$this->load->view('index', $data);
	}

	public function clear_images($module = '')
	{
		$data['module'] = $module;
		$data['images'] = $this->gallery_model->get_images($module);
		$this->load->view('gallery/images', $data);
	}
}