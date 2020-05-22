<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($content['tpl']))
{
	$this->load->view($content['tpl'],['content'=>$content]);
}else{
	$this->load->view('default_detail',['content'=>$content]);	
}
