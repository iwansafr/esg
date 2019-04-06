<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();

$form->setTable('menu_position', 'id', 'DESC');
$form->init('roll');
$form->setHeading('<a href="'.base_url('admin/menu/position').'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new position</button></a>');
$form->search();

$form->setField(array('title'));
$form->addInput('id','plaintext');
$form->addInput('title','plaintext');

$form->addInput('created','link');
$form->setLink('created',base_url('admin/menu/list'),'id');
// $form->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$form->setPlaintext('created','<i class="fa fa-search"></i>  menu');
$form->setLabel('created','menu');

$form->setEditLink('position?id=');

$form->setDelete(true);
$form->setEdit(TRUE);
$form->setFormName('pos_list');
$form->setUrl('admin/menu/clear_position');
if(!empty($form->getData()['data']))
{
	$form->form();
}else{
	echo 'no data found';
}