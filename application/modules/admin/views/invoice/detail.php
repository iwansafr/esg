<?php defined('BASEPATH') OR exit('No direct script access allowed');
$invoice_config = $this->esg->get_config('invoice_config');
if(!empty($invoice_config['template'])){
	$this->load->view($invoice_config['template']);
}else{
	$this->load->view('template_default');
}