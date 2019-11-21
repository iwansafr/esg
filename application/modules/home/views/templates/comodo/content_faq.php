<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_faq'])): ?>
	<?php $category = @$home['content_faq'][0]['category'] ?>
	<section class="frequently_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2><?php echo @$category['title'] ?></h2>
						<h1><?php echo @$category['title'] ?></h1>
					</div>
				</div>
			</div>
			<div class="row frequent_inner">
				<?php $i = 0; ?>
				<?php foreach ($home['content_faq'] as $key => $value): ?>
					<?php $class = ($i%2==0) ? 'col-lg-5 col-md-5' : 'offset-lg-2 col-lg-5 offset-md-2 col-md-5'; ?>
					<div class="<?php echo $class ?>">
						<div class="frequent_item last-child">
							<h3><?php echo @$value['title'] ?></h3>
							<?php echo @$value['content'] ?>
						</div>
					</div>
					<?php $i++; ?>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif ?>