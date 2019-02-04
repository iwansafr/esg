<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	$field_name = '';
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
		$field_name = '_row['.$dvalue['id'].']';
	}
	$input_array = array(
			'name'     => $field.''.$field_name,
			'class'    => 'form-control select2',
			'options'  => @$this->options[$field],
			$required  => $required,
			'selected' => $data_value,
			'style'    => 'width: 100%;'
		);

	// if($this->init == 'roll')
	// {
		// unset($this->options[$field][$dvalue['id']]);
	// }

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