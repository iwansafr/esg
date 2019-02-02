<?php if (!empty($home['content'])): ?>
	<?php $category = $home['content'][0]['category'] ?>
	<?php $spc = ($category['title'] == 'Most Popular') ? 'popular' : ''; ?>
	<?php foreach ($home['content'] as $key => $value): ?>
		<?php $link = content_link($value['slug']) ?>
		<section class="about_us_area section_gap_top">
			<div class="container">
				<div class="row about_content align-items-center">
					<div class="col-lg-6">
						<div class="section_content">
							<a href="<?php echo content_cat_link(@$category['slug'], $spc, $spc) ?>"><h6><?php echo @$category['title'] ?></h6></a>
							<a href="<?php echo $link ?>"><h1><?php echo $value['title'] ?></h1></a>
							<p><?php echo $value['intro'] ?></p>
							<a class="primary_btn" href="<?php echo $link ?>">Learn More</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about_us_image_box justify-content-center">
							<img class="img-fluid w-100" src="<?php echo image_module('content',$value) ?>" alt="<?php echo $value['title'] ?>">
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endforeach ?>
<?php endif ?>