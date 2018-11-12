<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id    = $this->input->get('id');
$po_id = $this->input->get('po_id');
$p_id  = $this->input->get('p_id');
if(!empty($id) || (!empty($po_id) && !empty($p_id)))
{
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
	if(!empty($id))
	{
		$menu_position = $this->db->query('SELECT title FROM menu_position WHERE id = ?',@intval($data['position_id']))->row_array();
		$menu_position = $menu_position['title'];
		$this->zea->setOptions('position_id',array(@intval($data['position_id'])=>$menu_position));
	}else{
		if(!empty($po_id))
		{
			$menu_position = $this->db->query('SELECT title FROM menu_position WHERE id = ?',$po_id)->row_array();
			$menu_position = $menu_position['title'];
			$this->zea->setOptions('position_id',array($po_id=>$menu_position));
		}
	}


	$this->zea->addInput('par_id','dropdown');
	$this->zea->setLabel('par_id','Menu Parent');
	if(!empty($id))
	{
		if(!empty($data['par_id']))
		{
			$menu_title = $this->db->query('SELECT title FROM menu WHERE id = ?',@intval($data['par_id']))->row_array();
			$menu_title = $menu_title['title'];
			$this->zea->setOptions('par_id',array(@intval($data['par_id'])=>$menu_title));
		}else{
			$this->zea->setOptions('par_id', array('0'=>'None'));
		}
	}else{
		if(!empty($p_id))
		{
			$menu_position = $this->db->query('SELECT title FROM menu WHERE id = ?',$p_id)->row_array();
			$menu_position = $menu_position['title'];
			$this->zea->setOptions('par_id',array($p_id=>$menu_position));
		}else{
			$this->zea->tableOptions('par_id','menu','id','title');
		}
	}

	$this->zea->addInput('title','text');
	$this->zea->addInput('link','text');
	$this->zea->addInput('publish','checkbox');

	$this->zea->setRequired(array('title','link'));
	$this->zea->form();
}