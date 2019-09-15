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

	public function subscriber_feed($data = '')
	{
		$this->db->select('email');
		$email = $this->db->get('subscriber')->result_array();
		$email_tmp = array();
		if(!empty($email))
		{
			foreach ($email as $key => $value) 
			{
				$email_tmp[] = $value['email'];
			}
			$email_tmp = implode(',',$email_tmp);

		}
		$output['data'] = $data;
		$output['email'] = $email_tmp;
		$this->load->view('config/subscriber_feed',$output);
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

	public function save_default_image()
	{
		$item = '';
		$files = [];
		if(!empty($_POST))
		{
			$item = @$_POST['item'];
		}
		if(!empty($_FILES))
		{
			$files = $_FILES;
		}
		if(!empty($item) && !empty($files))
		{
			$config['upload_path']   = FCPATH.'images/';
			$config['allowed_types'] = 'png';
      // $config['max_size']      = 500;
      // $config['max_width']     = 1024;
      // $config['max_height']    = 768;
      $config['file_name']     = $item.'.png';
      $config['overwrite']     = true; 

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image'))
      {
        $error = array('error' => $this->upload->display_errors());
        return $error;
      }else{
        $data = array('upload_data' => $this->upload->data());
        return $data;
      }
		}

	}

}