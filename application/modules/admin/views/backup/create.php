<?php defined('BASEPATH') OR exit('No direct script access allowed');

$key = $this->input->post('esg');
if(!empty($key))
{
	if(decrypt('esoftgreat', $key))
	{
		$data = array();
		foreach(glob(FCPATH.'images/modules/*') AS $value)
		{
			$module = explode('/',$value);
			$module = end($module);
			if($module != 'backup')
			{
				$this->zip->read_dir($value, FALSE);
			}
		}
		// $table = array('config','comment','content','content_cat','content_tag','menu','menu_position','message','user','user_login','user_role');
		$table = $this->config_model->get_table();
		foreach ($table as $key => $value) 
		{
			$data[$value] = $this->db->get($value)->result_array();
		}
		$this->zip->add_data('data.esg', json_encode($data));
		$dir = FCPATH.'images/modules/backup/';
		if(!is_dir($dir))
		{
			mkdir($dir, 0777);
		}
		if($this->zip->archive(FCPATH.'images/modules/backup/'.date('Y-m-d_h-i:s').'.zip'))
		{
			msg('success create backup data','success');
			echo '<a href="'.base_url('admin/backup').'" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> back</a>';
		}else{
			msg('failed to create backup data','danger');
		}
	}else{
		echo msg('permission denied','danger');
	}
}