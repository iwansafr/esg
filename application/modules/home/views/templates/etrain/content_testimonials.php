<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_testimonials'])): ?>
	<section class="testimonial_part">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-5">
					<div class="section_tittle text-center">
						<p><?php echo @$home['content_testimonials'][0]['category']['description'] ?></p>
						<h2><?php echo @$home['content_testimonials'][0]['category']['title'] ?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="textimonial_iner owl-carousel">
						<?php foreach ($home['content_testimonials'] as $key => $value): ?>
							<div class="testimonial_slider">
								<div class="row">
									<div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
										<div class="testimonial_slider_text">
											<p><?php echo $value['content'] ?></p>
											<h4><?php echo $value['title'] ?></h4>
											<h5><?php echo $value['author'] ?></h5>
										</div>
									</div>
									<div class="col-lg-4 col-xl-2 col-sm-4">
										<div class="testimonial_slider_img">
											<img src="<?php echo image_module('content',$value) ?>" alt="#">
										</div>
									</div>
									<?php if (empty(@$home['content_testimonials'][$key+1]['content'])): ?>
									<?php $data = @$home['content_testimonials'][0]; ?>
									<?php else: ?>
									<?php $data = @$home['content_testimonials'][$key+1]; ?>
									<?php endif ?>
									<div class="col-xl-4 d-none d-xl-block">
										<div class="testimonial_slider_text">
											<?php echo @$data['content'] ?>
											<h4><?php echo @$data['title'] ?></h4>
											<h5><?php echo @$data['author'] ?></h5>
										</div>
									</div>
									<div class="col-xl-2 d-none d-xl-block">
										<div class="testimonial_slider_img">
											<img src="<?php echo image_module('content',@$data) ?>" alt="#">
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>