<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('admin_menu_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function index()
	{
		$data['data_menu'] = array();
		if(isset($_GET['id']))
		{
			$data['data_menu'] = $this->admin_menu_model->get_menu(@intval($_GET['id']));
		}
		$this->load->view('index', $data);
	}

	public function list()
	{
		$data['data_menu'] = array();
		if(!empty($_POST['del_row']))
		{
			foreach ($_POST['del_row'] as $key => $value) 
			{
				$this->admin_menu_model->del_menu($value);
			}
		}
		if(isset($_GET['id']))
		{
			$data['data_menu'] = $this->admin_menu_model->get_menu(@intval($_GET['id']));
		}
		$this->load->view('index', $data);
	}
	public function clear_list()
	{
		$data['data_menu'] = array();
		if(!empty($_POST['del_row']))
		{
			foreach ($_POST['del_row'] as $key => $value) 
			{
				$this->admin_menu_model->del_menu($value);
			}
		}
		if(isset($_GET['id']))
		{
			$data['data_menu'] = $this->admin_menu_model->get_menu(@intval($_GET['id']));
		}
		$this->load->view('admin_menu/list', $data);
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