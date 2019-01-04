<?php if (!empty($home['content_touch'])): ?>
	<?php foreach ($home['content_touch'] as $key => $value): ?>
		<div class="call-to-action-area" style="background-image: url(<?php echo image_module('content', $value) ?>);background-repeat: no-repeat;background-position: center;background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
							<h3><?php echo $value['title'] ?></h3>
							<a href="<?php echo content_link($value['slug']) ?>" class="btn academy-btn">See More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>
<?php endif ?>