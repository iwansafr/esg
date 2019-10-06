<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if ($logo['display'] == 'text'): ?>
	<h5><?php echo $logo['title'] ?></h5>
<?php else: ?>
	<a href="<?php echo base_url() ?>" class="standard-logo" data-dark-logo="<?php echo image_module('config','logo') ?>"><img src="<?php echo image_module('config','logo') ?>" alt="Logo"></a>
	<a href="<?php echo base_url() ?>" class="retina-logo" data-dark-logo="<?php echo image_module('config','logo') ?>"><img src="<?php echo image_module('config','logo') ?>" alt="Logo"></a>
<?php endif ?>