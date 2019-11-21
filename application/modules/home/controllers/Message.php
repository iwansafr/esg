<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('message_model');
		$this->load->helper('content');
		$this->load->library('esg');
	}
	public function index()
	{
		$this->home_model->home();
		$this->load->view('index');
	}

	public function send()
	{
		$data['msg'] = $this->message_model->send();
		$this->load->view('message/send', $data);
	}
}