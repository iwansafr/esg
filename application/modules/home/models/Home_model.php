<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	var $templates = array();
	var $esg_data  = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		$this->esg_model->set_meta();
		$this->init();
	}
	public function init()
	{
		$this->esg_model->navigation();
		$this->esg_model->set_meta();
		// $this->js();
		$this->templates = $this->esg->get_config('templates');
		$this->esg->set_esg('templates',$this->templates);
		$this->esg_data = $this->esg->get_esg();
	}
	public function js()
	{
		$this->esg->set_esg('extra_js',base_url('templates/'.$this->templates['public_template'].'/assets/dist/js/script.js'));
	}

	public function home()
	{
		$template = $this->esg_data['templates']['public_template'];
		$config = $this->esg->get_config($template.'_widget');
	}
}