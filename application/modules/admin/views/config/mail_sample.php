<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($_POST))
{
	$this->load->library('email');
	$config['protocol']    = 'smtp';
	$config['smtp_host'] = 'ssl://mail.esoftgreat.com';
	$config['smtp_port']    = '465';
	$config['smtp_timeout'] = '7';
	$config['smtp_user']    = 'support@esoftgreat.com';
	$config['smtp_pass']    = "";
	$config['charset']    = 'utf-8';
	$config['newline']    = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not
	$this->email->initialize($config);
	$this->email->from('support@esoftgreat.com', 're:esoftgreat');
	$this->email->to($_POST['email']);
	$this->email->subject('Email Test');
	$this->email->message($_POST['message']);
	$this->email->send();
	echo $this->email->print_debugger();
}
?>
<form action="" method="post">
	<label>To</label>
	<input type="email" name="email" class="form-control">
	<label>message</label>
	<textarea class="form-control" name="message"></textarea>
	<br>
	<input type="submit" name="" value="Send" class="btn btn-success">
</form>