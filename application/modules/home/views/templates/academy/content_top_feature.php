<?php if (!empty($home['content_top_feature'])): ?>
	<div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="features-content">
						<div class="row no-gutters">
							<?php foreach ($home['content_top_feature'] as $key => $value): ?>
								<div class="col-12 col-md-4">
									<div class="single-top-features d-flex align-items-center justify-content-center">
										<i class="<?php echo $value['icon'] ?>"></i>
										<h5><?php echo $value['title'] ?></h5>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>