<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	$link_get = $this->link['link_get'][$field];
	$key_get  = $link_get;
	$ext_link = !empty($this->extlink[$field]) ? $this->extlink[$field] : '';
	if($this->init == 'edit')
	{
		$data_value = $data[$field];
		$link_get   = $data[$link_get];

		echo form_label(ucfirst($label), $label);
	}else{
		$data_value = $dvalue[$ikey];
		$link_get   = $dvalue[$link_get];
		if(!empty($this->plaintext[$field])){
			$data_value = $this->plaintext[$field];
		}
	}
	if(!empty($this->clearget[$field]))
	{
		$key_get = '/';
	}else{
		$key_get = '/?'.$key_get.'=';
	}

	$attribute = '';
	if(!empty($this->attribute[$field]))
	{
		$attribute = $this->attribute[$field];
	}
	?>
	<a href="<?php echo $this->link[$field].$key_get.$link_get.$ext_link; ?>" <?php echo $attribute ?>><?php echo $data_value ?></a>
	<?php
}