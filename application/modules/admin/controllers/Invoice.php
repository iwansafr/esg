<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Invoice extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('invoice_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function edit()
	{
		$this->load->view('index');
	}
	public function detail($id = 0)
	{
		$data['data'] = $this->invoice_model->get_detail($id);
		$this->load->view('invoice/detail', $data);
	}
}