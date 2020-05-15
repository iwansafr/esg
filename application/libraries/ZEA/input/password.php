<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit' || $this->init == 'param')
	{
		$data_value =  $data[$field];
		echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
	}else{
		$data_value = $dvalue[$ikey];
	}

	$value_data_value = !empty($this->value[$field]) ? $this->value[$field] : '';

	echo form_password(array(
		'name'    => $field,
		'class'   => 'form-control',
		'required'=>'required',
		'style' => $darkmodestyle,
		'value'=>@$value_data_value
		)
	);
}