<?php

$form = new zea();

$form->init('param');

$form->setTable('config');

$form->setParamName('testing');

$form->addInput('gambar1_image','image');
$form->addInput('gambar2_image','image');

$form->form();