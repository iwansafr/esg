<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id = $this->input->get('id');
$this->zea->setTable('menu', 'id', 'DESC');
if(!empty($id))
{
	$this->zea->setWhere('position_id = '.$id);
}
$this->zea->init('roll');
$this->zea->setHeading('<a href="'.base_url('admin/menu/edit?po_id='.$id).'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new menu</button></a>');
$this->zea->search();

$this->zea->setField(array('title'));
$this->zea->addInput('id','plaintext');
$this->zea->addInput('title','plaintext');

$this->zea->addInput('link','link');
$this->zea->setLink('link',base_url('admin/menu/list/?p_id='),'id');
// $this->zea->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$this->zea->setPlaintext('link','<i class="fa fa-search"></i>  menu');
$this->zea->setLabel('link','menu');

$this->zea->setEditLink('position?id=');

$this->zea->setDelete(true);
$this->zea->setEdit(TRUE);
$this->zea->setEditLink(base_url('admin/menu/edit?po_id='.$id.'&id='));

$this->zea->form();
