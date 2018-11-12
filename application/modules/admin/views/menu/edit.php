<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id    = $this->input->get('id');
$po_id = $this->input->get('po_id');
$p_id = $this->input->get('p_id');
if(!empty($id))
{
	$this->zea->setId($id);
}
$this->zea->init('edit');
$this->zea->setTable('menu');


$this->zea->setHeading('Menu');
$this->zea->addInput('position_id','dropdown');
$this->zea->setLabel('position_id','Menu Position');
if(!empty($po_id))
{
	$menu_position = $this->db->query('SELECT title FROM menu_position WHERE id = ?',$po_id)->row_array();
	$menu_position = $menu_position['title'];
	$this->zea->setOptions('position_id',array($po_id=>$menu_position));
	$this->zea->setAttribute('position_id','disabled');
}

$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id','Menu Parent');
if(!empty($p_id))
{
	$menu_position = $this->db->query('SELECT title FROM menu WHERE id = ?',$p_id)->row_array();
	$menu_position = $menu_position['title'];
	$this->zea->setOptions('par_id',array($p_id=>$menu_position));
	$this->zea->setAttribute('par_id','disabled');
}else{
	$this->zea->tableOptions('par_id','menu','title','id');
}

$this->zea->addInput('title','text');
$this->zea->setRequired('All');
$this->zea->form();