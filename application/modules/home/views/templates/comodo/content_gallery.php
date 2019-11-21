<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_gallery'])): ?>
	<?php $category = @$home['content_gallery'][0]['category'] ?>
	<section class="gallery_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2>Screens <?php echo @$category['title'] ?></h2>
						<h1>Screens <?php echo @$category['title'] ?></h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<?php foreach ($home['content_gallery'] as $key => $value): ?>
							<?php $image = image_module('content', $value) ?>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="single-gallery">
									<div class="overlay"></div>
									<img class="img-fluid w-100" src="<?php echo $image ?>" alt="">
									<div class="content">
										<a class="pop-up-image" href="<?php echo $image ?>">
											<i class="lnr lnr-eye"></i>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>