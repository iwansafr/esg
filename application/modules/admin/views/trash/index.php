<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();

$is_root = is_root();
$form->init('roll');
$form->setTable('trash');
$form->search();
if(!$is_root)
{
	$form->setWhere('user_id = '.$_SESSION[base_url('_logged_in')]['id']);
}
$form->setNumbering(true);
$form->addInput('id','plaintext');
$form->setLabel('id','action');
$form->setPlainText('id','
	<div class="dropdown">
	  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			Action
	    <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
	  	<li><a href="'.base_url('admin/trash/detail/').'{id}/detail"><i class="fa fa-search"></i>Detail</a></li>
	    <li><a href="'.base_url('admin/trash/restore/{id}/restore').'"><i class="fa fa-recycle"></i>Restore</a></li>
	  </ul>
	</div>
	');
$form->addInput('table_title','plaintext');
$form->setLabel('table_title','module');
$form->addInput('table_content','plaintext');
$form->setLabel('table_content','content');
$form->addInput('created','plaintext');
$form->setLabel('created','waktu hapus');

if($is_root)
{
	$form->addInput('user_id','dropdown');
	$form->tableOptions('user_id','user','id','username');
	$form->setAttribute('user_id','disabled');
	$form->setLabel('user_id','user');
}

$form->setUrl('admin/trash/clear_index');
$form->setDelete(TRUE);

$form->form();