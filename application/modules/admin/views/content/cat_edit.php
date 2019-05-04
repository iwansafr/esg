<?php defined('BASEPATH') OR exit('No direct script access allowed');
$get_id = $this->input->get('id');
// $form = new zea();
$this->zea->init('edit');
$this->zea->setTable('content_cat');

$this->zea->setId($get_id);
$this->zea->setHeading('Category');

$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id', 'Parent');

$this->zea->tableOptions('par_id', 'content_cat','id','title');

$this->zea->addInput('title','text');

$slug_type = !empty($get_id) ? 'text' : 'static';

$this->zea->addInput('slug', $slug_type);

$this->zea->addInput('image', 'upload');
$this->zea->setAccept('image', '.jpeg,.png,.jpg');

$this->zea->addInput('icon','text');

$this->zea->addInput('description', 'textarea');

$this->zea->addInput('publish', 'checkbox');