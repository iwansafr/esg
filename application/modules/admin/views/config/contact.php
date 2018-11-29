<?php
$form = new zea();
$form->init('param');
$form->setTable('config');
$form->setParamName('contact');
$form->addInput('title', 'text');
$form->addInput('description', 'textarea');
$form->addInput('phone', 'text');
$form->setType('phone','number');
$form->addInput('email', 'text');
$form->setType('email','email');
$form->addInput('google', 'text');
$form->setLabel('google', 'Google Plus');
$form->addInput('facebook', 'text');
$form->addInput('twitter', 'text');

$form->form();