<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($home['content_thumbnail']))
{
	$i = 1;
	foreach ($home['content_thumbnail'] as $key => $value)
	{
		?>
	  <div class="product-screen-<?php echo $i;?> wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
      <img src="<?php echo image_module('content', $value['id'].'/'.$value['image'], $value['image_link'])?>" alt="" width="300">
    </div>
		<?php
		$i++;
	}
}