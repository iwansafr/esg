<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['category'])): ?>
	<?php 
	$total = @intval(count($home['category']['data'])/2);
	$dif = $total % 2 == 0 ? $total : $total+1;
	$data = array_chunk($home['category']['data'], $dif);
	?>
	<h4><?php echo $home['category']['table_title'] ?></h4>
	<?php foreach ($data as $key => $value): ?>
		<?php $col_last = $key == 0 ? '': 'col_last'; ?>
		<div class="col_half nobottommargin <?php echo $col_last ?>">
			<ul>
				<?php foreach ($value as $ckey => $cvalue): ?>
					<li><a href="<?php echo content_cat_link($cvalue['slug']) ?>"><?php echo $cvalue['title'] ?></a></li>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endforeach ?>
<?php endif ?>