<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_pricing'])): ?>
	<?php $category = @$home['content_pricing'][0]['category'] ?>
	<section class="pricing_area section_gap">
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
				<?php foreach ($home['content_pricing'] as $key => $value): ?>
					<div class="col-lg-4 col-md-6">
						<div class="pricing_item">
							<h3 class="p_title"><?php echo $value['title'] ?></h3>
							<?php echo $value['source'] ?>
							<!-- <h1 class="p_price">$69.00</h1>
							<div class="p_list">
								<ul>
									<li>Basic hair Cut</li>
									<li>Basic hair Cut</li>
									<li>Basic hair Cut</li>
								</ul>
							</div> -->
							<div class="p_btn">
								<a href="https://wa.me/<?php echo @$meta['contact']['wa'] ?>?text=saya ingin konsultasi tentang paket web <?php echo $value['title'] ?> di <?php echo @$meta['contact']['name'] ?>" class="gradient_btn"><span>Get Started</span></a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				
			</div>
		</div>
	</section>
<?php endif ?>