<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$id = $this->input->get('id');
$form->init('roll');
$form->setTable('content');
$form->search();
if(!empty($id))
{
	$form->setWhere("cat_ids LIKE '%,{$id},%'");
}
$form->setField(array('title'));
$form->addInput('id','plaintext');
$form->addInput('title','plaintext');
$form->addInput('publish','checkbox');
$form->setDelete(TRUE);
$form->setEdit(TRUE);
$form->form();
