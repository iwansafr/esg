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
			if($module_name != 'backup' && $module_name != 'tmp')
			{
				$module[$i]['name'] = $module_name;
				$module[$i]['path'] = $name;
			}
			$i++;
		}
		return $module;
	}

	public function get_images($module = '')
	{
		if(!empty($module))
		{
			$data = array();
			$i = 0;
			foreach (glob(FCPATH.'images/modules/'.$module.'/*/*') AS $name) 
			{
				$module_name = explode('/',$name);
				$size = count($module_name)-1;
				$module_name_array = $module_name;
				$module_name = end($module_name);
				unset($module_name_array[$size]);
				$id = end($module_name_array);
				if($module_name != 'backup' && $module_name != 'tmp')
				{
					if(is_dir($name))
					{
						$j = 0;
						foreach (glob($name.'/*') AS $gallery_name) 
						{
							$module_name = explode('/',$gallery_name);
							$size = count($module_name)-1;
							$module_name_array = $module_name;
							$module_name = end($module_name);
							unset($module_name_array[$size]);
							$id = end($module_name_array);

							$data['gallery'][$i][$j]['id']   = $id;
							$data['gallery'][$i][$j]['name'] = $module_name;
							$data['gallery'][$i][$j]['path'] = $name;
							$j++;
						}
					}else{
						$data['image'][$i]['id'] = $id;
						$data['image'][$i]['name'] = $module_name;
						$data['image'][$i]['path'] = $name;
					}
				}
				$i++;
				$this->zea->init('roll');
				$this->zea->setTable($module);
				if($module == 'config')
				{
					$this->zea->addInput('id','plaintext');
					$this->zea->addInput('name','plaintext');
				}else if($module == 'content')
				{
					$this->zea->setWhere("image != '' OR images != ''");
					$this->zea->addInput('id','plaintext');
				}else if($module == 'content_cat')
				{
					$this->zea->setWhere("image != ''");
					$this->zea->addInput('id','plaintext');
				}else{
					$this->zea->addInput('id','plaintext');
				}
				$this->zea->setUrl('admin/gallery/clear_images/'.$module);
				$data['table_data'] = $this->zea->getData();
			}
			return $data;
		}
	}
}