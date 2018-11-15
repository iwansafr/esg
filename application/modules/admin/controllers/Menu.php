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
		$this->load->view('index',$data);
	}
}