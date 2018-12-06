<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');
$this->zea->search();
$this->zea->setTable('content_tag');
$this->zea->order_by('total','DESC');
$this->zea->addInput('title','plaintext');
$this->zea->addInput('id','link');
$this->zea->setLink('id',base_url('admin/content/list'),'id');
$this->zea->setExtLink('id','&is_tag=1');
// $this->zea->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$this->zea->setPlaintext('id','<i class="fa fa-search"></i>  content');
$this->zea->setLabel('id','Content');
$this->zea->addInput('total','plaintext');
$this->zea->form();