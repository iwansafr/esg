	<?php 
	if(!empty($home['content_extra']))
	{
		?>
		<div class="row" style="margin: 5% 10% 0 10%;">
			<hr>
			<?php
			foreach ($home['content_extra'] as $key => $value) 
			{
				?>
				<div class="col-md-6">
					<div class="row" style="margin-top: 5%;margin-bottom: 5%; min-height: 150px;">
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