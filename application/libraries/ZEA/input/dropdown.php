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
		echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
	}else{
		$data_value = $dvalue[$ikey];
		$field_name = '_row['.$dvalue['id'].']';
	}
	$cur_options = @$this->options[$field];
	if($this->table == @$this->options['ref_table_'.$field])
	{
		if($this->init == 'roll')
		{
			unset($cur_options[@$dvalue[$this->key]]);
		}else{
			unset($cur_options[@$data['id']]);
		}
	}
	$input_array = array(
			'name'     => $field.''.$field_name,
			'class'    => 'form-control select2',
			'options'  => @$cur_options,
			$required  => $required,
			'selected' => $data_value,
			'style'    => 'width: 100%;'.$darkmodestyle
		);

	// if($this->init == 'roll')
	// {
		// unset($cur_options[$dvalue['id']]);
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

	if(!empty($cur_options))
	{
		if(@$attr=='disabled')
		{
			if($this->init=='edit' || $this->init == 'param')
			{
				echo '<br>';
			}
			echo @$input_array['options'][@intval($data_value)];
		}else{
			echo form_dropdown($input_array);
		}
	}else{
		msg('Option for '.$field.' is Empty','danger');
	}
	$attr = '';
}