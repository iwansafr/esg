<?php defined('BASEPATH') OR exit('No direct script access allowed');

$get_id = $this->input->get('id');
$form = new zea();

$form->init('edit');
$form->setTable('menu_position');

$form->setId($get_id);
$form->setHeading('Menu Position');

$form->addInput('title','text');
$form->setRequired('All');
?>
<div class="col-md-3">
  <?php
  $form->form();
  ?>
</div>
<?php

$form = new zea();

$form->setTable('menu_position', 'id', 'DESC');
$form->init('roll');
$form->setHeading('<a href="'.base_url('admin/menu/position').'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new position</button></a>');
$form->search();

$form->setField(array('title'));
$form->addInput('id','plaintext');
$form->addInput('title','plaintext');

$form->addInput('created','link');
$form->setLink('created',base_url('admin/menu/list'),'id');
// $form->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$form->setPlaintext('created','<i class="fa fa-search"></i>  menu');
$form->setLabel('created','menu');

$form->setEditLink('position?id=');

$form->setDelete(true);
$form->setEdit(TRUE);

?>
<div class="col-md-9">
  <?php
  $form->form();
  ?>
</div>
<?php