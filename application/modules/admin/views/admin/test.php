<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->setTable('content');
$form->init('edit');

$form->addInput('title','text');
$form->setLabel('title','iwan');

$form->form();