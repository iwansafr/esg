<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_gallery'])): ?>
	<div class="container">
		<center>
	    <?php if (!empty($home['content_facilities']['0']['category']['title'])): ?>
	      <div class="fancy-title title-dotted-border">
	        <h4 style="text-align: center;"><?php echo $home['content_facilities'][0]['category']['title'] ?></h4>
	      </div>
	    <?php endif ?>
	  </center>
		<div class="masonry-thumbs col-6" data-lightbox="gallery">
			<?php foreach ($home['content_gallery'] as $key => $value): ?>
		    <a href="<?php echo image_module('content',$value) ?>" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo image_module('content',$value) ?>" alt="Gallery Thumb 1"></a>
			<?php endforeach ?>
		</div>
	</div>
<?php endif ?>