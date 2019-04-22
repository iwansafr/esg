<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($email))
{
	$this->load->library('email');
	$config['protocol']     = 'smtp';
	$config['smtp_host']    = 'ssl://smtp.googlemail.com';
	$config['smtp_port']    = '465';
	$config['smtp_timeout'] = '7';
	$config['smtp_user']    = 'esoftgreat@gmail.com';
	$config['smtp_pass']    = "";
	$config['charset']      = 'utf-8';
	$config['newline']      = "\r\n";
	$config['mailtype']     = 'html'; // or html
	$config['validation']   = TRUE; // bool whether to validate email or not
	$this->email->initialize($config);
	$this->email->from('esoftgreat@gmail.com', 'esoftgreat corp');
	$this->email->to($email);
	$this->email->subject('news article');
	$this->email->message($data);
	$this->email->send();
	// echo $this->email->print_debugger();
}

