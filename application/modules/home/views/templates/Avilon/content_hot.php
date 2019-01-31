<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_hot']))
{
	$category = @$home['content_hot'][0]['category'];
	?>
	<section id="about" class="section-bg">
		<div class="container-fluid">
	    <div class="section-header">
	    	<?php 
	    	if(!empty($category))
	    	{
		    	?>
		    	<a href="<?php echo content_cat_link(@$category['slug']) ?>"><h3 class="section-title"><?php echo $category['title'] ?></h3></a>
		      <span class="section-divider"></span>
		      <p class="section-description">
		        <?php echo @$category['description'] ?>
		      </p>
	    		<?php
	    	}
	    	?>
	    </div>
	    <?php 
	    foreach ($home['content_hot'] as $key => $value) 
	    {
		    ?>
		    <div class="row">
		      <div class="col-lg-6 about-img wow fadeInLeft">
		        <img src="<?php echo image_module('content', $value)?>" alt="">
		      </div>

		      <div class="col-lg-6 content wow fadeInRight">
		      	<a href="<?php echo content_link($value['slug']) ?>"><h2><?php echo $value['title'] ?></h2></a>
		        <?php echo $value['content'] ?>
		      </div>
		    </div>
		    <br>
		    <br>
	    	<?php
	    }
	    ?>
	  </div>
	</section>
	<?php
}