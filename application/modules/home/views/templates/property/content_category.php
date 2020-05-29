<?php if (!empty($home['content_category'])): ?>
<div class="container">
	<?php if (!empty($home['content_category'][0]['category'])): ?>
		<center>
			<div class="fancy-title title-dotted-border">
				<h1 class="highlight-me"><?php echo $home['content_category']['0']['category']['title'] ?></h1>
			</div>
			<p>
				<?php echo $home['content_category'][0]['category']['description'] ?>
			</p>
		</center>
	<?php endif ?>
</div>
<br>
<br>
<br>
<div class="clearfix"></div>
<div id="oc-images" class="owl-carousel owl-carousel-full news-carousel header-stick bottommargin-lg carousel-widget" data-margin="3" data-loop="true" data-stage-padding="50" data-pagi="false" data-items-xs="1" data-items-lg="<?php echo count($home['content_category']) ?>">
	<?php foreach ($home['content_category'] as $key => $value): ?>
		<div class="oc-item">
			<a href="#"><img height="200" src="<?php echo image_module('content',$value) ?>" alt="Image 1" style="object-fit: cover;"></a>
			<div >
				<div class="text-overlay" style="display: block;">
					<!-- <span class="label label-danger">World</span> -->
					<div class="text-overlay-title">
						<h2><?php echo $value['title'] ?></h2>
					</div>
					<div class="text-overlay-meta">
						<!-- <span>14th Sep 2014</span> -->
					</div>
					<a href="<?php echo content_link($value['slug']) ?>" class="button button-reveal button-border button-light button-small button-rounded uppercase tright noleftmargin topmargin-sm"><span>Detail</span><i class="icon-angle-right"></i></a>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>
<?php endif ?>