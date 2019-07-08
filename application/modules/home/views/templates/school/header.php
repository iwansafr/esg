<?php defined('BASEPATH') OR exit('No direct script access allowed');
$header = $this->esg->get_config('header');
if(!empty($header['image']))
{
	?>
	<img src="<?php echo image_module('config','header'.'/'.$header['image']) ?>" style="width: 100%;" class="img-fluid img" alt="">
	<?php
}
?>