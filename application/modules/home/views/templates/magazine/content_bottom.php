<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_bottom'])): ?>
	<?php 
	$category= $home['content_bottom'][0]['category'];
	?>	
	<div class="widget clearfix">
		<h4><?php echo $category['title'] ?></h4>
		<div id="post-list-footer">
			<?php foreach ($home['content_bottom'] as $key => $value): ?>
				<div class="spost clearfix">
					<div class="entry-c">
						<div class="entry-title">
							<h4><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h4>
						</div>
						<ul class="entry-meta">
							<!-- <li><?php echo content_date($value['created']) ?></li> -->
						</ul>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
<?php endif ?>