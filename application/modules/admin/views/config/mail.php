<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('email');
if(!empty($_POST))
{
	$this->email->from($this->email->smtp_user, @$this->esg->get_config('contact')['name']);
	$this->email->to($_POST['email']);
	$this->email->subject(@$this->esg->get_config('contact')['name']);
	$this->email->message($_POST['message']);
	$this->email->send();
	echo $this->email->print_debugger();
}
?>
<form action="" method="post">
	<label>To</label>
	<input type="email" name="email" class="form-control">
	<label>message</label>
	<textarea class="form-control" id="textckeditor" name="message"></textarea>
	<br>
	<input type="submit" name="" value="Send" class="btn btn-success">
</form>
<script type="text/javascript">
	CKEDITOR.replace('textckeditor');
</script>