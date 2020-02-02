<?php if (!empty($home['content_slider'])): ?>
	<section id="slider" class="slider-parallax swiper_wrapper clearfix" style="height: 600px;">
		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<?php foreach ($home['content_slider'] as $key => $value): ?>
					<div class="swiper-slide dark" style="background-image: url('<?php echo image_module('content', $value);?>')">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp" style="text-shadow: 2px 2px #444;"><?php echo $value['title'] ?></h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 2px 2px #444;"><?php echo $value['description'] ?></p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
			<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
			<div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
		</div>
	</section>
<?php endif ?>