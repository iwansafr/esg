<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_latest'])): ?>
	<?php $category = @$home['content_latest'][0]['category'] ?>
	<div class="content">
		<div class="sidebar-title">
			<?php echo @$category['title'] ?>
		</div>
		<div class="sidebar-body">
			<ul class="list-unstyled">
				<?php foreach ($home['content_latest'] as $key => $value): ?>
				  <li class="media">
				    <img src="<?php echo image_module('content', $value) ?>" class="mr-3 img img-responsive" style="object-fit: cover; width: 50px;height: 50px;" alt="<?php echo $value['title'] ?>">
				    <div class="media-body">
				    	<a href="<?php echo content_link($value['slug']) ?>"><h5 style="font-size: 14px; font-weight: bold;" class="mt-0 mb-1"><?php echo $value['title'] ?></h5></a>
				      <?php echo substr($value['intro'],0,10) ?>
				    </div>
				  </li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
<?php endif ?>