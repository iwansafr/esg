<?php defined('BASEPATH') OR exit('No direct script access allowed');
$invoice_config = $this->esg->get_config('invoice_config');
if(!empty($data)){
	if(!empty($invoice_config['template'])){
		$this->load->view($invoice_config['template']);
	}else{
		$this->load->view('template_default');
	}
}else{
	$this->load->view('templates/AdminLTE/meta');
	msg('data tidak ditemukan','danger');
}