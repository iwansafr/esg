<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if(($this->init == 'edit') || ($this->init == 'param'))
	{
		$hidden_value = '';
		if(!empty($data[$field]))
		{
			$hidden_value = $data[$field];
		}else if($data[$field] == 0){
			$hidden_value = 0;
		}
	}else if($this->init == 'roll')
	{
		$hidden_value = '';
		if(!empty($dvalue[$field]))
		{
			$hidden_value = $dvalue[$field];
		}else if($dvalue[$field] == 0){
			$hidden_value = 0;
		}
	}
	if(!empty(@$this->value[$field]) || is_numeric(@$this->value[$field]))
	{
		$hidden_value = $this->value[$field];
	}
	echo form_hidden($field,$hidden_value);
}