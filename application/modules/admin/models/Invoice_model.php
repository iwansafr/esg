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

	public function graphics()
	{
		$data = [];
		$this->db->where(['MONTH(created)'=>date('m'),'YEAR(created)'=>date('Y'),'status'=>1]);
		$data['month_paid'] = $this->db->get('invoice')->result_array();
		$data['month_paid_venue'] = [];
		if(!empty($data['month_paid']))
		{
			foreach ($data['month_paid'] as $key => $value) 
			{
				$money = explode(',',$value['items']);
				foreach ($money as $mkey => $mvalue)
				{
					$items = explode('=', $mvalue);
					if(!isset($data['month_paid_venue'][$items[0]])){
						$data['month_paid_venue'][$items[0]] = 0;
					}
					$ppn = $value['ppn'] == 1 ? $items[1]*0.1 : 0;
					$data['month_paid_venue'][$items[0]] += @intval($items[1]) + $ppn;
				}
			}
			$data['month_venue_total'] = 0;
			foreach ($data['month_paid_venue'] as $key => $value) 
			{
				$data['month_venue_total'] += $value;
			}
		}
		return $data;
	}
}