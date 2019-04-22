<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('subscribe_model');
		$this->load->helper('content');
		$this->load->library('esg');
	}
	public function index()
	{
		$this->home_model->home();
		$data['msg'] = $this->subscribe_model->subscribe();
		$this->load->view('index', $data);
	}
}