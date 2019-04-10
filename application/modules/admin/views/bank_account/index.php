<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('edit');
if(!empty($_GET['id']))
{
	$this->zea->setId(@intval($_GET['id']));
}
$this->zea->setHeading('Bank Account');
$this->zea->setTable('bank_account');
$this->zea->addInput('bank_name','text');
$this->zea->setLabel('bank_name','Bank Name');
$this->zea->addInput('person_name','text');
$this->zea->setLabel('person_name','Person Name');
$this->zea->addInput('icon','file');
$this->zea->setLabel('icon','Bank Icon');
$this->zea->setAccept('icon', '.jpg,.jpeg,.png');
$this->zea->addInput('bank_number','text');
$this->zea->setLabel('bank_number','Account Number');
$this->zea->setFormName('bank_edit_form');
$this->zea->setRequired(['bank_number','bank_name','person_name']);



$form = new zea();
$form->init('roll');
$form->setTable('bank_account');
$form->search();
$form->setHeading('<a href="'.base_url('admin/bank_account').'" class="btn btn-sm btn-default"><i class="fa fa-plus"></i></a>');
$form->addInput('id','plaintext');
$form->setNumbering();
$form->addInput('bank_name','plaintext');
$form->setLabel('bank_name','Bank Name');
$form->addInput('person_name','plaintext');
$form->setLabel('person_name','Person Name');
$form->addInput('icon','thumbnail');
$form->setLabel('icon','Bank Icon');
$form->setAccept('icon', '.jpg,.jpeg,.png');
$form->addInput('bank_number','plaintext');
$form->setLabel('bank_number','Account Number');
$form->setFormName('bank_roll_form');
$form->setUrl('admin/bank_account/clear_list');
$form->setEdit(TRUE);
$form->setDelete(TRUE);
$form->setEditLink(base_url('admin/bank_account/?id='),'id');
?>
<div class="row">
	<div class="col-md-4">
		<?php $this->zea->form();?>
	</div>
	<div class="col-md-8">		
		<?php $form->form();?>
	</div>
</div>