<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');

$this->zea->setTable('user_login');
$this->zea->addInput('id','plaintext');
$this->zea->addInput('user_id','dropdown');
$this->zea->tableOptions('user_id','user','id','username');
$this->zea->setAttribute('user_id',['disabled'=>'disabled']);
$this->zea->setLabel('user_id','username');
$this->zea->addInput('browser','plaintext');
$this->zea->addInput('created','plaintext');
$this->zea->setDelete(TRUE);
$this->zea->setUrl('admin/user/clear_login_list');
$this->zea->form();