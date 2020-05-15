<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit' || $this->init == 'param')
	{
		$data_value = empty($this->id) ? 1 : $data[$field];
		$data_value = ($this->init == 'param') ? $data[$field] : $data_value;
		$values     = !empty($data[$field]) ? $data[$field] : '1';
		echo '<br>';
		echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		$name = $field;
	}else{
		$data_value = $dvalue[$ikey];
		$values = $dvalue['id'];
		$name = $field.'_row[]';
	}
	if(!empty($this->checkbox[$field]))
	{
		$data_check = array();
		if($this->init == 'edit' || $this->init == 'roll')
		{
			$data_check = explode(',',$data_value);
			$data_check = array_filter($data_check);
		}else if($this->init == 'param'){
			$data_check = $data_value;
		}
		foreach ($this->checkbox[$field] as $cfkey => $cfvalue)
		{
			if(!empty($data_check) && is_array($data_check))
			{
				$checked = in_array($cfkey, $data_check) ? 1 : 0;
			}else{
				$checked = 0;
			}
			echo '<div class="checkbox">';
			echo '<label>';
			echo form_checkbox(array(
				'name'    => $name.'[]',
				'value'   => $cfkey,
				'checked' => $checked,
				'class' => $name,
				'style' => $darkmodestyle,
				)).ucfirst($cfvalue);
			echo '</label>';
			echo '</div>';
		}
	}else{
		echo '<div class="checkbox">';
		echo '<label>';
		echo form_checkbox(array(
			'name'    => $name,
			'value'   => $values,
			'class'   => $field,
			$required => $required,
			'checked' => $data_value
			)).ucfirst($field);
		echo '</label>';
		echo '</div>';
		echo form_hidden($field.'_row_h[]', $values);
	}
}