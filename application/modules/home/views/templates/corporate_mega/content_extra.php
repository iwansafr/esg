	<?php 
	if(!empty($home['content_extra']))
	{
		?>
		<hr>
		<div class="row" style="margin: 0 10% 0 10%;">
			<?php
			foreach ($home['content_extra'] as $key => $value) 
			{
				?>
				<div class="col-md-6">
					<div class="row" style="border: 1px black solid;margin-bottom: 5%;">
						<div class="col-md-2">
							<i class="fa <?php echo $value['icon'] ?>" style="color: #666666;font-size: 80px;transition: 0.5s;line-height: 0;"></i>
						</div>
						<div class="col-md-10">
							<h5><?php echo $value['title'] ?></h5>
							<p><?php echo $value['description'] ?></p>
						</div>
					</div>
				</div>
				<?php
			}?>
		</div>
		<?php
	}
	?>