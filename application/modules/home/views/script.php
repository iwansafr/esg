<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->esg->extra_js();
$script = @$this->esg->get_config($this->esg->get_esg('templates')['public_template'].'_script')['script'];

$this->esg->script();
if(!empty($script))
{
	echo $script;
}