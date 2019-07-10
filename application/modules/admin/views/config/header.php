<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('param');
$this->zea->setTable('config');
$this->zea->setHeading('Header');
$this->zea->setParamName('header');
$this->zea->addInput('image', 'image');
$this->zea->addInput('title', 'text');
$this->zea->addInput('description', 'textarea');
$this->zea->addInput('width','text');
$this->zea->setHelp('width','beri nilai rentang 1-100');
$this->zea->setType('width','number');
$this->zea->addInput('height','text');
$this->zea->setHelp('height','beri nilai rentang 1-100');
$this->zea->setType('height','number');
$this->zea->setFormName('header');
$this->zea->form();