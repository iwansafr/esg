<?php 
if(!empty($home['content_top']))
{
	$category = @$home['content_top'][0]['category'];
	$spc = ($category['title'] == 'Most Popular') ? 'popular' : '';
	$content_top_data = array();
	foreach($home['content_top'] AS $key => $value)
	{
		if($key > 0)
		{
			$content_top_data[] = $value;
		}
	}
	?>
	<div class="card top-border mt-3">
	  <div class="card-header">
	    <a href="<?php echo content_cat_link(@$category['slug'], $spc, $spc) ?>"><?php echo @$category['title'] ?></a>
	  </div>
	  <ul class="list-group list-group-flush">
	  	<div class="container-fluid">
		  	<div class="row">
			  	<div class="col-xl-6 px-0">
						<div id="slider_top" class="carousel slide m-3" data-ride="carousel">
						  <div class="carousel-inner">
						    <?php 
						    if(!empty($home['content_top'][0]['images']))
						    {
						    	$images = json_decode($home['content_top'][0]['images']);
							    foreach ($images as $key => $value) 
							    {
							      $class = ($key == 1) ? 'active' : '';
							      ?>
							      <div class="carousel-item <?php echo $class ?>">
							        <img class="slider d-block w-100" src="<?php echo image_module('content/gallery/'.$home['content_top'][0]['id'], $value) ?>" alt="Slide" >
							      </div>
							      <?php
							    }
						    }?>
						  </div>
						  <a class="carousel-control-prev" href="#slider_top" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#slider_top" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<a href="<?php echo content_link($home['content_top'][0]['slug']) ?>"><h6><?php echo $home['content_top'][0]['title'] ?></h6></a>
				    			<div class="clearfix"></div>
				    			<span class="xs-title">
				    				<?php echo content_date($home['content_top'][0]['created']) ?> | <?php echo @$category['title'] ?>
				    			</span>
				    			<p class="xs-title">
				    				<?php echo $home['content_top'][0]['intro'] ?>
				    			</p>
								</div>							
							</div>
						</div>
			  	</div>
			  	<div class="col-xl-6 px-0 content_list">
				  	<?php
						foreach ($content_top_data as $key => $value) 
						{
							?>
					    <li class="list-group-item">
					    	<div class="container">
						    	<div class="row">
						    		<div class="col-2">
						    			<img src="<?php echo image_module('content', $value) ?>" class="thumbnail">
						    		</div>
						    		<div class="col-10">
						    			<a href="<?php echo content_link($value['slug']) ?>" class="sm-title"><?php echo $value['title'] ?></a>
						    			<div class="clearfix"></div>
						    			<span class="xs-title">
						    				<?php echo content_date($value['created']) ?> | <?php echo @$category['title'] ?>
						    			</span>
						    		</div>
						    	</div>
					    	</div>
					    </li>
				    	<?php 
				    } 
					  ?>
			  	</div>
		  	</div>
	  	</div>
	  </ul>
	</div>
	<?php
}