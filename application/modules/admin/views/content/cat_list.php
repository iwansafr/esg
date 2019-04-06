<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();

$form->setTable('content_cat', 'id', 'DESC');
$form->init('roll');
$form->setHeading('<a href="'.base_url('admin/content/category').'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new category</button></a>');
$form->search();

$form->setField(array('title'));

$form->addInput('par_id','dropdown');
$form->setLabel('par_id','parent');
$form->tableOptions('par_id','content_cat','id','title');
$form->setAttribute('par_id','disabled');

$form->addInput('title','plaintext');

$form->addInput('id','link');
$form->setLink('id',base_url('admin/content/category/list'),'id');
// $form->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$form->setPlaintext('id','<i class="fa fa-search"></i>  content');
$form->setLabel('id','Content');
// $form->setClearGet('id');

$form->addInput('image','thumbnail');
$form->setImage('image','content_cat');

$form->addInput('slug','link');
$form->setLabel('slug','add menu');
$form->setLink('slug',base_url('admin/menu/edit'),'slug');
$form->setExtLink('slug', '&type=category&t='.urlencode(encrypt(time())));
$form->setPlaintext('slug','<i class="fa fa-plus-circle"></i>  add to menu');

$form->setEditLink('category?id=');
$form->setUrl('admin/content/clear_category');

$form->setDelete(true);
$form->setEdit(TRUE);
$form->setFormName('cat_list');
if(!empty($form->getData()['data']))
{
  $form->form();
}else{
  echo 'no data found';
}
