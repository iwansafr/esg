<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_banner'])): ?>
	<?php foreach ($home['content_banner'] as $key => $value): ?>
		<img src="<?php echo image_module('content',$value) ?>" alt="Ad" class="aligncenter notopmargin nobottommargin">
	<?php endforeach ?>
<?php endif ?>