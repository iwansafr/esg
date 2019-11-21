<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');

$this->zea->setTable('user_login_failed');
$this->zea->addInput('id','plaintext');
$this->zea->addInput('user_login_id','dropdown');
$this->zea->tableOptions('user_login_id', 'user_login','id','ip');
$this->zea->setAttribute('user_login_id',['disabled'=>'disabled']);
$this->zea->addInput('username','plaintext');
$this->zea->addInput('password','plaintext');
$this->zea->setDelete(TRUE);
$this->zea->setUrl('admin/user/clear_login_failed');
$this->zea->form();