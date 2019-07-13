<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($user['id'] == @intval($_GET['id']) || is_root() || is_admin())
{
	$id = @intval($_GET['id']);
	if(!empty($id))
	{
		$this->zea->setId($id);
	}
	$where = ' level > 1';

	if(is_root())
	{
		$where = '';
	}
	$this->zea->init('edit');
	$this->zea->setTable('user');
	$this->zea->addInput('username','text');
	$this->zea->addInput('password','password');
	$this->zea->addInput('email','text');
	$this->zea->setType('emial','email');
	$this->zea->addInput('image','upload');
	if($user['level'] > 2)
	{
		$this->zea->addInput('user_role_id','static');
		$this->zea->setValue('user_role_id',$user['user_role_id']);
	}else{
		$this->zea->addInput('user_role_id','dropdown');
		$this->zea->setLabel('user_role_id','Role');
		$this->zea->tableOptions('user_role_id','user_role','id','title', $where);
	}
	$this->zea->addInput('active','radio');
	$this->zea->setRadio('active',array('Not Active','Active'));
	$this->zea->setRequired(array('user_role_id'));
	$this->zea->setUnique(array('username','email'));
	$this->zea->setEncrypt(array('password'));
	$this->zea->form();
}else{
	echo msg('Forbiden and dangerous menu', 'danger');
}
