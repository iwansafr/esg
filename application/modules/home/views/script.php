<?php defined('BASEPATH') OR exit('No direct script access allowed');
$script = @$this->esg->get_config($this->esg->get_esg('templates')['public_template'].'_script')['script'];

if(!empty($script))
{
	echo $script;
}