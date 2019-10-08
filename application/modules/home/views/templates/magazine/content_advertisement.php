<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_advertisement'])): ?>
	<?php foreach ($home['content_advertisement'] as $key => $value): ?>
		<img class="aligncenter" src="<?php echo image_module('content',$value) ?>" alt="">
	<?php endforeach ?>
<?php endif ?>