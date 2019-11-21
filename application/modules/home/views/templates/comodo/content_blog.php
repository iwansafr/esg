<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_blog'])): ?>
	<?php $category = @$home['content_blog'][0]['category'] ?>
	<section class="blog_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2><?php echo @$category['title'] ?></h2>
						<h1><?php echo @$category['title'] ?></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($home['content_blog'] as $key => $value): ?>
					<div class="col-lg-4 col-md-6">
						<div class="blog_items">
							<div class="blog_img_box">
								<img class="img-fluid" src="<?php echo image_module('content', $value) ?>" alt="" style="object-fit: cover;height: 300px;">
							</div>
							<div class="blog_content">
								<a class="title" href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a>
								<p><?php echo $value['description'] ?></p>
								<div class="date">
									<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo content_date($value['created']) ?></a>
									<a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $value['hits'] ?></a>
									<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 0</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif ?>