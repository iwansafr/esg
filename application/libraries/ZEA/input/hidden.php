<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	$hidden_value = !empty($data[$field]) ? $data[$field] : '';
	$hidden_value = $data[$field] == 0 ? $data[$field] : '';
	if(!empty(@$this->value[$field]) || is_numeric(@$this->value[$field]))
	{
		$hidden_value = $this->value[$field];
	}
	echo form_hidden($field,$hidden_value);
}