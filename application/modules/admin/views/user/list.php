<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');

$this->zea->search();

$this->zea->order_by('username','ASC');
if(!is_root())
{
	$root_id = $this->db->get_where('user_role', 'level =1 ')->row_array();
	if(!empty($root_id)){
		$root_id = $root_id['id'];
	}
	$this->zea->setWhere('user_role_id != '.$root_id.' ');
}else{
	$this->zea->setWhere('id > 0');
}
$this->zea->setField(array('username','email'));
$this->zea->setTable('user');
$this->zea->addInput('id','plaintext');
$this->zea->addInput('username','plaintext');
$this->zea->addInput('email','plaintext');
$this->zea->addInput('created','plaintext');
$this->zea->addInput('active', 'checkbox');
$this->zea->setDelete(TRUE);
$this->zea->setEdit(TRUE);
$this->zea->setEditLink(base_url('admin/user/edit?id='),'id');
$this->zea->setUrl('admin/user/clear_list');
$this->zea->form();