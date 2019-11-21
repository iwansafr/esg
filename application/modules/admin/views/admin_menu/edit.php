<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id    = $this->input->get('id');
// $po_id = $this->input->get('po_id');
$p_id  = $this->input->get('p_id');

$this->zea->init('edit');
$this->zea->setTable('admin_menu');
if(!empty($id))
{
	$this->zea->setId($id);
}
echo '<a href="'.base_url('admin/admin_menu?id='.@intval($p_id)).'" class="btn btn-default pull-right"><i class="fa fa-list"></i></a>';
$this->zea->setHeading('Admin Menu');

$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id','Menu Parent');
$this->zea->setOptions('par_id',$menu_parent);

$this->zea->addInput('title','text');
$this->zea->addInput('icon','text');
$this->zea->addInput('link','text');

$this->zea->addInput('user_role_ids','multiselect');
$this->zea->setLabel('user_role_ids', 'User Role');
$this->zea->setMultiSelect('user_role_ids','user_role','id,id,title');

$this->zea->setRequired(array('title','link'));
$this->zea->form();
