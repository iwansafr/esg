<div class="container">
	<?php
	if(!empty(@$_GET['keyword']))
	{
	  echo '<p class="badge">Search Result for : '.@$_GET['keyword'].'</p>';
	}
	if(!empty($content['data']))
	{
		?>
    <div class="row">
			<div class="col-12">
				<div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
					<span><?php echo @$content['taxonomy']['description'] ?></span>
					<h3><?php echo @$content['taxonomy']['title'] ?></h3>
				</div>
			</div>
		</div>
		<?php
	  if(!empty(@$tpl) && file_exists(APPPATH.'modules/home/views/templates/'.@$templates['public_template'].'/'.@$tpl.'.php'))
	  {
	    $data['home'][$tpl]                = $content['data'];
	    $data['home'][$tpl][0]['category'] = $content['taxonomy'];
	    
	    $this->load->view('templates/'.$templates['public_template'].'/'.$tpl, $data);
	  }else{
	    ?>
			<div class="row">
				<?php $i = 400; ?>
				<?php if (!empty($content['data'])): ?>
					<?php foreach ($content['data'] as $key => $value): ?>
						<div class="col-12 col-lg-6">
							<div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="<?php echo $i; ?>ms">
								<div class="popular-course-content">
									<h5><?php echo $value['title'] ?></h5>
									<span>By <?php echo $value['author'] ?>   |  <?php echo content_date($value['created']) ?></span>
									<div class="course-ratings">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
									</div>
									<p><?php echo @$value['intro'] ?></p>
									<a href="<?php echo content_link($value['slug']) ?>" class="btn academy-btn btn-sm">See More</a>
								</div>
								<div class="popular-course-thumb bg-img" style="background-image: url(<?php echo image_module('content', $value) ?>);"></div>
							</div>
						</div>
						<?php $i++; ?>
					<?php endforeach ?>
				<?php endif ?>
			</div>
	  <?php
	  }
	  if(!empty($content['pagination']))
	  {
	    echo $content['pagination'];
	  }
	}?>
</div>