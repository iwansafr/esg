<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($msg))
{
	msg(@$msg['msg'], @$msg['alert']);
}else{
	msg('please input your valid email to subscribe','danger');
}