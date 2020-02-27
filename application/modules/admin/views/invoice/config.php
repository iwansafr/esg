<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();

$form->init('param');
$form->setTable('config');
$form->setParamName('invoice_config');

$form->addInput('template','dropdown');
$form->setOptions('template',$invoice_templates);

$form->form();