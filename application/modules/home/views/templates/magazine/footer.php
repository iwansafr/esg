<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="fright clearfix">
	<?php foreach ($meta['contact'] as $key => $value): ?>
		<?php if (isLink($value)): ?>
			<a href="<?php echo $value ?>" class="social-icon si-small si-borderless si-<?php echo $key;?>">
				<i class="icon-<?php echo $key;?>"></i>
				<i class="icon-<?php echo $key;?>"></i>
			</a>
		<?php endif ?>
	<?php endforeach ?>
</div>

<div class="clear"></div>

<i class="icon-envelope2"></i> <?php echo @$meta['contact']['email'] ?> <span class="middot">&middot;</span> <i class="icon-headphones"></i> <?php echo @$meta['contact']['phone'] ?>