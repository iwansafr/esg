<div class="container clearfix">
	<div id="logo" class="divcenter">
		<?php if (!empty($logo[$logo['display']]) && $logo['display'] == 'image'): ?>
			<a href="<?php echo $site['link'] ?>" class="standard-logo" data-dark-logo="<?php echo image_module('config', 'logo/'.$logo['image']) ?>"><img class="divcenter" src="<?php echo image_module('config', 'logo/'.$logo['image']) ?>" alt="<?php echo $logo['title'] ?> Logo"></a>
			<a href="<?php echo $site['link'] ?>" class="retina-logo" data-dark-logo="<?php echo image_module('config', 'logo/'.$logo['image']) ?>"><img class="divcenter" src="<?php echo image_module('config', 'logo/'.$logo['image']) ?>" alt="<?php echo $logo['title'] ?> Logo"></a>
		<?php else: ?>
			<a href="<?php echo $site['link'] ?>">
				<h1 class="center"><?php echo $logo['title'] ?></h1>
			</a>
		<?php endif ?>
	</div>
</div>