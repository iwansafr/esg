<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php if (!empty($home['content'])): ?>
	<?php $category = @$home['content'][0]['category'] ?>
	<div class="artikel" style="padding: 10px;">
		<h5><?php echo @$category['title'] ?></h5>
		<hr style="margin: 30px 0;">
		<?php foreach ($home['content'] as $key => $value): ?>
			<article>
				<div class="artikel-item">
					<div class="text" style="width: 70%;float: left;">
						<a href="<?php echo content_link($value['slug']) ?>" style="color: #333;"><h3 style="font-weight: bold;"><?php echo $value['title'] ?></h3></a>
						<p><?php echo $value['intro'] ?>...</p>
						<a style="margin-right: 20px;" class="a"><?php echo content_date($value['created']) ?></a><a class="a"><?php echo $value['author'] ?></a>
					</div>
					<div class="artikel-image" style="width: 30%;background: #444;float: left;">
						<img src="<?php echo image_module('content',$value) ?>" class="img img-responsive" style="object-fit: cover; height: 180px;width: 238px;" alt="">
					</div>
				</div>
				<div style="clear: both;"></div>
				<hr style="margin: 30px 0;">
			</article>
		<?php endforeach ?>
	</div>
<?php endif ?>