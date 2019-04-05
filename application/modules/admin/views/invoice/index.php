<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');
$this->zea->setTable('invoice');
$this->zea->search();

$this->zea->setField(array('receiver','code','notes'));

$this->zea->setNumbering();
$this->zea->addInput('id','plaintext');
$this->zea->addInput('items','plaintext');
$this->zea->addInput('receiver','plaintext');
$this->zea->addInput('code','plaintext');

$this->zea->setEdit(TRUE);
$this->zea->setEditLink(base_url('admin/invoice/edit?id='),'id');
$this->zea->setDelete(TRUE);
$this->zea->setFormName('invoice_list');
$this->zea->form();
