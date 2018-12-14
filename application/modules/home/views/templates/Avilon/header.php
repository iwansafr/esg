<?php defined('BASEPATH') OR exit('No direct script access allowed');
$header = $this->esg->get_config('header');
if(!empty($header))
{
	?>
	<style type="text/css">
		#intro {
	    width: 100%;
	    height: 100vh;
	    background: linear-gradient(45deg, rgba(29, 224, 153, 0.8), rgba(29, 200, 205, 0.8)), url(<?php echo image_module('config','header'.'/'.$header['image']) ?>) center top no-repeat;
	    background-size: cover;
	    position: relative;
		}
	</style>
	<h2><?php echo $header['title'] ?></h2>
	<p><?php echo $header['description'] ?></p>
	<a href="#about" class="btn-get-started scrollto">Get Started</a>
	<?php
}