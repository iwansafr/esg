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
			$today = date('Y-m-d');
			$check = $this->db->query("SELECT id FROM message WHERE email = ? AND created LIKE '{$today}%'", $data['email'])->num_rows();
			if($check > 4)
			{
				$output = 'You have Reach 5 maximum send messsage per day, please contact admin';
			}else{
				if($this->db->query('INSERT INTO message (name,email,subject,message) VALUES (?,?,?,?)', $data))
				{
					$output = 'OK';
				}
			}
			return $output;
		}
	}

}