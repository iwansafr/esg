<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(is_admin() || is_root())
{
	$form = new zea();
	$form->init('param');
	$form->setTable('config');
	$form->setParamName('subscriber');
	$form->setHeading('Subscriber Configuration');
	$form->addInput('broadcast', 'checkbox');
	$form->setFormName('broadcash_form');
	$form->form();
}