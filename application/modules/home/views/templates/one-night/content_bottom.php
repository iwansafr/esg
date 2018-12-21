<?php
if(!empty($home['content_bottom']))
{
	?>
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active" href="">category</a>
	  </li>
	  <li class="nav-item">
	  	<marquee><a class="nav-link" href=""><?php echo @$home['content_bottom'][0]['category']['title'] ?></a></marquee>
	  </li>
	</ul>
	<hr>
	<div class="card-group">
		<div class="row">
			<?php
			foreach ($home['content_bottom'] as $key => $value)
			{
				?>
				<div class="col-6 col-md-4">
				  <div class="card">
				    <img class="img-grid card-img-top" src="<?php echo image_module('content', $value['id'].'/'.$value['image']) ?>" alt="<?php echo $value['title'] ?>">
				    <div class="card-body">
				    	<h5 class="card-title"><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h5>
				      <p style="font-size: 12px;"><?php echo $value['intro'] ?></p>
				    </div>
						<div class="card-footer">
			      	<small class="text-muted">created on <?php echo content_date($value['created']); ?></small>
						</div>
				  </div>
					<hr>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}