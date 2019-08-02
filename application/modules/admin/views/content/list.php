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
$this->zea->setNumbering(TRUE);
$this->zea->setField(array('title'));
$this->zea->setHeading('<a href="'.base_url('admin/content/edit').'" class="btn btn-sm btn-default"><i class="fa fa-plus"></i></a>');
$this->zea->addInput('id','plaintext');
$this->zea->addInput('image','thumbnail');
$this->zea->addInput('title','plaintext');
$this->zea->addInput('hits','plaintext');
$this->zea->addInput('slug','link');
$this->zea->setLabel('slug','add menu');
$this->zea->setLink('slug',base_url('admin/menu/edit'),'slug');
$this->zea->setExtLink('slug', '&t='.urlencode(encrypt(time())));
$this->zea->setPlaintext('slug','<i class="fa fa-plus-circle"></i>  add to menu');
$this->zea->addInput('created','link');
$this->zea->setLink('created', base_url(),'slug');
$this->zea->setClearGet('created');
$this->zea->setExtLink('created','.html');
$this->zea->setPlaintext('created','<i class="fa fa-eye"></i>  watch content');
$this->zea->setLabel('created','watch Content');
$this->zea->setAttribute('created','target="_blank"');
$this->zea->addInput('publish','checkbox');
$this->zea->setDelete(TRUE);
$this->zea->setEdit(TRUE);
$this->zea->setEditLink(base_url('admin/content/edit?id='));
$this->zea->setUrl('admin/content/clear_list');
$this->zea->setFormName('content_list');
$this->zea->setDataTable(false);
if(!empty($this->zea->getData()['data']))
{
	$this->zea->form();
}else{
	echo 'no data found';
}