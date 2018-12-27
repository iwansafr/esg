<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function index()
	{
		$this->admin_model->home();
		$this->admin_model->visitor();
		$this->load->view('index');
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
}