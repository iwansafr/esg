<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Esg extends CI_Model
{

	public function set_esg($index = '', $data = array())
	{
		$output = $this->get_esg();
		if(!empty($index))
		{
			if(!empty($data))
			{
				$output[$index] = $data;
			}
		}
		$this->config->set_item('esg', $output);
	}

	public function get_esg($index = '')
	{
		$data   = $this->config->item('esg');
		$output = $data;
		if(!empty($index))
		{
			$output = $data[$index];
		}
		return $output;
	}

	public function get_config($name = '')
  	{
		$data = array();
		if(!empty($name))
		{
			$value = $this->db->query('SELECT value FROM config WHERE name = ?', $name)->row_array();
			if(!empty($value))
			{
				$data = json_decode($value['value'], 1);
			}
		}
		return $data;
	}

	public function extra_css()
	{
		$data = $this->config->item('esg');
		$data = @$data['extra_css'];
		if(!empty($data))
		{
			if(is_array($data))
			{
				foreach ($data as $key => $value) 
				{
					echo '<link rel="stylesheet" href="'.$value.'">'."\n";
				}
			}else{
				echo '<link rel="stylesheet" href="'.$value.'">'."\n";
			}
		}
	}
	public function extra_js()
	{
		$data = $this->config->item('esg');
		$data = $this->get_esg('extra_js');
		if(!empty($data))
		{
			if(is_array($data))
			{
				foreach ($data as $key => $value) 
				{
					echo '<script src="'.$value.'"></script>'."\n";
				}
			}else{
				echo '<script src="'.$data.'"></script>'."\n";
			}
		}
	}
}