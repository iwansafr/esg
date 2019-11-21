<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('visitor');

$form->setWhere("visited NOT LIKE '%templates%'");
$form->addInput('id','plaintext');
$form->addInput('ip','plaintext');
$form->addInput('visited','plaintext');
$form->addInput('city','plaintext');
$form->addInput('region','plaintext');
$form->addInput('country','plaintext');
$form->addInput('browser','plaintext');
$form->addInput('created','plaintext');
$form->setUrl('admin/visitor/clear_list');
$form->form();