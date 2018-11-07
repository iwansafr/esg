<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
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
	public function edit()
	{
		$this->load->view('index');
	}
	public function role()
	{
		$this->load->view('index');
	}
	public function category()
	{
		$this->load->view('index');
	}
}