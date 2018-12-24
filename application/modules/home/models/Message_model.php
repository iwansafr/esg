<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->model('esg_model');
	}
	
	public function send()
	{
		if(!empty($_POST))
		{
			$data = $_POST;
			$output = 'Your Message Failed to Sent';
			if($this->db->query('INSERT INTO message (name,email,subject,message) VALUES (?,?,?,?)', $data))
			{
				$output = 'OK';
			}
			return $output;
		}
	}

}