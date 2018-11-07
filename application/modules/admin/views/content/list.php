<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('content');
$form->search();
$form->setField(array('title'));
$form->addInput('id','plaintext');
$form->addInput('title','plaintext');
$form->addInput('publish','checkbox');
$form->setDelete(TRUE);
$form->setEdit(TRUE);
$form->form();