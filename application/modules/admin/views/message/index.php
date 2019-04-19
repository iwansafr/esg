<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('message');

$status = array('1'=>'unread', '2'=>'read');

$form->search();
$form->setField(array('name','email','subject','message'));
$form->addInput('id','plaintext');
// $form->setAttribute('status', array('disabled'=>'disabled'));
$form->addInput('name','link');
$form->setLink('name',base_url('admin/message/detail/'),'id');
$form->setClearGet('name');
$form->setAttribute('name',['data-original-title'=>'read message','data-toggle'=>'tooltip','data-placement'=>'bottom']);
$form->addInput('email','plaintext');
$form->addInput('subject','plaintext');
$form->addInput('message','plaintext');
$form->addInput('created','plaintext');
$form->addInput('status', 'dropdown');
$form->setOptions('status', $status);
$form->setFormName('message');
$form->setUrl('admin/message/clear_list');
$form->setDelete(TRUE);
$form->form();