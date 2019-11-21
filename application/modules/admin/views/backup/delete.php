<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($title))
{
	foreach (glob(FCPATH.'images/modules/backup/*') as $value) 
	{
		$is_file = explode('/',$value);
		$is_file = end($is_file);
		if($title.'.zip' == $is_file)
		{
			if(unlink($value))
			{
				msg('success delete backup data','success');
				echo '<a href="'.base_url('admin/backup').'" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> back</a>';
			}else{
				msg('failed delete backup data','danger');
			}
		}
	}
}else{
	msg('permission denied','danger');
}