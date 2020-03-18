<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(is_root())
{
	$form = new zea();

	$form->init('edit');

	$form->setTable('dashboard');

	$form->setId(@intval($_GET['id']));

	$form->addInput('role_ids','multiselect');
	$form->setLabel('role_ids', 'User Role');
	$form->setMultiSelect('role_ids','user_role','id,title');

	$form->addInput('title','text');
	$form->addInput('description','text');

	$form->addInput('link','text');
	$form->setAttribute('link',['placeholder'=>'/admin/content/list']);

	$form->addInput('icon','text');
	$form->setAttribute('icon',['placeholder'=>'fa fa-list']);

	$form->addInput('color','text');
	$form->setType('color','color');

	$form->addInput('publish','checkbox');
	$form->setFormName('custom_dashboard_edit');

	$form2 = new zea();

	$form2->init('roll');

	$form2->setTable('dashboard');

	$form2->setNumbering(true);
	$form2->setEdit(TRUE);
	$form2->setDelete(TRUE);
	$form2->search();
	$form2->addInput('id','hidden');
	$form2->addInput('title','plaintext');

	$form2->addInput('link','plaintext');

	$form2->addInput('icon','plaintext');

	$form2->addInput('color','plaintext');
	$form2->setType('color','color');
	$form2->setUrl('admin/config/clear_custom_dashboard');
	$form2->setFormName('custom_dashboard_roll');
	$form2->setEditLink(base_url('admin/config/custom_dashboard?id='));
	?>
	<div class="col-md-3">
		<a href="<?php echo base_url('admin/config/custom_dashboard');?>" class="btn btn-sm btn-warning pull-right"><i class="fa fa-plus"></i></a>
		<?php $form->form();?>
	</div>
	<div class="col-md-9">
		<?php $form2->form();?>
	</div>
	<?php
}else{
	msg('anda tidak punya akses ke halaman ini','danger');
}