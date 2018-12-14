<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($home['content_hot']))
{
	foreach ($home['content_hot'] as $key => $value)
	{
		?>
		<div class="container-fluid">
	    <div class="section-header">
	    	<a href="<?php echo content_link($value['slug']) ?>"><h3 class="section-title"><?php echo $value['title'] ?></h3></a>
	      <span class="section-divider"></span>
	      <p class="section-description">
	        <?php echo $value['description'] ?>
	      </p>
	    </div>

	    <div class="row">
	      <div class="col-lg-6 about-img wow fadeInLeft">
	        <img src="<?php echo image_module('content', $value['id'].'/'.$value['image'])?>" alt="">
	      </div>

	      <div class="col-lg-6 content wow fadeInRight">
	        <?php echo $value['content'] ?>
	      </div>
	    </div>
	  </div>
		<?php
	}
}