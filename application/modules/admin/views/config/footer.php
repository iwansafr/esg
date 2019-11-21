<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('param');
$this->zea->setTable('config');
$this->zea->setHeading('Footer');
$this->zea->setParamName('footer');
$this->zea->addInput('title', 'text');
$this->zea->addInput('link', 'text');
$this->zea->setType('link','url');
$this->zea->addInput('active','checkbox');
$this->zea->setFormName('footer_form');
$this->zea->form();