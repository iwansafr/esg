<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();

$form->init('roll');
$form->search();
$form->setTable('content_tag');
$form->order_by('total','DESC');
$form->addInput('title','plaintext');
$form->addInput('id','link');
$form->setLink('id',base_url('admin/content/list'),'id');
$form->setExtLink('id','&is_tag=1');
// $form->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$form->setPlaintext('id','<i class="fa fa-search"></i>  content');
$form->setLabel('id','Content');
$form->addInput('total','plaintext');
$form->setFormName('tag');
$form->setUrl('admin/content/clear_tag');
if(!empty($form->getData()['data']))
{
	$form->form();
}else{
	echo 'no data found';
}