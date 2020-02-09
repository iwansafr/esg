<?php if (!empty($home['content'])): ?>
	<div class="content-wrap">
		<div class="container clearfix">
			<?php $i = 1; ?>
			<?php foreach ($home['content'] as $key => $value): ?>
				<?php 
				$last_col = ($i%3==0) ? true : false;
				$class = '';
				if($last_col)
				{
					$class = 'col_last';
				}
				?>
				<div class="col_one_third nobottommargin <?php echo $class ?>">
					<div class="feature-box media-box">
						<div class="fbox-media">
							<img src="<?php echo image_module('content',$value) ?>" alt="<?php echo $value['title'] ?>">
						</div>
						<div class="fbox-desc">
							<h3><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a><span class="subtitle"><?php echo $value['description'] ?>.</span></h3>
							<p><?php echo $value['content'] ?></p>
						</div>
					</div>
				</div>
				<?php $i++; ?>
			<?php endforeach ?>
		</div>
		<a class="button button-full center tright topmargin footer-stick" href="<?php echo 'https://wa.me/'.$meta['contact']['wa'].'?text=hai+'.$site['title'];?>">
			<div class="container clearfix">
				Konsultasi Gratis ? <strong>Klik Di Sini</strong> <i class="icon-caret-right" style="top:4px;"></i>
			</div>
		</a>
	</div>
<?php endif ?>