<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('edit');
$form->setTable('message');
$form->setId($id);
$form->setHeading('Message');
$form->setEditStatus(FALSE);
$form->addInput('name','plaintext');
$form->addInput('email','plaintext');
$form->addInput('created','plaintext');
$form->addInput('subject','plaintext');
$form->addInput('message','plaintext');
$form->setSave(FALSE);
$form->form();