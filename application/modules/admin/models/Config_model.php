<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function get_table()
	{
		return $this->db->list_tables();
	}

	public function dashboard_save()
	{
		if(!empty($_POST))
		{
			$config       = $_POST;
			$config_title = 'dashboard';
			$this->zea->init('param');
			foreach ($_POST as $key => $value) 
			{
				if($key!='dashboard')
				{
					$this->zea->addInput($key,'hidden');
					$this->zea->setValue($key,$value);
				}
			}
			$this->zea->setTable('config');
			$this->zea->setParamName($config_title);
			$this->zea->setFormName('dashboard');
			$message = $this->zea->action();
			if(!empty($message))
			{
				foreach ($message as $key => $value) 
				{
					if(!empty($value['msg']) && !empty($value['alert']))
					{
						return [$value['msg'], $value['alert']];
					}
				}
			}
		}
	}

	public function upload($file = '')
	{
		$msg = ['msg'=>'upload failed','type'=>'danger'];
		if(!empty($file['tmp_name']))
		{
			$dir = FCPATH.'images/modules/tmp/';
			if(!is_dir($dir))
			{
				mkdir($dir);
			}
			copy($file['tmp_name'] , $dir.$file['name']);
			$zip = new ZipArchive;
			if($zip->open($dir.$file['name']) === TRUE)
			{
				$zip->extractTo(FCPATH.'images/modules/tmp/');
				$zip->close();
				$file_name = str_replace('.zip', '', strtolower($file['name']));
				copy_dir(FCPATH.'images/modules/tmp/'.$file_name.'/home/'.$file_name, APPPATH.'modules/home/views/templates/'.$file_name);
				copy_dir(FCPATH.'images/modules/tmp/'.$file_name.'/templates/'.$file_name, FCPATH.'templates/'.$file_name);
				$msg = ['msg'=>'upload success','type'=>'success'];
			}
		}
		return $msg;
	}
}