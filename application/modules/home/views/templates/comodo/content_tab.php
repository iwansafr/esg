<style type="text/css">
	.recent_update_area {
    background: #3b3473;
}
</style>
<section class="recent_update_area section_gap">
	<div class="container">
		<div class="recent_update_inner">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php 
				$category = array();
				for ($i=1; $i < 4; $i++) 
				{ 
					if(!empty($home['content_tab_'.$i]))	
					{
						$category[$i] = @$home['content_tab_'.$i][0]['category'];
						$selected = $i == 1 ? 'true' : 'false';
						$active = $i == 1 ? 'active' : '';
						?>
						<li class="nav-item">
							<a class="nav-link <?php echo $active ?>" id="<?php echo $category[$i]['slug'] ?>-tab" data-toggle="tab" href="#<?php echo $category[$i]['slug'] ?>" role="tab" aria-controls="<?php echo $category[$i]['slug'] ?>" aria-selected="<?php echo $selected ?>">
								<?php echo @$category[$i]['title'] ?>
							</a>
						</li>
						<?php
					}
				}
				?>
			</ul>
			<div class="tab-content" id="myTabContent">
				<?php
				for ($i=1; $i < 4; $i++) 
				{ 
					if(!empty($home['content_tab_'.$i]))	
					{
						$active = $i == 1 ? 'show active' : '';
						?>
						<div class="tab-pane fade <?php echo $active ?>" id="<?php echo $category[$i]['slug'] ?>" role="tabpanel" aria-labelledby="<?php echo $category[$i]['slug'] ?>-tab">
							<?php foreach ($home['content_tab_'.$i] as $key => $value): ?>
								<?php $link = content_link($value['slug']);?>
								<div class="row recent_update_text">
									<div class="col-lg-6">
										<div class="chart_img">
											<img class="img-fluid" src="<?php echo image_module('content', $value) ?>" alt="<?php echo $value['title'] ?>" style="object-fit: cover; max-height: 100%;">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="section_content">
											<h6><?php echo $category[$i]['slug'] ?></h6>
											<a href="<?php echo $link ?>"><h1><?php echo $value['title'] ?></h1></a>
											<p><?php echo $value['intro'] ?></p>
											<a class="primary_btn" href="<?php echo $link ?>">Learn More</a>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</section>