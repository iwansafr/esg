<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($home['menu_top']))
{
	?>
	<div id="top-bar">
		<div class="container clearfix">
			<div class="col_half nobottommargin">
				<div class="top-links">
					<ul>
						<li><a href="<?php echo base_url('templates/corporate');?>/index.html">Home</a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/faqs.html">FAQs</a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/contact.html">Contact</a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/login-register.html">Login</a>
							<div class="top-link-section">
								<form id="top-login" role="form">
									<div class="input-group" id="top-login-username">
										<span class="input-group-addon"><i class="icon-user"></i></span>
										<input type="email" class="form-control" placeholder="Email address" required="">
									</div>
									<div class="input-group" id="top-login-password">
										<span class="input-group-addon"><i class="icon-key"></i></span>
										<input type="password" class="form-control" placeholder="Password" required="">
									</div>
									<label class="checkbox">
									  <input type="checkbox" value="remember-me"> Remember me
									</label>
									<button class="btn btn-danger btn-block" type="submit">Sign in</button>
								</form>
							</div>
						</li>
					</ul>
				</div><!-- .top-links end -->

			</div>

			<div class="col_half fright col_last nobottommargin">

				<!-- Top Social
				============================================= -->
				<div id="top-social">
					<ul>
						<li><a href="<?php echo base_url('templates/corporate');?>/#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/#" class="si-dribbble"><span class="ts-icon"><i class="icon-dribbble"></i></span><span class="ts-text">Dribbble</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/#" class="si-github"><span class="ts-icon"><i class="icon-github-circled"></i></span><span class="ts-text">Github</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/#" class="si-pinterest"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.11.85412542</span></a></li>
						<li><a href="<?php echo base_url('templates/corporate');?>/mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@canvas.com</span></a></li>
					</ul>
				</div><!-- #top-social end -->

			</div>

		</div>

	</div>
	<?php
}