<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	$field_name = '';
	if($this->init == 'edit' || $this->init == 'param')
	{
		if(!empty($this->id) || empty($this->value[$field]))
		{
			if(empty($this->value[$field]))
			{
				$data_value =  $data[$field];
			}else{
				$data_value =  $this->value[$field];
			}
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		}else{
			$data_value =  $this->value[$field];
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		}
	}else{
		$data_value = $dvalue[$ikey];
		$field_name = '_row['.$dvalue['id'].']';
	}
	if(!empty($this->money[$field]))
	{
		if(is_numeric($data_value))
		{
			$data_value = $this->money[$field].'. '.number_format($data_value,2,',','.');
		}
	}
	$type = !empty($this->type[$field]) ? $this->type[$field] : 'text';
	$array_input = array(
		'name'    => $field.''.$field_name,
		'class'   => 'form-control',
		$required => $required,
		'type'    => $type,
		'style' => $darkmodestyle,
		'value'   => $data_value);
	if(!empty($this->attribute[$field]))
	{
		$attr = $this->attribute[$field];
		if(is_array($attr))
		{
			foreach ($attr as $attr_key => $attr_value)
			{
				$array_input[$attr_key] = $attr_value;
			}
		}else{
			$array_input[$attr] = $attr;
		}
	}
	if(!empty($this->elementid[$field]))
	{
		// $array_input['id'] = $
		pr($this->elementid);
	}
	echo form_input($array_input);
	if(!empty($this->image[$field]) && !empty(@intval($_GET['id'])))
	{
		echo '<div id="thumbnail-'.str_replace(' ','',$this->image[$field]['src']).'">';
		include 'thumbnail.php';
		echo '</div>';
	}else if(!empty($this->image[$field]))
	{
		echo '<div id="thumbnail-'.str_replace(' ','',$this->image[$field]['src']).'">';
		echo '</div>';
	}
}