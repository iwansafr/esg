<?php if (!empty($home['content_course'])): ?>
	<div class="academy-courses-area section-padding-100-0">
			<div class="container">
				<div class="row">
					<?php $i = 300; ?>
					<?php foreach ($home['content_course'] as $key => $value): ?>
						<div class="col-12 col-sm-6 col-lg-4">
							<div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
								<div class="course-icon">
									<i class="<?php echo $value['icon'] ?>"></i>
								</div>
								<div class="course-content">
									<h4><?php echo $value['title'] ?></h4>
									<p><?php echo $value['description'] ?></p>
								</div>
							</div>
						</div>
						<?php $i++; ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
<?php endif ?>