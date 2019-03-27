<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Restore_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function upload($file = '')
	{
		if(!empty($file['tmp_name']))
		{
			$dir = FCPATH.'images/modules/backup/';
			if(!is_dir($dir))
			{
				mkdir($dir, 0777);
			}
			copy($file['tmp_name'] , $dir.$file['name']);
		}
	}
}