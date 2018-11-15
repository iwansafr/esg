<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id    = $this->input->get('id');
$po_id = $this->input->get('po_id');
$p_id  = $this->input->get('p_id');
$type  = $this->input->get('type');

pr($menu_parent);
$this->zea->init('edit');
$this->zea->setTable('menu');
if(!empty($id))
{
	$this->zea->setId($id);
	$data = $this->zea->getData();
}
echo '<a href="'.base_url('admin/menu/list?id='.$po_id.'&p_id='.@intval($p_id)).'" class="btn btn-default pull-right"><i class="fa fa-list"></i> menu list</a>';
$this->zea->setHeading('Menu');
$this->zea->addInput('position_id','dropdown');
$this->zea->setLabel('position_id','Menu Position');
$this->zea->setOptions('position_id',$menu_position);

$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id','Menu Parent');
$this->zea->setOptions('par_id',$menu_parent);

$this->zea->addInput('title','text');
$this->zea->addInput('link','text');
if(empty($type))
{
	$this->zea->addInput('is_local','hidden');
	$this->zea->setValue('is_local',0);
}else{
	$this->zea->addInput('is_local','hidden');
	$this->zea->setValue('is_local',1);
}

$this->zea->addInput('publish','checkbox');

$this->zea->setRequired(array('title','link'));
$this->zea->form();
