<?php defined('BASEPATH') OR exit('No direct script access allowed');
$public_template = $this->esg->get_esg('templates')['public_template'];
// pr($this->esg->get_esg());die();
if(is_dir(FCPATH.'application/modules/home/views/templates/'.$public_template))
{
	$this->load->view('templates'.DIRECTORY_SEPARATOR.$public_template.DIRECTORY_SEPARATOR.'index', $this->esg->get_esg());
}else{
	$this->load->view('home/error', ['msg'=>'templates not found']);
}