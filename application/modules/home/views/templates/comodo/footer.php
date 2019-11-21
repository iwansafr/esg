<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row footer_inner">
	<?php 
	for($i=1;$i<5;$i++)
	{
		if(!empty(@$home['menu_bottom_'.$i]))
		{
			$position_name = @end($home['menu_bottom_'.$i]);
			$position_name = @$position_name['position_name'];
			?>
			<div class="col-lg-3 col-sm-6">
				<aside class="f_widget ab_widget">
					<div class="f_title">
						<h4><?php echo @$position_name ?></h4>
					</div>
					<ul>
						<?php
						foreach ($home['menu_bottom_'.$i] as $key => $value) 
						{
							?>
							<li><a href="<?php echo $value['link'] ?>"></a><?php echo $value['title'] ?></a></li>
							<?php
						}
						?>
					</ul>
				</aside>
			</div>
			<?php
		}
	}
	?>
</div>
<div class="row single-footer-widget">
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="copy_right_text">
			<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="https://www.esoftgreat.com" title="esoftgreat">esoftgreat</a> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="social_widget">
			<?php foreach ($meta['contact'] as $key => $value): ?>
				<?php if (isLink($value)): ?>
					<a href="<?php echo $value ?>"><i class="fa fa-<?php echo $key?>"></i></a>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>