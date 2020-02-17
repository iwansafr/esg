<?php if (!empty($home['content_slider'])): ?>
	<section id="slider" class="slider-parallax" style="background-color: #222;">
		<div id="oc-slider" class="owl-carousel carousel-widget" data-margin="0" data-items="1" data-pagi="false" data-loop="true" data-speed="450" data-autoplay="5000">
			<?php foreach ($home['content_slider'] as $key => $value): ?>
				<a href="#"><img src="<?php echo image_module('content',$value) ?>" alt="Slider"></a>
			<?php endforeach ?>
		</div>
	</section>
<?php endif ?>