<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();
$form->init('edit');
$id = @intval($_GET['id']);
if(!empty($id))
{
	$form->setId($id);
}
$form->setHeading('User Role');
$form->setTable('user_role');
$form->addInput('title','text');
$form->addInput('level','text');
$form->setType('level','number');
$form->addInput('description','textarea');
$form->setRequired('All');
$form->form();



$form = new zea();
$form->init('roll');
$form->search();
$form->setField(array('id','title'));
$form->setTable('user_role');
$form->addInput('id','hidden');
$form->addInput('title','plaintext');
$form->addInput('level','hidden');
$form->addInput('description','plaintext');
$form->setDelete(TRUE);
$form->setEdit(TRUE);
$form->setEditLink(base_url('admin/user/role/?id='));
$form->form();