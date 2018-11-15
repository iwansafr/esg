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
		$id    = $this->input->get('id');
		$po_id = $this->input->get('po_id');
		$type  = $this->input->get('type');
		$menu_position = array();
		if(!empty($id))
		{
			$menu_position = $this->db->query('SELECT title FROM menu_position WHERE id = ?',@intval($data['position_id']))->row_array();
			if(!empty($menu_position))
			{
				$menu_position = $menu_position['title'];
			}
		}else{
			if(!empty($po_id))
			{
				$menu_position = $this->db->query('SELECT title FROM menu_position WHERE id = ?',$po_id)->row_array();
				if(!empty($menu_position))
				{
					$menu_position = $menu_position['title'];
				}
			}else{
				$menu_position = $this->db->query('SELECT id,title FROM menu_position')->result_array();
				if(!empty($menu_position))
				{
					$menu_position = assoc($menu_position);
				}
			}
		}
		return $menu_position;
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
		$id   = $this->input->get('id');
		$p_id = $this->input->get('p_id');
		$data = array();
		$q    = 'SELECT id,title FROM menu';
		if(!empty($id) || !empty($p_id))
		{
			$bind = 0;
			if(!empty($id))
			{
				$q = 'SELECT id,title FROM menu WHERE id != ?';
				$bind = $id;
			}
			if(!empty($p_id))
			{
				$q = 'SELECT id,title FROM menu WHERE id = ?';
				$bind = $p_id;
			}
			$data = $this->db->query($q, $bind)->result_array();
		}else{
			$data = $this->db->query($q)->result_array();
		}
		if(!empty($data))
		{
			$data = assoc($data);
		}
		return $data;
	}
}
