<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_courses'])): ?>
	<section class="special_cource padding_top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-5">
					<div class="section_tittle text-center">
						<p><?php echo @$home['content_courses'][0]['category']['description'] ?></p>
						<h2><?php echo @$home['content_courses'][0]['category']['title'] ?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($home['content_courses'] as $key => $value): ?>
					<div class="col-sm-6 col-lg-4">
						<div class="single_special_cource">
							<img src="<?php echo $link_template;?>/img/special_cource_1.png" class="special_img" alt="">
							<div class="special_cource_text">
								<a href="<?php echo content_link($value['slug']) ?>" class="btn_4"><?php echo $value['title'] ?></a>
								<?php echo $value['source'] ?>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	
<?php endif ?>