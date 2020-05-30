<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($content['tpl']))
{
	$this->load->view($content['tpl'],['content'=>$content]);
}else{
	if(!empty($content))
	{
		$this->load->view('default_detail',['content'=>$content]);	
	}else{
		echo '<br>';
		echo '<div class="container">';
		msg('Halaman Tidak ditemukan','danger');
		echo '</div>';
	}
}
