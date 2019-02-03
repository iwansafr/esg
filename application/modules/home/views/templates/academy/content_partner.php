<?php if (!empty($home['content_partner'])): ?>
	<div class="partner-area section-padding-0-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
						<?php foreach ($home['content_partner'] as $key => $value): ?>
							<a href="<?php echo content_link($value['slug']) ?>"><img src="<?php echo image_module('content', $value) ?>" alt="<?php echo $value['title'] ?>"></a>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>