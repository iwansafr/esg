<div id="header-wrap">
	<nav id="primary-menu" class="style-2">
		<div class="container clearfix">
			<?php if (!empty($home['menu_main'])): ?>
				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
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
				<a href="<?php echo base_url('templates/corporate');?>/#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
				<form action="search.html" method="get">
					<input type="text" name="q" class="form-control" value="" placeholder="Ketik &amp; Tekan Enter..">
				</form>
			</div>
		</div>
	</nav>
</div>