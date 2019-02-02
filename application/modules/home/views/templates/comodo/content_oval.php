<?php if (!empty($home['content_oval'])): ?>
	<?php $category = @$home['content_oval'][0]['category'] ?>
	<section class="upcoming_games_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2><?php echo @$category['title'] ?></h2>
						<h1><?php echo @$category['title'] ?></h1>
					</div>
				</div>
			</div>
			<div class="row text-center">
				<?php foreach ($home['content_oval'] as $key => $value): ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="new_games_item">
							<img src="<?php echo image_module('content', $value) ?>" alt="<?php echo $value['title'] ?>" style="object-fit: cover;height: 341px;">
							<div class="upcoming_title">
								<h3><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h3>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
<?php endif ?>