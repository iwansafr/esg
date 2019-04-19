<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($title))
{
	foreach (glob(FCPATH.'images/modules/backup/*') as $value) 
	{
		$is_file = explode('/',$value);
		$is_file = end($is_file);
		if($title.'.zip' == $is_file)
		{
			$zip = new ZipArchive;
			if($zip->open($value) === TRUE)
			{
				// $table = array('config','comment','content','content_cat','content_tag','menu','menu_position','message','prala','prala_location','prala_location_bulan','prala_pendidikan','prala_user','prodi','user','user_login','user_role');
				$table = $this->config_model->get_table();
				foreach ($table as $tbkey => $tbvalue) 
				{
					$dir = FCPATH.'images/modules/'.$tbvalue;
					if(is_dir($dir))
					{
						recursive_rmdir($dir);
					}
				}
				$zip->extractTo(FCPATH.'images/modules/');
				$zip->close();
				$esg_data = read_file(FCPATH.'images/modules/data.esg');
				if(!empty($esg_data))
				{
					$esg_data = json_decode($esg_data, TRUE);
					$data_message = array();
					foreach ($esg_data as $esdkey => $esdvalue) 
					{
						$data_insert = array();
						$this->db->empty_table($esdkey);
						foreach ($esdvalue as $esdvkey => $esdvvalue) 
						{
							$data_insert[] = $esdvvalue;
						}
						if(!empty($data_insert))
						{
							if($this->db->insert_batch($esdkey, $data_insert))
							{
								$data_message[] = 'insert to '.$esdkey.' Success';
							}
						}
					}
					foreach ($data_message as $dmkey => $dmvalue) 
					{
						msg($dmvalue,'success');
					}
					unlink(FCPATH.'images/modules/data.esg');
					remove_php(FCPATH.'images/modules/');
				}else{
					foreach ($table as $tbkey => $tbvalue) 
					{
						$dir = FCPATH.'images/modules/'.$tbvalue;
						if(is_dir($dir))
						{
							recursive_rmdir($dir);
						}
					}
					foreach (glob(FCPATH.'images/modules/*') as $value)
					{
						$name = explode('/',$value);
						$name = end($name);
						if($name != 'backup')
						{
							$dir = FCPATH.'images/modules/'.$name;
							if(is_dir($dir))
							{
								recursive_rmdir($dir);
							}
						}

					}
				}
			}
		}
	}
}else{
	msg('permission denied','danger');
}