<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function index()
	{
		$this->admin_model->home();
		// $this->admin_model->visitor();
		$user = $this->session->userdata(base_url().'_logged_in');
		$tmp_data = [];
		if($this->db->table_exists('dashboard'))
		{
			$tmp_data = $this->db->get_where('dashboard', " role_ids LIKE '%,{$user['user_role_id']},%'")->result_array();
		}
		$this->load->view('index',['dashboard'=>$tmp_data]);
	}

	public function list()
	{
		$this->load->view('index');
	}
	public function login()
	{
		$this->esg->login();
		$this->load->view('user/login');
	}
	public function logout()
	{
		$this->esg->logout();
	}
	public function search()
	{
		$this->load->view('index');
	}
	public function debuging()
	{
		$this->load->view('index');
	}
}