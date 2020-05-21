<footer id="footer" class="dark">
	<div class="container">
		<div class="footer-widgets-wrap clearfix">
			<div class="col_one_third">
				<div class="widget clearfix">
					<?php $key_first = array_key_first($home['menu_bottom_1']); ?>
					<?php if (!empty($home['menu_bottom_1'][$key_first]['position_name'])): ?>
						<h4><?php echo $home['menu_bottom_1'][$key_first]['position_name'] ?></h4>
					<?php endif ?>
					<div class="row">
						<div class="bottommargin-sm widget_links">
							<ul>
								<?php if (!empty($home['menu_bottom_1'])): ?>
									<?php foreach ($home['menu_bottom_1'] as $key => $value): ?>
										<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
									<?php endforeach ?>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col_one_third">
				<div class="widget clearfix">
					<?php $key_first = array_key_first($home['menu_bottom_2']); ?>
					<?php if (!empty($home['menu_bottom_2'][$key_first]['position_name'])): ?>
						<h4><?php echo $home['menu_bottom_2'][$key_first]['position_name'] ?></h4>
					<?php endif ?>
					<div class="row">
						<div class="bottommargin-sm widget_links">
							<ul>
								<?php if (!empty($home['menu_bottom_2'])): ?>
									<?php foreach ($home['menu_bottom_2'] as $key => $value): ?>
										<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
									<?php endforeach ?>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col_one_third col_last">
				<div class="widget quick-contact-widget clearfix">
					<h4>Contact Us</h4>
					<?php if (!empty($meta['contact']['image'])): ?>
						<center>
							<img src="<?php echo image_module('config','contact/'.$meta['contact']['image']) ?>" alt="">
						</center>
					<?php endif ?>
					<div class="contact" style="text-align: center; font-size: 20px;">
						<?php if (!empty($meta['contact']['wa'])): ?>
							<a href="https://api.whatsapp.com/send?phone=<?php echo $meta['contact']['wa'] ?>">Whatsapp <?php echo $meta['contact']['wa']; ?></a><br>
						<?php endif ?>
						<?php if (!empty($meta['contact']['phone'])): ?>
							<a href="tel:<?php echo $meta['contact']['phone'] ?>">Call <?php echo $meta['contact']['phone']; ?></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="copyrights">
		<div class="container clearfix">
			<div class="col_half">
				Copyrights &copy; <?php echo $site['year'] ?> All Rights Reserved by <?php echo $site['title'] ?>.
			</div>
			<div class="col_half col_last tright">
				<div class="fright clearfix">
					<div class="copyrights-menu copyright-links nobottommargin">
						<?php if (!empty($home['menu_bottom'])): ?>
							<?php $i = 0; ?>
							<?php foreach ($home['menu_bottom'] as $key => $value): ?>
								<?php echo $i>0 ? '/':''; ?><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a>
								<?php $i++; ?>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
			</div>

		</div>

	</div><!-- #copyrights end -->

</footer><!-- #footer end -->