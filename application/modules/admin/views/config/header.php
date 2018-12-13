<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('param');
$this->zea->setTable('config');
$this->zea->setHeading('Header');
$this->zea->setParamName('header');
$this->zea->addInput('image', 'image');
$this->zea->addInput('title', 'text');
$this->zea->addInput('description', 'textarea');
$this->zea->setFormName('header');
$this->zea->form();