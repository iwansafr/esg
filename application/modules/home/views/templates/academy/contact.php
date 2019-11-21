<div class="footer-widget mb-100">
	<div class="widget-title">
		<a href="<?php echo base_url() ?>"><img src="<?php echo image_module('config/logo', @$logo['image']) ?>" alt="<?php echo @$logo['title'] ?>" width="<?php echo $logo['width'] ?>"></a>
	</div>
	<p><?php echo @$meta['contact']['description'] ?></p>
	<div class="footer-social-info">
		<?php
    foreach ($meta['contact'] as $key => $value) 
    {
      if(isLink($value))
      {
        echo '<a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a>';
      }
    }
    ?>
	</div>
</div>