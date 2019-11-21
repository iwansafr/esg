<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_about']))
{
	foreach ($home['content_about'] as $key => $value) {
		?>
		<section class="learning_part">
			<div class="container">
				<div class="row align-items-sm-center align-items-lg-stretch">
					<div class="col-md-7 col-lg-7">
						<div class="learning_img">
							<img src="<?php echo image_module('content', $value);?>" alt="">
						</div>
					</div>
					<div class="col-md-5 col-lg-5">
						<div class="learning_member_text">
							<h5><?php echo @$value['category']['title'] ?></h5>
							<h2><?php echo $value['title'] ?></h2>
							<?php echo $value['content'] ?>
							<a href="<?php echo content_link($value['slug']) ?>" class="btn_1">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
	?>
	<?php
}