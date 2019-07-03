<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['widget_right'])): ?>
	<div class="content">
		<div class="sidebar-title">
			<?php echo $home['widget_right']['table_title'] ?>
		</div>
		<div class="sidebar-body">
			<?php foreach ($home['widget_right']['data'] as $key => $value): ?>
				<a class="item" href="<?php echo content_type_link($home['widget_right']['table'], $value) ?>"><?php echo $value['title'] ?></a>
			<?php endforeach ?>
		</div>
	</div>
<?php endif ?>