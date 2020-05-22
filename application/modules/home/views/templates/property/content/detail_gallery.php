<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($content))
{
	if(!empty($content['images']))
	{
		$tmp_images = json_decode($content['images']);
		foreach ($tmp_images as $key => $value) 
		{
			$images[] = ['image_link'=>image_module('content/gallery',$content['id'].'/'.$value)];
		}
	}else{
		$images[] = ['image_link'=>image_module('content',$content)];
	}
	?>
	<div class="container">
		<div class="fslider" data-easing="easeInQuad">
      <div class="flexslider">
        <div class="slider-wrap">
          <?php foreach ($images as $key => $value): ?>
            <div class="slide" data-thumb="<?php echo $value['image_link'] ?>">
              <img src="<?php echo $value['image_link'] ?>">
	            <div class="flex-caption slider-caption-bg"><?php echo $content['source'] ?></div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <center>
    	<h1><?php echo $content['title'] ?></h1>
    </center>
    <style>
    	p{
    		font-size: 16px;
    	}
    </style>
    <?php echo $content['content'] ?>
    <?php if (!empty($content['child'])): ?>
    	<center>
				<div class="fancy-title title-dotted-border">
					<h1 class="highlight-me">Gallery <?php echo $content['title'] ?></h1>
				</div>
			</center>
			<div class="masonry-thumbs col-6" data-lightbox="gallery">
				<?php foreach ($content['child'] as $key => $value): ?>
					<?php 
					$child_images = [];
					if(!empty($value['images']))
					{
						$tmp_images = json_decode($value['images']);
						foreach ($tmp_images as $tkey => $tvalue) 
						{
							$child_images[] = ['image_link'=>image_module('content/gallery',$value['id'].'/'.$tvalue)];
						}
					}else{
						$child_images[] = ['image_link'=>image_module('content',$value)];
					}
					?>
						<?php foreach ($child_images as $ckey => $cvalue): ?>
						  <a href="<?php echo $cvalue['image_link'] ?>" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $cvalue['image_link'] ?>" alt="Gallery Thumb 1"></a>
						<?php endforeach ?>
				<?php endforeach ?>
			</div>
    <?php endif ?>
	</div>
	<hr>
	<?php
}