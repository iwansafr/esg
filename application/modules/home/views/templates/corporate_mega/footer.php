<div class="container clearfix">
	<div class="col_half">
		<img src="<?php echo image_module('config','logo/'.$logo['image']) ?>" height="<?php echo $logo['height'] ?>" alt="Footer Logo" class="footer-logo">
		Copyrights &copy; <?php echo $site['year'] ?> All Rights Reserved by <?php echo $site['title'] ?> Inc.
	</div>

	<div class="col_half col_last tright">
		<div class="copyrights-menu copyright-links fright clearfix">
			<?php if (!empty($home['menu_bottom'])): ?>
				<?php $i = 0; ?>
				<?php foreach ($home['menu_bottom'] as $key => $value): ?>
					<?php echo $i>0 ? '/':''; ?><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a>
					<?php $i++; ?>
				<?php endforeach ?>
			<?php endif ?>
		</div>
		<div class="fright clearfix">
			<?php foreach ($meta['contact'] as $key => $value): ?>
				<?php if (isLink($value)): ?>
					<a href="<?php echo $value ?>" class="social-icon si-small si-borderless nobottommargin si-<?php echo $key;?>">
						<i class="icon-<?php echo $key;?>"></i>
						<i class="icon-<?php echo $key;?>"></i>
					</a>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>