<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();

$form->setTable('testimonial');
$form->init('edit');

$form->addInput('name','text');
$form->setLabel('name','Your Name');

$form->addInput('email','text');
$form->setType('email','email');
$form->setLabel('email','Your Email');

$form->addInput('profession','text');
$form->setLabel('profession','Your Profession');

$form->addInput('testimonial', 'textarea');
$form->setLabel('testimonial', 'Your Testimonial');

$form->setUnique(['email'],'{value} sudah mengisi {table} sebelumnya');
$form->setRequired('All');


$form->form();