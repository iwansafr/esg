<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->model('esg_model');
	}
	
	public function subscribe()
	{
		if(!empty($this->input->post()))
		{
			$data = $this->input->post();
			$output['msg'] = 'Your Subscribtion is Failed';
			$output['alert'] = 'danger';
			$check = $this->db->query('SELECT email FROM subscriber WHERE email = ?', @$data['email'])->num_rows();
			if($check > 0)
			{
				$output['msg'] = 'You have Subscribe US before';
				$output['alert'] = 'warning';
			}else{
				if($this->db->query('INSERT INTO subscriber (email) VALUES (?)', $data['email']))
				{
					$output['msg'] = 'Your Subscribtion Successfully';
					$output['alert'] = 'success';
				}
			}
			return $output;
		}
	}

}