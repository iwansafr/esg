<?php if (!empty($home['content_testimonials'])): ?>
	<div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(<?php echo image_module();?>);">
		<div class="container">
			<?php
			$category = @$home['content_testimonials'][0]['category'];
			$i = 300;
			?>
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
						<span><?php echo @$category['title'] ?></span>
						<h3><?php echo @$category['description'] ?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($home['content_testimonials'] as $key => $value): ?>
					<div class="col-12 col-md-6">
						<div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
							<div class="testimonial-thumb">
								<img src="<?php echo image_module('content', $value) ?>" alt="">
							</div>
							<div class="testimonial-content">
								<h5><?php echo $value['title'] ?></h5>
								<p><?php echo $value['description'] ?></p>
								<h6><span><?php echo $value['author'] ?>,</span> Student</h6>
							</div>
						</div>
					</div>
					<?php $i++; ?>
				<?php endforeach ?>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="load-more-btn text-center wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
						<a href="<?php echo content_cat_link(@$category['slug']) ?>" class="btn academy-btn">See More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>