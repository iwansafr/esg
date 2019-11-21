
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_banner'])): ?>
	<?php foreach ($home['content_banner'] as $key => $value): ?>
		<img class="aligncenter" src="<?php echo image_module('content',$value) ?>" alt="">
	<?php endforeach ?>
<?php endif ?>