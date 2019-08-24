<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_feature']))
{
	?>
	<section class="feature_part">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xl-3 align-self-center">
					<div class="single_feature_text ">
						<h2><?php echo @$home['content_feature'][0]['category']['title'] ?></h2>
						<p><?php echo @$home['content_feature'][0]['category']['description'] ?></p>
						<a href="<?php echo content_cat_link($home['content_feature'][0]['category']['slug']) ?>" class="btn_1">Read More</a>
					</div>
				</div>
				<?php
				foreach ($home['content_feature'] as $key => $value)
				{
					?>
					<div class="col-sm-6 col-xl-3">
						<div class="single_feature">
							<div class="single_feature_part">
								<span class="single_feature_icon"><i class="<?php echo $value['icon'] ?>"></i></span>
								<h4><?php echo $value['title'] ?></h4>
								<p><?php echo $value['description'] ?></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}