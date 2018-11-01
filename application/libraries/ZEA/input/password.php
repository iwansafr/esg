<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	// pr($this->id);
	if($this->init == 'edit' || $this->init == 'param')
	{
		$data_value =  $data[$field];
		echo form_label(ucfirst($label), $label);
	}else{
		$data_value = $dvalue[$ikey];
	}

	echo form_password(array(
		'name'    => $field,
		'class'   => 'form-control',
		'required'=>'required'
		)
	);
}