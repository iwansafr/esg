<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function get_module()
	{
		$module = array();
		$i = 0;
		foreach (glob(FCPATH.'images/modules/*') AS $name) 
		{
			$module_name = explode('/',$name);
			$module_name = end($module_name);
			if($module_name != 'backup')
			{
				$module[$i]['name'] = $module_name;
				$module[$i]['path'] = $name;
			}
			$i++;
		}
		return $module;
	}
}