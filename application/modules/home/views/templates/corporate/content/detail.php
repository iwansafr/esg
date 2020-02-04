<?php if (!empty($content)): ?>
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="single-post nobottommargin">
				<div class="entry clearfix">
					<div class="entry-title">
						<h2><?php echo $content['title'] ?></h2>
					</div>
					<ul class="entry-meta clearfix">
						<li><i class="icon-calendar3"></i> <?php echo content_date($content['created']) ?></li>
						<li><a href="#"><i class="icon-user"></i> <?php echo $content['author'] ?></a></li>
						<?php if (!empty($content['cat'])): ?>
							<li><i class="icon-folder-open"></i> 
								<?php $cat_i = 0 ?>
								<?php foreach ($content['cat'] as $cat_key => $cat_value): ?>
									<?php echo $cat_i > 0 ? ', ': ''; ?>
									<a href="<?php echo content_cat_link($cat_value['slug']) ?>"><?php echo $cat_value['title'] ?></a>
									<?php $cat_i++; ?>
								<?php endforeach ?>
							</li>
						<?php endif ?>
						<!-- <li><a href="#"><i class="icon-comments"></i> 0 Comments</a></li> -->
						<li><a href="#"><i class="icon-camera-retro"></i> <?php echo $content['hits'] ?></a></li>
					</ul>
					<div class="entry-image bottommargin">
						<a href="<?php echo content_link($content['slug']) ?>"><img src="<?php echo image_module('content', $content) ?>" alt="<?php echo $content['title'] ?>"></a>
					</div>
					<div class="entry-content notopmargin">
						<?php echo $content['content'] ?>
						<div class="tagcloud clearfix bottommargin">
							<?php if (!empty($content['tag'])): ?>
								<?php foreach ($content['tag'] as $tag_key => $tag_value): ?>
									<a href="<?php echo content_tag_link($tag_value['title']) ?>"><?php echo $tag_value['title'] ?></a>
								<?php endforeach ?>
							<?php endif ?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<?php msg('Halaman Tidak Ditemukan','danger') ?>
<?php endif ?>