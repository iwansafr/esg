<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();
$form->init('edit');
$id = @intval($_GET['id']);
if(!empty($id))
{
	$form->setId($id);
}
$form->setHeading('User Role');
$form->setTable('user_role');
$form->addInput('title','text');
$form->addInput('level','text');
$form->setType('level','number');
$form->addInput('description','textarea');
$form->setRequired('All');
$form->form();