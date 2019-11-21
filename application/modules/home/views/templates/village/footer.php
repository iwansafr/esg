<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php
			if(!empty($meta['contact']))
			{
				$contact = $meta['contact'];
				?>
				<h3><?php echo $contact['name'] ?></h3>
				<ul>
					<li><i class="fas fa-location-arrow"></i> <p><?php echo $contact['address'] ?></p></li>
					<li><i class="far fa-envelope"></i> <p><?php echo $contact['email'] ?></p></li>
					<li><i class="fas fa-phone-alt"></i> <p><?php echo $contact['phone'] ?></p></li>
					<li><i class="fab fa-whatsapp"></i> <p><?php echo $contact['wa'] ?></p></li>
				</ul>
				<?php
			}?>
		</div>	
		<?php
		$data_count = array(1,2,3);
		foreach ($data_count as $key => $value)
		{
			if(!empty($home['menu_bottom_'.$value]))
			{
				$first = reset($home['menu_bottom_'.$value]);
			}
			?>
			<div class="col-md-3">
				<h5><?php echo @$first['position_name'] ?></h5>
				<ul>
					<?php
					if(!empty($home['menu_bottom_'.$value]))
					{
						foreach ($home['menu_bottom_'.$value] as $hkey => $hvalue)
						{
							echo '<li><a href="'.menu_link($hvalue['link']).'">'.$hvalue['title'].'</a></li>';
						}

					}
					?>
				</ul>
			</div>	
			<?php
		}
		?>

		<!-- <div class="col-md-3">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<form>
				<div class="input-btn">
					<input type="text" name="" placeholder="Your email">
					<button style="font-weight: bold;text-transform: uppercase;">Subscribe</button>
				</div>
			</form>
		</div>	 -->
	</div>
	<?php
	if(!empty($contact['wa']))
	{
		echo '<a href="https://wa.me/'.$contact['wa'].'?text=hai+'.@$contact['name'].'"><img src="https://www.esoftgreat.com/images/wa.png" style="height: 75px; position: fixed;bottom: 5%; right: 0.5%;z-index: 9999;"></a>';
	}
	if(!empty($contact['phone']))
	{
		echo '<a href="tel:'.$contact['phone'].'" class="btn btn-warning" style="height: 40px; position: fixed;bottom: 0%; right: 1.5%;z-index: 9999;"><span class="fa fa-phone"></span></a>';
	}
	?>
	<br>
	<hr>
	<p style="margin: 0;padding: 0;height: 60px;line-height: 45px;">&copy; Copyright <?php echo date('Y') ?> All Right Reserved. <a style="color: #16a085;" href="https://www.dinusa.co.id">PT Media Nusa Perkasa</a></p>
</div>