<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');
$this->zea->setTable('menu', 'id', 'DESC');
$ext = '';
if(!empty($p_id))
{
	$this->zea->setWhere('par_id = '.$p_id);
	$data = $this->db->query('SELECT * FROM menu WHERE id = ?', $p_id)->row_array();
	$id = @$data['position_id'];
	$ext = '&p_id='.$p_id;
}else{
	$id = $this->input->get('id');
	if(!empty($id))
	{
		$this->zea->setWhere('position_id = '.$id.' AND par_id = 0');
	}
}
$this->zea->setHeading('<a href="'.base_url('admin/menu/edit?po_id='.$id.$ext).'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new menu</button></a>');
$this->zea->search();

$this->zea->setField(array('title'));
$this->zea->addInput('id','plaintext');
$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id','parent');
$this->zea->tableOptions('par_id','menu','id','title');
// $this->zea->setAttribute('par_id','disabled');

$this->zea->addInput('position_id','dropdown');
$this->zea->setLabel('position_id','Menu Position');
$this->zea->tableOptions('position_id','menu_position','id','title');
$this->zea->setAttribute('position_id','disabled');

$this->zea->addInput('title','plaintext');

$this->zea->addInput('link','link');
$this->zea->setLink('link',base_url('admin/menu'),'id');
// $this->zea->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$this->zea->setPlaintext('link','<i class="fa fa-search"></i>  menu');
$this->zea->setLabel('link','menu');

$this->zea->setEditLink('position?id=');

$this->zea->setDelete(true);
$this->zea->setEdit(TRUE);
$this->zea->setEditLink(base_url('admin/menu/edit?id='));

$this->zea->form();
