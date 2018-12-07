<footer class="footer">
	<div class="container bottom_border">
		<div class="row">
			<div class=" col-sm-4 col-md col-sm-4  col-12 col">
				<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
				<?php
				if(!empty($meta['contact']))
				{
					$contact = $meta['contact'];
					?>
					<p class="mb10"><?php echo $contact['address'] ?></p>
					<p><i class="fa fa-user"></i> <?php echo $contact['name'] ?></p>
					<p><i class="fa fa-phone"></i>  <?php echo $contact['phone'] ?>  </p>
					<p><i class="fa fa-whatsapp"></i>  <?php echo $contact['wa'] ?>  </p>
					<p><i class="fa fa fa-envelope"></i> <?php echo $contact['email'] ?>  </p>
					<?php
				}?>
			</div>
			<?php
			$data_count = array(1,2,3);
			foreach ($data_count as $key => $value)
			{
				?>
				<div class=" col-sm-4 col-md  col-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
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
					<!--footer_ul_amrc ends here-->
				</div>
				<?php
			}
			?>

		</div>
	</div>
	<div class="container">
		<ul class="foote_bottom_ul_amrc">
			<?php
			if(!empty($home['menu_footer']))
			{
				foreach ($home['menu_footer'] as $mfkey => $mfvalue)
				{
					echo '<li><a href="'.menu_link($mfvalue['link']).'">'.$mfvalue['title'].'</a></li>';
				}
			}
			?>
		</ul>
		<p class="text-center">Copyright @2017 <?php echo !empty($this->esg->get_esg('site')['link']) ? '<a href="'.$this->esg->get_esg('site')['link'].'">'.$this->esg->get_esg('site')['title'].'</a>' : ''; ?> | Powered by <a href="#">esoftgreat</a></p>
		<ul class="social_footer_ul">
			<?php 
			$contact = $this->esg->get_esg('meta')['contact'];
			if(!empty($contact))
			{
				foreach ($contact as $key => $value) 
				{
					if(isLink($value))
					{
						echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
					}
				}
			}
			?>
		</ul>
	</div>
</footer>

<button id="toTop" style="position: fixed;bottom: 10%;right: 5%;" class="btn btn-default"><i class="fa fa-arrow-up"></i></button>
<script src="<?php echo @base_url('templates').'/'.$templates['public_template'];?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo @base_url('templates').'/'.$templates['public_template'];?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo @base_url('templates').'/'.$templates['public_template'];?>/assets/js/script.js"></script>