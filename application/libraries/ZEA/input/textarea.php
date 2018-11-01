<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit' || $this->init == 'param')
	{
		$data_value =  $data[$field];
		echo form_label(ucfirst($label), $label);
	}else{
		$data_value = $dvalue[$ikey];
	}

	$array_input = array(
		'name'  => $field,
		'class' => 'form-control',
		'rows'  => 2,
		'value' => $data_value);
	if(!empty($this->elementid[$field]))
	{
		$array_input['id'] = $this->elementid[$field];
	}
	if(!empty($required))
	{
		$array_input[$required] = $required;
	}
	echo form_textarea($array_input);
	if(!empty($this->elementid[$field]))
	{
		?>
		<script type="text/javascript">
			CKEDITOR.replace('textckeditor');
		</script>
		<?php
	}
}else{

}