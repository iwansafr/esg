<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(is_admin() || is_root())
{
	if(empty($_GET))
	{
		$template_names = array();
		foreach(glob(FCPATH.'application/modules/home/views/templates/*/index.esg') as $file)
		{
			$template_dir = explode('/', $file);
			array_pop($template_dir);
			$template_name = end($template_dir);
			if(is_admin())
			{
				$template_names[$templates['public_template']] = $templates['public_template'];
			}else{
				$template_names[$template_name] = $template_name;
			}
		}
		if(!empty($template_names))
		{
			echo '<div class="panel panel-default">';
			echo '<div class="panel panel-heading">';
			echo '<h4>Select Template to Add script</h4>';
			echo '</div>';
			echo '<div class="panel panel-body">';
			echo '<ol>';
			foreach ($template_names as $key => $value) 
			{
				?>
				<a href="<?php echo base_url('admin/config/script').'?n='.$value.'&k='.encrypt($value); ?>"><h2><li><?php echo $value; ?></li></h2></a>
				<?php
			}
			echo '</ol>';
			echo '</div>';
			echo '<div class="panel panel-footer">';
			echo '<a href="'.base_url($this->esg->get_esg('navigation')['string']).'" class="btn btn-warning" title="refresh"><i class="fa fa-refresh"></i></a>';
			echo '</div>';
			echo '</div>';
		}
	}else{
		$template = @$_GET;
		$n = $template['n'];
		$k = urldecode($template['k']);
		if(decrypt($n, $k))
		{
			$form = new zea();
			$form->init('param');
			$form->setTable('config');
			$form->setParamName($n.'_script');
			$form->addInput('script','textarea');
			$form->setValue('script', '<script>//type your script here</script>');
			
			$form->form();
		}
	}
}else{
	msg('you dont have permission to access this section', 'danger');
}