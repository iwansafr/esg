<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_banner']))
{
	?>
	<?php foreach ($home['content_banner'] as $key => $value): ?>
	<section class="banner_part banner_part_<?php echo $value['id']?>">
		<style>
			.banner_part_<?php echo $value['id'];?>:after {
			  background-image: url(<?php echo image_module('content', $value) ?>);
			}
		</style>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-xl-6">
					<div class="banner_text">
						<div class="banner_text_iner">
							<h5><?php echo @$value['category']['title'] ?></h5>
							<h1><?php echo $value['title'] ?></h1>
							<p><?php echo $value['content'] ?></p>
							<a href="#" class="btn_1">View Course </a>
							<a href="#" class="btn_2">Get Started </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endforeach ?>
	<?php
}