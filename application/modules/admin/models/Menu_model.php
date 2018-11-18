<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function menu_position()
	{
		$po_id = $this->input->get('po_id');
		$data  = array();
		$q     = 'SELECT id,title FROM menu_position';

		if(!empty($po_id))
		{
			$bind = $po_id;
			$q    = 'SELECT id,title FROM menu_position WHERE id = ?';
		}else{
			$bind = 0;
		}
		$data = $this->db->query($q,$bind)->result_array();
		if(!empty($data))
		{
			$data = assoc($data);
		}
		return $data;
	}

	public function get_menu($id = 0)
	{
		$data = array();
		if(!empty($id))
		{
			$data = $this->db->query('SELECT * FROM menu WHERE id = ?', $id);
		}
		return $data;
	}

	public function menu_parent()
	{
		$id    = $this->input->get('id');
		$p_id  = $this->input->get('p_id');
		$po_id = $this->input->get('po_id');
		$data  = array('0'=>'None');
		$q     = 'SELECT id,title FROM menu';
		$bind  = array();
		$ext   = '';

		if(!empty($po_id))
		{
			$ext = ' AND position_id = ?';
			$bind = array($po_id);
		}

		if(!empty($id) || !empty($p_id))
		{
			if(!empty($id))
			{
				$q = 'SELECT id,title FROM menu WHERE id != ?'.$ext;
				$id = array($id);
				$bind = array_merge($id,$bind);
			}
			if(!empty($p_id))
			{
				$q = 'SELECT id,title FROM menu WHERE id = ?'.$ext;
				$p_id = array($p_id);
				$bind = array_merge($p_id,$bind);
			}
		}else if(!empty($po_id)){
			$q = 'SELECT id,title FROM menu WHERE position_id = ?';
		}
		$tmp_data = $this->db->query($q, $bind)->result_array();
		if(!empty($tmp_data))
		{
			$tmp_data = assoc($tmp_data);
			$data = array_merge($data, $tmp_data);
		}

		return $data;
	}
}
