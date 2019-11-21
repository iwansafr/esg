<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->CI->load->helper('string');
if(!empty($field))
{
	$link_get = $this->link['link_get'][$field];
	$key_get  = $link_get;
	$ext_link = !empty($this->extlink[$field]) ? $this->extlink[$field] : '';
	if($this->init == 'edit')
	{
		$data_value = $data[$field];
		$link_get   = $data[$link_get];
		if(!empty($this->plaintext[$field])){
			echo form_label(ucfirst($label), $label).'<br>'.' '.@$this->help[$field];
			$data_value = $this->plaintext[$field];
		}else{
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		}
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
		$attr = $this->attribute[$field];
		if(is_array($attr))
		{
			foreach ($attr as $attr_key => $attr_value)
			{
				$attribute .= $attr_key.'="'.$attr_value.'"';
			}
		}else{
			$attribute = $attr;
		}
	}
	?>
	<a href="<?php echo reduce_double_slashes($this->link[$field].$key_get.$link_get.$ext_link); ?>" <?php echo $attribute ?>><?php echo $data_value ?></a>
	<?php
}