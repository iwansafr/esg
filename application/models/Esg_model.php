<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Esg_model extends CI_Model
{
	var $templates = array();
	var $esg_data  = array();

	public function __construct()
	{
		parent::__construct();
	}
	public function init()
	{
		$this->templates = $this->esg->get_config('templates');
		$this->esg->set_esg('templates',$this->templates);
		$this->esg_data = $this->esg->get_esg();
	}
}