<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Restore extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('restore_model');
		$this->load->model('config_model');
		$this->load->library('esg');
		$this->load->helper('file');
		$this->load->library('ZEA/zea');
		$this->load->library('zip');
		$this->esg_model->init();
	}
	public function index()
	{
		if(!empty($_FILES) && (is_root() || is_admin()))
		{
			$this->restore_model->upload($_FILES['brf']);
		}
		$this->load->view('index');
	}
	public function data($title = '')
	{
		$this->load->view('index', array('title'=>$title));
	}
}