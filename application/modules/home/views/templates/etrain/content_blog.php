<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_blog'])): ?>
	<section class="blog_part section_padding">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-5">
					<div class="section_tittle text-center">
						<p><?php echo @$home['content_blog'][0]['category']['description'] ?></p>
						<h2><?php echo @$home['content_blog'][0]['category']['title'] ?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($home['content_blog'] as $key => $value): ?>
					<div class="col-sm-6 col-lg-4 col-xl-4">
						<div class="single-home-blog">
							<div class="card">
								<img src="<?php echo image_module('content', $value) ?>" class="card-img-top" alt="blog">
								<div class="card-body">
									<a href="<?php echo content_cat_link(@$home['content_blog'][0]['category']['slug']) ?>" class="btn_4"><?php echo @$home['content_blog'][0]['category']['title'] ?></a>
									<a href="<?php echo content_link($value['slug']) ?>">
										<h5 class="card-title"><?php echo $value['title'] ?></h5>
									</a>
									<p><?php echo $value['description'] ?></p>
									<ul>
										<!-- <li> <span class="ti-comments"></span>2 Comments</li> -->
										<!-- <li> <span class="ti-heart"></span>2k Like</li> -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif ?>