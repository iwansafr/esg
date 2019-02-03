<?php if (!empty($home['content_popular_course'])): ?>
	<div class="top-popular-courses-area section-padding-100-70">
		<div class="container">
			<?php
			$category = @$home['content_popular_course'][0]['category'];
			$i = 300;
			?>
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
						<span><?php echo @$category['title'] ?></span>
						<h3><?php echo @$category['description'] ?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($home['content_popular_course'] as $key => $value): ?>
					<div class="col-12 col-lg-6">
						<div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
							<div class="popular-course-content">
								<h5><?php echo $value['title'] ?></h5>
								<span>By <?php echo $value['author'] ?>  |  <?php echo content_date($value['created']) ?></span>
								<div class="course-ratings">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
								</div>
								<p><?php echo $value['intro'] ?></p>
								<a href="<?php echo content_link($value['slug']) ?>" class="btn academy-btn btn-sm">See More</a>
							</div>
							<div class="popular-course-thumb bg-img" style="background-image: url(<?php echo image_module('content', $value) ?>);"></div>
						</div>
					</div>
					<?php $i++; ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>