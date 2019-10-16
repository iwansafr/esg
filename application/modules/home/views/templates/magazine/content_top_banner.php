<?php if (!empty($home['content_top_banner'])): ?>
	<?php foreach ($home['content_top_banner'] as $key => $value): ?>
		<img src="<?php echo image_module('content', $value) ?>" alt="Ad">
	<?php endforeach ?>
<?php endif ?>