<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_grid'])): ?>
	<?php $category = $home['content_grid'][0]['category']; ?>
	<div class="fancy-title title-border">
		<h3><?php echo $category['title'] ?></h3>
	</div>
	<?php $i = 1; ?>
	<?php foreach ($home['content_grid'] as $key => $value): ?>
		<?php 
		$last_col = ($i%3==0) ? true : false;
		$class = '';
		if($last_col)
		{
			$class = 'col_last';
		}

		$margin = ($i>3) ? 'nobottommargin' : '';?>
		<div class="col_one_third <?php echo $class.' '.$margin ?>">
			<div class="ipost clearfix">
				<div class="entry-image">
					<a href="<?php echo content_link($value['slug']) ?>"><img class="image_fade" src="<?php echo image_module('content',$value) ?>" alt="Image"></a>
				</div>
				<div class="entry-title">
					<h3><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h3>
				</div>
				<ul class="entry-meta clearfix">
					<li><i class="icon-calendar3"></i> <?php echo content_date($value['created']) ?></li>
					<li><a href="blog-single.html#comments"><i class="icon-eye"></i> <?php echo $value['hits'] ?></a></li>
				</ul>
				<div class="entry-content">
					<p><?php echo $value['description'] ?></p>
				</div>
			</div>
		</div>
		<?php
		if($last_col)
		{
			?>
			<div class="clear"></div>
			<?php
		}
		?>
		<?php $i++; ?>
	<?php endforeach ?>

<?php endif ?>