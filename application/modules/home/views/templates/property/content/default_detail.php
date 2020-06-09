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
	<style type="text/css">
		@media(max-width: 750px){
			.img_slide{
				object-fit: cover; height: 450px;
			}
			.img_caption{
				max-height: 100px;
			}
			.img_caption h5{
				font-size: 10px;
			}
			.img_caption p{
				font-size: 9px;
			}
			.img_caption a{
				font-size: 9px;
			}

		}
	</style>
	<div class="container">
		<div class="fslider" data-easing="easeInQuad" data-pause="2000" data-lightbox="gallery">
      <div class="flexslider">
        <div class="slider-wrap">
          <?php foreach ($images as $key => $value): ?>
            <div class="slide" data-thumb="<?php echo $value['image_link'] ?>">
              <img src="<?php echo $value['image_link'] ?>" class="img_slide">
	            <div class="flex-caption slider-caption-bg img_caption" style="display: block!important;bottom: 5px;"><?php echo $content['source'] ?></div>
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
					<h1 class="highlight-me">UNIT</h1>
				</div>
			</center>
			<div class="tabs nobottommargin clearfix" id="sidebar-tabs">
				<ul class="tab-nav clearfix" style="border-bottom: none;">
					<?php foreach ($content['child'] as $key => $value): ?>
						<li style="border-radius: 35%;"><a href="#tabs-<?php echo $key;?>" style="padding: 0 3px;top:0;font-size: 11px;border-radius: 35%;"><?php echo $value['title'] ?></a></li>
					<?php endforeach ?>
				</ul>
				<div class="tab-container">
					<div data-lightbox="gallery">
						<?php foreach ($content['child'] as $key => $value): ?>
							<div class="tab-content clearfix" id="tabs-<?php echo $key;?>">
								<div id="popular-post-list-sidebar">
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
										<div class="col-md-6" style="padding-left: 0;margin-bottom: 10px;">
											<a href="<?php echo $cvalue['image_link'] ?>" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $cvalue['image_link'] ?>" alt="Gallery Thumb 1"></a>
										</div>
									<?php endforeach ?>
									<?php echo $value['content'] ?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
    <?php endif ?>
	</div>
	<hr>
	<?php
}