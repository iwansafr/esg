<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();

$form->init('roll');
$form->setTable('admin_menu', 'id', 'DESC');
$ext = '';
if(!empty($p_id))
{
	$form->setWhere('par_id = '.$p_id);
	$data = $this->db->query('SELECT * FROM admin_menu WHERE id = ?', $p_id)->row_array();
	$ext = '?p_id='.$p_id;
}else{
	$id = $this->input->get('id');
	if(!empty($id))
	{
		$form->setWhere(' AND par_id = 0');
	}
}
$form->setHeading('<a href="'.base_url('admin/admin_menu/edit'.$ext).'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new menu</button></a>');
$form->search();
$form->order_by('sort_order', 'ASC');
$form->setField(array('title'));
$form->addInput('id','plaintext');
$form->addInput('par_id','dropdown');
$form->setLabel('par_id','parent');
$form->tableOptions('par_id','admin_menu','id','title');

$form->addInput('title','plaintext');

if(!empty($id) || !empty($p_id))
{
	$form->addInput('sort_order','text');
	$form->setAttribute('sort_order',array('type'=>'number'));
	$form->setLabel('sort_order', 'sort');
}

$form->addInput('link','link');
$form->setLink('link',base_url('admin/admin_menu'),'id');
$form->setPlaintext('link','<i class="fa fa-search"></i>  menu');
$form->setLabel('link','menu');

$form->setDelete(true);
$form->setEdit(TRUE);
$form->setEditLink(base_url('admin/admin_menu/edit?id='));
$form->setFormName('menu');
if(!empty($form->getData()['data']) || empty($_GET['keyword']))
{
	$form->form();
}else{
	echo 'no data found';
}
