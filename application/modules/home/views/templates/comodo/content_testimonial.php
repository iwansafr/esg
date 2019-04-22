<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_testimonial'])): ?>
	<?php $header = $this->esg->get_config('header');?>
	<style type="text/css">
		.testimonials_area {
	    background-image: url(<?php echo image_module('config', 'header'.'/'.$header['image']) ?>);
		}
	</style>
	<section class="testimonials_area section_gap">
		<div class="container">
			<div class="testi_slider owl-carousel">
				<?php foreach ($home['content_testimonial'] as $key => $value): ?>
					<div class="testi_item">
						<img src="img/quote.png" alt="">
						<h4><?php echo @$value['title'] ?></h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p><?php echo $value['content'] ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif ?>