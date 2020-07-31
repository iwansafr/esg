<?php
if(is_root())
{
	$form = new zea();

	$form->init('param');

	$form->setParamName('config_theme');

	$form->setTable('config');
	$form->addInput('main_color', 'text');
	$form->setType('main_color','color');

	$form->addInput('font_color','text');
	$form->setType('font_color','color');

	$form->form();
}