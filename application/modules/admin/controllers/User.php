<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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
		$this->load->view('index');
	}

	public function list()
	{
		$this->esg->set_esg('extra_js',base_url('templates/AdminLTE/assets/jquery-slimscroll/jquery.slimscroll.min.js'));
		$this->load->view('index');
	}
	public function clear_list()
	{
		$this->load->view('user/list');
	}
	public function edit()
	{
		$this->load->view('index');
	}

	public function login_list()
	{
		$this->load->view('index');
	}

	public function clear_login_list()
	{
		$this->load->view('user/login_list');
	}

	public function login_failed()
	{
		$this->load->view('index');
	}

	public function clear_login_failed()
	{
		$this->load->view('user/login_failed');
	}

	public function role()
	{
		$this->load->view('index');
	}
	public function clear_role()
	{
		$this->load->view('user/role');
	}
}