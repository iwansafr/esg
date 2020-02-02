<?php if (!empty($content['data'])): ?>
	<div class="content-wrap">
		<div class="container clearfix">
			<?php $i = 1; ?>
			<?php foreach ($content['data'] as $key => $value): ?>
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
							<h3><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h3>
							<p><?php echo $value['intro'] ?></p>
						</div>
					</div>
				</div>
				<?php $i++; ?>
			<?php endforeach ?>
			<div class="col-md-12">
				<hr>
				<?php 
				if(!empty($content['pagination']))
			  {
			    echo $content['pagination'];
			  }
				?>
			</div>
		</div>
	</div>
<?php endif ?>