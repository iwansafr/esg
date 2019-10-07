<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container clearfix">
	<span class="label label-danger bnews-title">Breaking News:</span>
	<div class="fslider bnews-slider nobottommargin" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false">
		<div class="flexslider">
			<div class="slider-wrap">
				<?php if (!empty($home['content_news'])): ?>
					<?php foreach ($home['content_news'] as $key => $value): ?>
						<div class="slide"><a href="<?php echo content_link($value['slug']) ?>"><strong><?php echo substr($value['title'],0,50) ?>..</strong></a></div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>