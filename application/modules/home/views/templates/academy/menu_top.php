<style type="text/css">
	.header-area .academy-main-menu .classy-navbar .classynav ul li a {
    height: 100%;
	}
</style>
<div class="classy-menu">
	<div class="classycloseIcon">
		<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
	</div>
	<div class="classynav">
		<?php 
		if(!empty($home['menu_top']))
		{
			?>
			<ul>
				<?php foreach ($home['menu_top'] as $key => $value): ?>
					<?php if (empty($value['child'])): ?>
						<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
					<?php else: ?>
						<li><a href="#"><?php echo $value['title'] ?></a>
						<ul class="dropdown">
							<?php foreach ($value['child'] as $ckey => $cvalue): ?>
								<li><a href="<?php echo menu_link($cvalue['link']) ?>"><?php echo $cvalue['title'] ?></a></li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				<?php endforeach ?>
				</li>
			</ul>
			<?php
		}
		?>
	</div>
</div>
<div class="calling-info">
	<div class="call-center">
		<a href="tel:<?php echo @$meta['contact']['phone'] ?>"><i class="icon-telephone-2"></i> <span><?php echo @$meta['contact']['phone'] ?></span></a>
	</div>
</div>