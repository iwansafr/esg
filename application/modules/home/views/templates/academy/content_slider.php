<?php if (!empty($home['content_slider'])): ?>
	<section class="hero-area">
		<div class="hero-slides owl-carousel">
			<?php foreach ($home['content_slider'] as $key => $value): ?>
				<div class="single-hero-slide bg-img" style="background-image: url(<?php echo image_module('content',$value) ?>);">
					<div class="container h-100">
						<div class="row h-100 align-items-center">
							<div class="col-12">
								<div class="hero-slides-content">
									<h4 data-animation="fadeInUp" data-delay="100ms"><?php echo $value['intro'] ?></h4>
									<h2 data-animation="fadeInUp" data-delay="400ms"><?php echo $value['title'] ?></h2>
									<a href="<?php echo content_link($value['slug']) ?>" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
<?php endif ?>