<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit' || $this->init == 'param')
	{
		if(!empty($this->id) && empty($this->value[$field]))
		{
			$data_value =  $data[$field];
			echo form_label(ucfirst($label), $label);
		}else{
			echo form_label(ucfirst($label), $label);
			$data_value = $this->value[$field];
		}
		echo '<br>';
	}else{
		$data_value = $dvalue[$ikey];
	}
	if(!empty($this->money[$field]))
	{
		if(is_numeric($data_value))
		{
			$data_value = $this->money[$field].'. '.number_format($data_value,2,',','.');
		}
	}

	// echo form_label($data_value, $data_value);
	echo $data_value;
	echo '<br>';
}