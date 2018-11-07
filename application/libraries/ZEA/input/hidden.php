<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if(($this->init == 'edit') || ($this->init == 'param'))
	{
		$hidden_value = !empty($data[$field]) ? $data[$field] : '';
		$hidden_value = $data[$field] == 0 ? $data[$field] : '';
	}else if($this->init == 'roll')
	{
		$hidden_value = !empty($dvalue[$field]) ? $dvalue[$field] : '';
		$hidden_value = $dvalue[$field] == 0 ? $dvalue[$field] : '';
	}
	if(!empty(@$this->value[$field]) || is_numeric(@$this->value[$field]))
	{
		$hidden_value = $this->value[$field];
	}
	echo form_hidden($field,$hidden_value);
}