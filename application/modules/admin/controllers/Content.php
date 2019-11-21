<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('content_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function list()
	{
		// $this->esg->set_esg('extra_js',base_url('templates/AdminLTE/assets/jquery-slimscroll/jquery.slimscroll.min.js'));
		$this->load->view('index');
	}
	public function clear_list()
	{
		$this->load->view('content/list');
	}
	public function edit()
	{
		$data['tag_name'] = $this->content_model->content_tag();
		$this->content_model->load();
		$this->esg->set_esg('extra_js', base_url('templates/AdminLTE/assets/dist/js/modules/content/script.js'));
		$this->load->view('index', $data);
		$this->content_model->content_save();
	}
	public function role()
	{
		$this->load->view('index');
	}
	public function category()
	{
		$this->load->view('index');
		$this->content_model->category_slug();
	}
	public function clear_category()
	{
		$this->load->view('content/category');
	}
	public function tag()
	{
		$this->load->view('index');
	}
	public function clear_tag()
	{
		$this->load->view('content/tag');
	}
}