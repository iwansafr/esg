<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section class="newsletter_area">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="newsletter_inner">
					<h1>Subscribe Our Newsletter</h1>
					<p>We won’t send any kind of spam</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<aside class="newsletter_widget">
					<div id="mc_embed_signup">
						<form action="<?php echo base_url('subscribe') ?>" method="post" class="subscribe_form relative">
							<div class="input-group d-flex flex-row">
								<input name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
								 required="" type="email">
								<button class="btn primary_btn">Subscribe</button>
							</div>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>