<?php if (!empty($home['content_views'])): ?>
<div class="container">
	<div class="widget clearfix">
		<?php if (!empty($home['content_views'][0]['category'])): ?>
			<center>
				<div class="fancy-title title-dotted-border">
					<h1 class="highlight-me"><?php echo $home['content_views']['0']['category']['title'] ?></h1>
				</div>
			</center>

		<?php endif ?>
		<div class="fslider testimonial noborder nopadding noshadow" data-animation="slide" data-arrows="false">
			<div class="flexslider">
				<div class="slider-wrap">
					<?php foreach ($home['content_views'] as $key => $value): ?>
						<div class="slide">
							<div class="col-md-4">
								<center>
									<img src="<?php echo image_module('content',$value) ?>" style="object-fit: cover;height: 250px;width:250px; border-radius: 50%;" alt="Customer Testimonails">
								</center>
							</div>
							<div class="col-md-8">
								<h2><?php echo $value['title'] ?></h2>
								<p style="font-size: 16px;"><?php echo $value['description'] ?></p>
							</div>
						</div>
					<?php endforeach ?>							
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif ?>
		