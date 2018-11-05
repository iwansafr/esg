<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');

$form->search();
$form->setField(array('username','email'));
$form->setTable('user');
$form->addInput('id','plaintext');
$form->addInput('username','plaintext');
$form->addInput('email','plaintext');
$form->addInput('created','plaintext');
$form->setDelete(TRUE);
$form->setEdit(TRUE);
$form->form();