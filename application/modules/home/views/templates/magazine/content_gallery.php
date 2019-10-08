<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_gallery'])): ?>
	<?php $category = $home['content_gallery'][0]['category'] ?>
	<div class="fancy-title title-border">
		<h3><?php echo $category['title'] ?></h3>
	</div>

	<div class="col_full masonry-thumbs col-6 bottommargin-lg clearfix" data-big="5" data-lightbox="gallery">
		<?php foreach ($home['content_gallery'] as $key => $value): ?>
			<a href="<?php echo image_module('content',$value) ?>" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo image_module('content',$value);?>" alt="Gallery Thumb 1"></a>
		<?php endforeach ?>
	</div>
<?php endif ?>