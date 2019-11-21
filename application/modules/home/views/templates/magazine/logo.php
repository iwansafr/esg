<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if ($logo['display'] == 'title'): ?>
	<h1 class="standard-logo"><?php echo $logo['title'] ?></h1>
<?php else: ?>
	<a href="<?php echo base_url() ?>" class="standard-logo" data-dark-logo="<?php echo image_module('config','logo'.'/'.$logo['image']) ?>"><img src="<?php echo image_module('config','logo'.'/'.$logo['image']) ?>" alt="Logo"></a>
	<a href="<?php echo base_url() ?>" class="retina-logo" data-dark-logo="<?php echo image_module('config','logo'.'/'.$logo['image']) ?>"><img src="<?php echo image_module('config','logo'.'/'.$logo['image']) ?>" alt="Logo"></a>
<?php endif ?>