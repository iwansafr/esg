<?php
if(!empty($home['content_top']))
{
	$data = $home['content_top'][0];
	?>
	<div class="jumbotron">
	  <h1 class="display-4"><?php echo $data['title'] ?></h1>
	  <p class="lead"><?php echo $data['intro'] ?></p>
	  <hr class="my-4">
	  <p><?php echo @$data['keyword'] ?></p>
	  <a class="btn btn-primary btn-lg" href="<?php echo content_link($data['slug']) ?>" role="button">read more</a>
	</div>
	<?php
}