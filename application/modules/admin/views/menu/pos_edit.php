<?php defined('BASEPATH') OR exit('No direct script access allowed');
$get_id = $this->input->get('id');
$form = new zea();

$form->init('edit');
$form->setTable('menu_position');

$form->setId($get_id);
$form->setHeading('Menu Position');

$form->addInput('title','text');
$form->setRequired('All');
$form->form();