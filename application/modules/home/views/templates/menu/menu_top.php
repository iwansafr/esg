<?php
if(!empty($home['menu_top']))
{
	// $this->home_model->build_menu('menu_top',$block['menu_top']['content']);
	?>
	<div class="dropdown">
		<?php
		foreach ($home['menu_top'] as $key => $value) 
		{
			?>
			<?php if (empty($value['child'])): ?>
				<a href="<?php echo menu_link($value['link']) ?>" class="btn btn-default"><?php echo $value['title'] ?></a>
			<?php else: ?>
				<div class="btn-group dropright">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $value['title'] ?>
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
						<?php foreach ($value['child'] as $v1key => $v1value): ?>
							<?php if (empty($v1value['child'])): ?>
								<li><a tabindex="-1" href="<?php echo menu_link($v1value['link']) ?>"><?php echo $v1value['title'] ?></a></li>
							<?php else: ?>
								<li class="dropdown-submenu">
						      <a class="test" tabindex="-1" href="#"><?php echo $v1value['title'] ?> <span class="caret"></span></a>
						      <ul class="dropdown-menu">
										<?php foreach ($v1value['child'] as $v2key => $v2value): ?>
											<?php if (empty($v2value['child'])): ?>
												<li><a tabindex="-1" href="<?php echo menu_link($v2value['link']) ?>"><?php echo $v2value['title'] ?></a></li>
											<?php else: ?>
												<li class="dropdown-submenu">
										      <a class="test" tabindex="-1" href="#"><?php echo $v2value['title'] ?> <span class="caret"></span></a>
										      <ul class="dropdown-menu">
														<?php foreach ($v2value['child'] as $v3key => $v3value): ?>
															<?php if (empty($v3value['child'])): ?>
																<li><a tabindex="-1" href="<?php echo menu_link($v3value['link']) ?>"><?php echo $v3value['title'] ?></a></li>
															<?php else: ?>
																<li class="dropdown-submenu">
														      <a class="test" tabindex="-1" href="#"><?php echo $v3value['title'] ?> <span class="caret"></span></a>
														      <ul class="dropdown-menu">
																		<?php foreach ($v3value['child'] as $v4key => $v4value): ?>
																			<?php if (empty($v4value['child'])): ?>
																					<li><a tabindex="-1" href="<?php echo menu_link($v4value['link']) ?>"><?php echo $v4value['title'] ?></a></li>
																				<?php else: ?>
																					<li class="dropdown-submenu">
																			      <a class="test" tabindex="-1" href="#"><?php echo $v4value['title'] ?> <span class="caret"></span></a>
																			      <ul class="dropdown-menu">
																							<?php foreach ($v4value['child'] as $v5key => $v5value): ?>
																								
																							<?php endforeach ?>
																			      </ul>
																				<?php endif ?>
																		<?php endforeach ?>
														      </ul>
															<?php endif ?>
														<?php endforeach ?>
										      </ul>
											<?php endif ?>				
										<?php endforeach ?>
						      </ul>
							<?php endif ?>
						<?php endforeach ?>
				  </ul>
				</div>
			<?php endif ?>
			<?php
		}?>
	</div>
	<?php
}