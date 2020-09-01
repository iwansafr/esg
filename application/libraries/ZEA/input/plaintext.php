<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit' || $this->init == 'param')
	{
		if(!empty($this->id) && empty($this->value[$field]))
		{
			$data_value =  $data[$field];
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		}else{
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
			$data_value = $this->value[$field];
		}
		if(!empty($this->plaintext[$field])){
			$data_value = $this->plaintext[$field];
			if(preg_match_all('~{.*?}~', $data_value, $output))
			{
				// pr($output);
			}
			if(!empty($output))
			{
				foreach ($output[0] as $output_key => $output_value) 
				{
					$tmp_output_value; $output_value;
					$tmp_output_value = str_replace('{', '', $output_value);
					$tmp_output_value = str_replace('}', '', $tmp_output_value);
					$data_value = preg_replace('~'.$output_value.'~', $data[$tmp_output_value], $data_value);
				}
			}
		}
		echo '<br>';
	}else{
		$data_value = $dvalue[$ikey];
		if(!empty($this->plaintext[$field])){
			$data_value = $this->plaintext[$field];
			if(preg_match_all('~{.*?}~', $data_value, $output))
			{
				// pr($output);
			}
			if(!empty($output))
			{
				foreach ($output[0] as $output_key => $output_value) 
				{
					$tmp_output_value; $output_value;
					$tmp_output_value = str_replace('{', '', $output_value);
					$tmp_output_value = str_replace('}', '', $tmp_output_value);
					$data_value = preg_replace('~'.$output_value.'~', $dvalue[$tmp_output_value], $data_value);
				}
			}
		}
	}
	if(!empty($this->money[$field]))
	{
		if(is_numeric($data_value))
		{
			$data_value = $this->money[$field].'. '.number_format($data_value,2,',','.');
		}
	}

	// echo form_label($data_value, $data_value);
	if(!empty($ikey))
	{	
		if(!empty($this->input[$ikey]['append']))
		{
			$data_value = $data_value.' '.$this->input[$ikey]['append'];
		}
	}
	echo $data_value;
	echo '<br>';
}