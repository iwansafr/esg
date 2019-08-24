<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
	<div class="row justify-content-between">
		<div class="col-sm-6 col-md-4 col-xl-3">
			<div class="single-footer-widget footer_1">
				<a href="<?php echo base_url() ?>"> <img src="<?php echo image_module('config','logo/'.$logo['image']) ?>" alt=""> </a>
				<p><?php echo $meta['contact']['description']; ?></p>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-xl-4">
			<div class="single-footer-widget footer_2">
				<h4>Newsletter</h4>
				<p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
				</p>
				<form action="<?php echo base_url('home/subscribe') ?>">
					<div class="form-group">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="email" placeholder='Enter email address'
								onfocus="this.placeholder = ''"
								onblur="this.placeholder = 'Enter email address'">
							<div class="input-group-append">
								<button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
							</div>
						</div>
					</div>
				</form>
				<div class="social_icon">
					<?php foreach ($meta['contact'] as $key => $value):
						if(isLink($value))
            {
              echo '<a href="'.$value.'" class="'.$key.'"><i class="fa fa-'.$key.'"></i></a>';
            }
					endforeach ?>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-md-4">
			<div class="single-footer-widget footer_2">
				<h4>Contact us</h4>
				<div class="contact_info">
					<p><span> Address :</span> <?php echo $meta['contact']['address'] ?> </p>
					<p><span> Phone :</span> <?php echo $meta['contact']['phone'] ?></p>
					<p><span> Email : </span><?php echo $meta['contact']['email'] ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="copyright_part_text text-center">
				<div class="row">
					<div class="col-lg-12">
						<p class="footer-text m-0">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="<?php echo base_url() ?>"><?php echo @$meta['contact']['name'] ?></a> All rights reserved | Supported by <a href="https://www.esoftgreat.com" >esoftgreat</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>