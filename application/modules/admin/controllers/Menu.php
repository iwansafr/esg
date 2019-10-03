<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('menu_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
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
	public function clear_position()
	{
		$this->load->view('menu/position');
	}
	public function list()
	{
		if(!empty($_POST['del_row']))
		{
			foreach ($_POST['del_row'] as $key => $value) 
			{
				$this->menu_model->del_menu($value);
			}
		}
		$this->load->view('index');
	}
	public function clear_list()
	{
		if(!empty($_POST['del_row']))
		{
			foreach ($_POST['del_row'] as $key => $value) 
			{
				$this->menu_model->del_menu($value);
			}
		}
		$this->load->view('menu/list');
	}
	public function edit()
	{
		$data['menu_position'] = $this->menu_model->menu_position();
		$data['menu_parent'] = $this->menu_model->menu_parent();
		$data['template'] = $this->menu_model->template();
		if(empty(@intval($_GET['p_id'])))
		{
			// $this->esg->set_esg('extra_js', base_url('templates/AdminLTE/assets/dist/js/modules/menu/script.js'));
			$this->esg->add_js([base_url('templates/AdminLTE/assets/dist/js/modules/menu/script.js')]);
		}
		$this->load->view('index',$data);
	}
	public function parent()
	{
		echo $this->menu_model->get_parent();
	}
	public function selected_parent()
	{
		echo $this->menu_model->selected_parent();
	}
}