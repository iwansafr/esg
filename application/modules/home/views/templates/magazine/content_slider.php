<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_slider'])): ?>
	<div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-arrows="true" data-thumbs="true">
		<div class="flexslider">
			<div class="slider-wrap">
				<?php 
				$category = @$home['content_slider'][0]['category'];
				?>
				<?php foreach ($home['content_slider'] as $key => $value): ?>
					<div class="slide" data-thumb="<?php echo image_module('content', $value) ?>">
						<a href="<?php echo content_link($value['slug']) ?>">
							<img src="<?php echo image_module('content', $value) ?>" alt="">
							<div class="overlay">
								<div class="text-overlay">
									<div class="text-overlay-title">
										<a href="<?php echo content_link($value['slug']) ?>"><h3><?php echo $value['title'] ?></h3></a>
									</div>
									<div class="text-overlay-meta">
										<span><?php echo @$category['title'] ?></span>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
<?php endif ?>