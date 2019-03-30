<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('admin_menu_model');
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
		if(!empty($_POST['del_row']))
		{
			foreach ($_POST['del_row'] as $key => $value) 
			{
				$this->admin_menu_model->del_menu($value);
			}
		}
		$this->load->view('index');
	}
	public function edit()
	{
		$data['menu_parent'] = $this->admin_menu_model->menu_parent();
		$this->load->view('index',$data);
	}
	public function parent()
	{
		echo $this->admin_menu_model->get_parent();
	}
	public function selected_parent()
	{
		echo $this->admin_menu_model->selected_parent();
	}
}