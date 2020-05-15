<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	$data_value = '';
	if($this->init == 'edit' || $this->init == 'param')
	{
		if(!empty($data[$field]))
		{
			$data_value =  $data[$field];
		}elseif(!empty($this->value[$field]))
		{
			$data_value = $this->value[$field];
		}
		echo form_label(ucfirst($label), $field).' '.@$this->help[$field];
	}else{
		$data_value = @$dvalue[$ikey];
	}
	$array_input = array(
		'name'  => $field,
		'class' => 'form-control ',
		'rows'  => 4,
		'value' => $data_value,
		'style' => $darkmodestyle,
	);
	if(!empty($this->elementid[$field]))
	{
		$array_input['id'] = $this->elementid[$field];
	}

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

	if(!empty($required))
	{
		$array_input[$required] = $required;
	}
	echo form_textarea($array_input);
	if(!empty($this->elementid[$field]) && $this->elementid[$field] =='textckeditor')
	{
		?>
		<script type="text/javascript">
			CKEDITOR.replace('textckeditor');
		</script>
		<?php
	}
}else{

}