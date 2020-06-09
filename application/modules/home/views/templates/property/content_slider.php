<?php if (!empty($home['content_slider'])): ?>
	<section id="slider" class="boxed-slider">
		<div class="clearfix">
			<div class="fslider" data-easing="easeInQuad">
				<div class="flexslider">
					<div class="slider-wrap">
						<?php foreach ($home['content_slider'] as $key => $value): ?>
							<?php $image_slider = image_module('content',$value); ?>
							<div class="slide" data-thumb="<?php echo $image_slider ?>">
								<a href="#">
									<img src="<?php echo $image_slider; ?>" alt="Slide 2">
									<!-- <h1 style="position: absolute;top: 30%;left: 30%; color: white; text-shadow: 1px black;"><?php echo $value['title'] ?></h1> -->
										<!-- <div class="slider-caption slider-caption-center" style="position: absolute;top:50%;">
											<h2 data-caption-animate="fadeInUp" style="text-shadow: 2px 2px #444; color: white;"><?php echo $value['title'] ?></h2>
											<p data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow: 2px 2px #444;color: white;"><?php echo $value['description'] ?></p>
										</div> -->
								</a>
							</div>
						<?php endforeach ?>	
					</div>
				</div>
			</div>

		</div>

	</section>
<?php endif ?>