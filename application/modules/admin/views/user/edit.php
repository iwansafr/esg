<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();
$id = @intval($_GET['id']);
if(!empty($id))
{
	$form->setId($id);
}
$form->init('edit');
$form->setTable('user');
$form->addInput('username','text');
$form->addInput('password','password');
$form->addInput('email','text');
$form->setType('emial','email');
$form->addInput('image','upload');
$form->addInput('user_role_id','dropdown');
$form->setLabel('user_role_id','Role');
$form->tableOptions('user_role_id','user_role','id','title');
$form->addInput('active','radio');
$form->setRadio('active',array('Not Active','Active'));
$form->form();