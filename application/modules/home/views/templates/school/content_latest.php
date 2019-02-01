<?php 
if(!empty($home['content_latest']))
{
	$category = $home['content_latest'][0]['category'];
	?>
	<div class="card my-3">
	  <div class="card-header main-color">
	    <?php echo @$category['title'] ?>
	  </div>
	  <ul class="list-group list-group-flush">
	  	<?php
			foreach ($home['content_latest'] as $key => $value) 
			{
				?>
		    <li class="list-group-item px-0">
		    	<div class="container">
			    	<div class="row">
			    		<div class="col-md-3 col-2">
			    			<img src="<?php echo image_module('content', $value);?>" class="thumbnail">
			    		</div>
			    		<div class="col-md-9 col-10">
			    			<a href="<?php echo content_link($value['slug']) ?>" class="sm-title"><?php echo $value['title'] ?></a>
			    			<div class="clearfix"></div>
			    			<span class="xs-title">
			    				<?php echo content_date($value['created']) ?> | <?php echo $category['title'] ?>
			    			</span>
			    		</div>
			    	</div>
		    	</div>
		    </li>
	    	<?php 
	    } 
		  ?>
	  </ul>
	</div>
	<?php
}