<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form  = new zea();

$form->init('param');
$form->setTable('config');
$form->setParamName('site');
$form->setHeading('Site Configuration');
$form->addInput('title', 'text');
$form->addInput('link', 'text');
$form->addInput('image', 'upload');
$form->setAccept('image', 'image/jpeg,image/png');
$form->addInput('keyword', 'text');
$form->addInput('description', 'textarea');
$form->addInput('year', 'text');
$form->addInput('lang','dropdown');
$form->setOptions('lang',['id'=>'Indonesia','en'=>'English']);
$form->form();