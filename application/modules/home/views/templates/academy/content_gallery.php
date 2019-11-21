<?php if (!empty($home['content_gallery'])): ?>
	<div class="footer-widget mb-100">
		<div class="widget-title">
			<h6>Gallery</h6>
		</div>
		<div class="gallery-list d-flex justify-content-between flex-wrap">
			<?php foreach ($home['content_gallery'] as $key => $value): ?>
				<?php $image = image_module('content', $value) ?>
				<a href="<?php echo $image ?>" style="object-fit: cover; width: 125px;height: 95px!important;" class="gallery-img" title="<?php echo $value['title'] ?>"><img style="object-fit: cover; width: 125px;height: 95px!important;" src="<?php echo $image;?>" alt="<?php echo $value['title'] ?>"></a>
			<?php endforeach ?>
		</div>
	</div>
<?php endif ?>