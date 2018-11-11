<?php defined('BASEPATH') OR exit('No direct script access allowed');
$template_names = array();
?>
<a href="<?php echo base_url().'admin/config/widget' ?>" class="btn btn-default pull-right" ><i class=" fa fa-cog"></i> Manage Widget</a>
<?php
if(is_admin())
{
	$template_names = array();
	$template_admin = array();
	foreach(glob(FCPATH.'application/modules/home/views/templates/*/index.esg') as $file)
	{
		$template_dir = explode('/', $file);
		array_pop($template_dir);
		$template_name = end($template_dir);
		$template_names[$template_name] = $template_name;
	}
	foreach(glob(FCPATH.'application/modules/admin/views/templates/*/index.esg') as $file)
	{
		$template_dir = explode('/', $file);
		array_pop($template_dir);
		$template_admin = end($template_dir);
		$template_admin_names[$template_admin] = $template_admin;
	}

	$this->zea->init('param');
	$this->zea->setTable('config');
	$this->zea->setId(1);
	$this->zea->setHeading('templates');
	// $this->zea->setParam($config);
	$this->zea->setParamName('templates');
	$this->zea->addInput('public_template', 'dropdown');
	$this->zea->setLabel('public_template', 'Public Template');
	if(!empty($template_names))
	{
		$this->zea->setOptions('public_template', $template_names);
	}

	$this->zea->addInput('admin_template', 'dropdown');
	$this->zea->setLabel('admin_template', 'Admin Template');
	if(!empty($template_admin_names))
	{
		$this->zea->setOptions('admin_template', $template_admin_names);
	}
	$this->zea->form();
}else{
	msg('you dont have permission to access this section', 'danger');
}