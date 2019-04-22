<?php defined('BASEPATH') OR exit('No direct script access allowed');
$header = $this->esg->get_config('header');
if (!empty($header)): ?>
	<style type="text/css">
		.home_banner_area {
	    z-index: 1;
	    background: url(<?php echo image_module('config','header'.'/'.$header['image']) ?>) no-repeat center center;
	    background-size: cover;
		}
	</style>
<?php endif ?>
<?php if (!empty($home['content_top'])): ?>
	<?php foreach ($home['content_top'] as $key => $value): ?>
		<section class="home_banner_area">
			<div class="banner_inner " style="background: rgba(0, 0, 0, 0.5);">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="home_left_img">
								<img class="img-fluid" src="<?php echo image_module('content', $value) ?>" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="banner_content">
								<h2>
									<?php echo $value['title'] ?>
								</h2>
								<p>
									<?php echo $value['intro'] ?>
								</p>
								<div class="d-flex align-items-center">
									<a class="video-play-button" href="<?php echo content_link($value['slug']) ?>">
										<span></span>
									</a>
									<div class="watch_video text-uppercase">
										See More
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endforeach ?>
<?php endif ?>