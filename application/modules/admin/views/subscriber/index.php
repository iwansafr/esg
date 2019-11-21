<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('subscriber');
$form->search();
$form->addInput('id','plaintext');
$form->addInput('email','plaintext');
$form->addInput('created','plaintext');
$form->setUrl('admin/subscriber/clear_list');
$form->setDelete(TRUE);
$form->form();
