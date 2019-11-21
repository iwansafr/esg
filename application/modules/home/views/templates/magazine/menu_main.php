<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container clearfix">
	<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
	<?php if (!empty($home['menu_main'])): ?>
		<ul>
			<?php foreach ($home['menu_main'] as $key => $value): ?>
				<?php if (empty($value['child'])): ?>
					<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
				<?php else: ?>
					<li><a href="#"><div><?php echo $value['title'] ?></div></a>
						<ul>
							<?php foreach ($value['child'] as $ckey => $cvalue): ?>
								<?php if (empty($cvalue['child'])): ?>
									<li><a href="<?php echo menu_link($cvalue['link']) ?>"><?php echo $cvalue['title'] ?></a></li>								
								<?php else: ?>
									<li><a href="#"><div><i class="icon-stack"></i><?php echo $cvalue['title'] ?></div></a>
										<ul>
											<?php foreach ($cvalue['child'] as $gckey => $gcvalue): ?>
												<?php if (empty($gcvalue['child'])): ?>
													<li><a href="<?php echo menu_link($gcvalue['link']) ?>"><div><?php echo $gcvalue['title'] ?></div></a>
												<?php else: ?>
													<li><a href="<?php echo menu_link($gcvalue['link']) ?>"><div><?php echo $gcvalue['title'] ?></div></a>
														<ul>
															<?php foreach ($gcvalue['child'] as $ggckey => $ggcvalue): ?>
																<li><a href="<?php echo menu_link($ggcvalue['link']) ?>"><div><?php echo $ggcvalue['title'] ?></div></a></li>
															<?php endforeach ?>
														</ul>
													</li>
												<?php endif ?>
											<?php endforeach ?>
										</ul>
									</li>
								<?php endif ?>	
							<?php endforeach ?>
						</ul>
					</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
	<div id="top-search">
		<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
		<form action="<?php echo base_url('search') ?>" method="get">
			<input type="text" name="keyword" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
		</form>
	</div>
</div>