<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
	public function get_detail($id = 0)
	{
		$data = array();
		$id = !empty($id) ? $id : $this->input->get('id');
		if(!empty($id))
		{
			$data = $this->db->get_where('invoice', ['id'=>$id])->row_array();
		}
		return $data;
	}
}