<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(is_root())
{
	$this->zea->init('edit');
	$id = @intval($_GET['id']);
	if(!empty($id))
	{
		$this->zea->setId($id);
	}
	$this->zea->setHeading('User Role');
	$this->zea->setTable('user_role');
	$this->zea->addInput('title','text');
	$this->zea->addInput('level','text');
	$this->zea->setType('level','number');
	$this->zea->addInput('description','textarea');
	$this->zea->setRequired('All');
	echo '<div class="row">';
	echo '<div class="col-md-3">';
	?>
	<a href="<?php echo base_url('admin/user/role/') ?>"><button class="pull-right btn btn-default"><span><i class="fa fa-plus-circle"></i></span> New Role</button></a>
	<?php
	$this->zea->form();
	echo '</div>';

	$form = new zea();
	$form->init('roll');
	$form->search();
	$form->setHeading('User Role List');
	$form->setField(array('id','title'));
	$form->setTable('user_role');
	$form->addInput('id','static');
	$form->setNumbering(TRUE);
	$form->addInput('title','plaintext');
	// $form->addInput('level','hidden');
	$form->addInput('description','plaintext');
	$form->setDelete(TRUE);
	$form->setEdit(TRUE);
	$form->setEditLink(base_url('admin/user/role/?id='));
	$form->setUrl('admin/user/clear_role');
	echo '<div class="col-md-9">';
	$form->setHIde(array('id'));
	$form->form();
	echo '</div>';
	echo '</div>';
}else{
	msg('Forbiden and dangerous menu', 'danger');
}