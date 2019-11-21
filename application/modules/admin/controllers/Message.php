<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
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
	public function clear_list()
	{
		$this->load->view('message/index');
	}
	public function detail($id = 0)
	{
		if(!empty($id))
		{
			$data['id'] = $id;
			$this->zea->set_data('message', $id, ['status'=>2]);
			$this->admin_model->message();
			$this->load->view('index', $data);
		}
	}
}