<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->model('menu_model');
		$this->esg_model->init();
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function position()
	{
		$this->load->view('index');
	}
	public function list()
	{
		$this->load->view('index');
	}
	public function edit()
	{
		$data['menu_position'] = $this->menu_model->menu_position();
		$data['menu_parent'] = $this->menu_model->menu_parent();
		if(empty(@intval($_GET['p_id'])))
		{
			$this->esg->set_esg('extra_js', base_url('templates/AdminLTE/assets/dist/js/modules/menu/script.js'));
		}
		$this->load->view('index',$data);
	}
	public function parent()
	{
		echo $this->menu_model->get_parent();
	}
}