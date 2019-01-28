<?php
$data['link'] = base_url($this->esg->get_esg('navigation')['string']);
$ata['meta'] = $this->esg->get_esg('meta');
if(@$_SERVER['SERVER_NAME'] == 'localhost')
{
	$data['link_template'] = base_url().'templates/'.$templates['public_template'];
}else{
	$data['link_template'] = 'https://templates.esoftgreat.com/'.$templates['public_template'];
}

$data['module'] = '';
$data['description'] = @$meta['description'];
if(!empty($navigation['array'][1]))
{
	if($navigation['array'][0] == 'tag')
	{
		$data['module'] = 'content_tag';
	}else{
		$data['module'] = 'content_cat';
	}
}else{
	$data['module'] = 'content';
}
if($mod['content'] == 'home/index')
{
	$data['image'] = image_module('config/site', $meta['icon']);
}else{
	if($data['module'] == 'content_tag')
	{
		$data['image'] = image_module($data['module'],$meta['image'], 1);
	}else{
		$data['image'] = image_module($data['module'],$meta);
	}
	$data['description'] = @$this->esg->get_esg('site')['title'];
}
$this->load->view('templates'.DIRECTORY_SEPARATOR.$templates['public_template'].DIRECTORY_SEPARATOR.'meta', $data);