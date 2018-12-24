<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('message');

$form->search();
$form->setField(array('name','email','subject','message'));
$form->addInput('id','plaintext');
$form->addInput('name','plaintext');
$form->addInput('email','plaintext');
$form->addInput('subject','plaintext');
$form->addInput('message','plaintext');
$form->addInput('created','plaintext');
$form->setFormName('message');

$form->form();