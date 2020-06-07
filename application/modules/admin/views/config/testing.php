<?php

$form = new zea();

$form->init('param');

$form->setTable('config');

$form->setParamName('testing');

$form->addInput('gambar1','image');
$form->addInput('gambar2','image');

$form->form();