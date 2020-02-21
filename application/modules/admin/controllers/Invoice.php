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
		$data = $this->invoice_model->graphics();
		$this->load->view('index',['data'=>$data]);
	}

	public function clear_list()
	{
		$this->load->view('invoice/index');
	}

	public function edit()
	{
		$this->load->view('index');
		$this->invoice_model->save();
	}
	public function detail($id = 0)
	{
		$data['data'] = $this->invoice_model->get_detail($id);
		$data['bank'] = $this->invoice_model->get_bank();
		$this->load->view('invoice/detail', $data);
	}

	public function graphics()
	{
		$data = $this->invoice_model->graphics();
	}

	public function config()
	{
		$templates = [];
		foreach(glob(APPPATH.'modules/admin/views/invoice/template_*') AS $key => $value){
			$value = explode('/', $value);
			$value = end($value);
			$value = str_replace('.php','',$value);
			$templates[$value] = $value;
		}
		$this->load->view('index',['invoice_templates'=>$templates]);
	}
}