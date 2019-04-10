<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}
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
	public function save()
	{
		$last_id = $this->zea->get_insert_id();
		if(!empty($last_id))
		{
			$code = time();
			$this->zea->set_data('invoice', $last_id, ['code'=>$code]);
		}
	}
	public function get_bank()
	{
		return $this->db->get('bank_account')->result_array();
	}
}