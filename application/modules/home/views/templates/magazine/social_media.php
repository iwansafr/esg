<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="top-social">
	<ul>
		<?php if (!empty($meta['contact'])): ?>
			<?php foreach ($meta['contact'] as $key => $value): ?>
				<?php if (islink($value)): ?>
					<li><a href="<?php echo $value ?>" class="si-<?php echo $key?>"><span class="ts-icon"><i class="icon-<?php echo $key?>"></i></span><span class="ts-text"><?php echo $key ?></span></a></li>
				<?php endif ?>
			<?php endforeach ?>		
		<?php endif ?>
	</ul>
</div>
