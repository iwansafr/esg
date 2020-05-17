<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if(is_array($data[$field]))
	{
		$data_ids  = $data[$field];
	}else{
		$data_ids  = !empty($data[$field]) ? explode(',', $data[$field]): '';
	}
	if(empty($this->multiselect[$field]['simple']))
	{
		$r_data    = $this->array_path($this->multiselect[$field]['data'], 0, '>','','--');
		$data_size = count($r_data);

		if($data_size > 10)
		{
			$data_size = 10;
		}
		if(!empty($this->selected[$field]))
		{
			$data_ids = [$this->selected[$field]];
		}
		echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		?>
		<select name="<?php echo $field ?>[]" multiple="multiple" id="<?php echo $field ?>" size="<?php echo $data_size; ?>" class="form-control" <?php echo (!empty($required)) ? 'required="required"' : ''; ?>>
			<?php echo $this->createOption($r_data, $data_ids);?>
		</select>
		<?php
	}else{
		echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		$data_size = count($this->multiselect[$field]['data']);
		if($data_size > 10)
		{
			$data_size = 10;
		}
		$multiselect_config = [
			'name'=>$field,
			'options'=>$this->multiselect[$field]['data'],
			'selected'=>$data_ids,
			'size'=>$data_size,
			'id'=>$field,
			'style' => $darkmodestyle,
			'class'=>'form-control'
		];
		if(!empty($required))
		{
			$multiselect_config['required'] = 'required';
		}
		echo form_multiselect($multiselect_config);

	}
}