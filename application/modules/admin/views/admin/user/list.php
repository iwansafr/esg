<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');

$form->setTable('user');
$form->addInput('id','plaintext');
$form->addInput('usernmae','plaintext');
$form->setDelete(TRUE);
$form->setEdit(TRUE);
$form->form();