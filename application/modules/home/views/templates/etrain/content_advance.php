<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_advance'])): ?>
		<?php foreach ($home['content_advance'] as $key => $value): ?>
			<section class="advance_feature learning_part">
				<div class="container">
					<div class="row align-items-sm-center align-items-xl-stretch">
						<div class="col-md-6 col-lg-6">
							<div class="learning_member_text">
								<h5><?php echo @$value['category']['title'] ?></h5>
								<h2><?php echo $value['title'] ?></h2>
								<?php echo $value['source'] ?>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="learning_img">
								<img src="<?php echo image_module('content', $value);?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endforeach ?>
<?php endif ?>	