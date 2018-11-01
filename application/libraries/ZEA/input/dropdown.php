<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit' || $this->init == 'param')
	{
		if(!empty($data[$field]))
		{
			$data_value =  $data[$field];
		}else if(!empty($this->selected[$field]))
		{
			$data_value = $this->selected[$field];
		}else{
			$data_value =  $data[$field];
		}
		echo form_label(ucfirst($label), $label);
	}else{
		$data_value = $dvalue[$ikey];
	}

	$input_array = array(
			'name'     => $field,
			'class'    => 'form-control',
			'options'  => @$this->options[$field],
			$required  => $required,
			'selected' => $data_value
		);


	if(!empty($this->attribute[$field]))
	{
		$attr = $this->attribute[$field];
		if(is_array($attr))
		{
			foreach ($attr as $attr_key => $attr_value)
			{
				$input_array[$attr_key] = $attr_value;
			}
		}else{
			$input_array[$attr] = $attr;
		}
	}

	if(!empty($this->options[$field]))
	{
		echo form_dropdown($input_array);
	}else{
		msg('Option for '.$field.' is Empty','danger');
	}
}