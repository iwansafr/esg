<?php defined('BASEPATH') OR exit('No direct script access allowed');

// $form = new zea();
$id = $this->input->get('id');
$is_tag = $this->input->get('is_tag');
$this->zea->init('roll');
$this->zea->setTable('content');
$this->zea->search();
if(!empty($id))
{
	$this->zea->setWhere("cat_ids LIKE '%,{$id},%'");
}

if(!empty($is_tag))
{
	$this->zea->setWhere("tag_ids LIKE '%,{$id},%'");
}
$this->zea->setField(array('title'));
$this->zea->addInput('id','plaintext');
$this->zea->addInput('image','thumbnail');
$this->zea->addInput('title','plaintext');
$this->zea->addInput('hits','plaintext');
$this->zea->addInput('publish','checkbox');
$this->zea->setDelete(TRUE);
$this->zea->setEdit(TRUE);
$this->zea->setFormName('content_list');
if(!empty($this->zea->getData()['data']))
{
	$this->zea->form();
}else{
	echo 'no data found';
}