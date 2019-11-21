<?php if (!empty($home['menu_bottom'])): ?>
	<div class="footer-widget mb-100">
		<div class="widget-title">
			<h6>Usefull Links</h6>
		</div>
		<nav>
			<ul class="useful-links">
				<?php foreach ($home['menu_bottom'] as $key => $value): ?>
					<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
				<?php endforeach ?>
			</ul>
		</nav>
	</div>
<?php endif ?>