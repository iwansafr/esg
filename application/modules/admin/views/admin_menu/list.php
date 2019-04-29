<?php defined('BASEPATH') OR exit('No direct script access allowed');
$form = new zea();

$form->init('roll');
// $form->setTable('admin_menu', 'id', 'DESC');
$form->setTable('admin_menu');
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
	}else if($id == 0 AND isset($_GET['id']))
	{
		$form->setWhere(' par_id = 0');
	}
}
$back_button = '';
if(!empty($data_menu))
{
	$back_button = ' | <a href="'.base_url('admin/admin_menu/?id='.$data_menu['par_id']).'"><button class="btn btn-sm btn-default"><i class="fa fa-level-up-alt"></i></button></a><div class="clearfix">';
}
$form->setHeading('<a href="'.base_url('admin/admin_menu/edit'.$ext).'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i></button></a>'.$back_button);
$form->search();
$form->order_by('sort_order', 'ASC');
$form->setField(array('title'));
$form->addInput('id','plaintext');
$form->addInput('par_id','dropdown');
$form->setLabel('par_id','parent');
$form->tableOptions('par_id','admin_menu','id','title');

$form->addInput('title','plaintext');

$form->addInput('sort_order','text');
$form->setAttribute('sort_order',array('type'=>'number'));
$form->setLabel('sort_order', 'sort');

$form->addInput('link','link');
$form->setLink('link',base_url('admin/admin_menu'),'id');
$form->setPlaintext('link','<i class="fa fa-search"></i>  menu');
$form->setLabel('link','menu');

$form->setDelete(true);
$form->setEdit(TRUE);
$form->setEditLink(base_url('admin/admin_menu/edit?p_id='.@intval($_GET['id']).'&id='));
$form->setUrl('admin/admin_menu/clear_list');
$form->setFormName('menu');
if(!empty($form->getData()['data']) || empty($_GET['keyword']))
{
	$form->form();
}else{
	echo 'no data found';
}
