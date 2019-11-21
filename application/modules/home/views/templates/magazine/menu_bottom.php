<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['menu_bottom'])): ?>
	<?php 
	$position_name = reset($home['menu_bottom']);
	?>
	<div class="widget widget_links clearfix">

		<h4><?php echo $position_name['position_name'] ?></h4>

		<ul>
			<?php foreach ($home['menu_bottom'] as $key => $value): ?>
				<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
			<?php endforeach ?>
		</ul>

	</div>
<?php endif ?>
