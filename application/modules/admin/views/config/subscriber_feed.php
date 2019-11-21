<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('email');
if(!empty($email))
{
	$this->email->from('esoftgreat@gmail.com', 'esoftgreat corp');
	$this->email->to($email);
	$this->email->subject('news article');
	$this->email->message($data);
	$this->email->send();
	// echo $this->email->print_debugger();
}

