<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['menu_top']))
{
	?>
	<div id="top-bar">
		<div class="container clearfix">
			<div class="col_half nobottommargin">
				<div class="top-links">
					<ul>
						<?php 
						foreach ($home['menu_top'] as $key => $value) 
						{
							?>
							<li><a href="<?php echo menu_link($value['link']);?>"><?php echo $value['title'] ?></a></li>
							<?php
						}
						?>
						<!-- <li><a href="<?php echo base_url('admin') ?>">Login</a>
							<div class="top-link-section">
								<form method="post" action="<?php echo base_url('admin/login') ?>">
									<div class="input-group" id="top-login-username">
										<span class="input-group-addon"><i class="icon-user"></i></span>
										<input type="text" name="username" class="form-control" placeholder="username" required="">
									</div>
									<div class="input-group" id="top-login-password">
										<span class="input-group-addon"><i class="icon-key"></i></span>
										<input type="password" class="form-control" name="password" placeholder="Password" required="">
									</div>
									<label class="checkbox">
									  <input type="checkbox" name="remember_me"> Remember me
									</label>
									<button class="btn btn-danger btn-block" type="submit">Sign in</button>
								</form>
							</div>
						</li> -->
					</ul>
				</div>
			</div>
			<div class="col_half fright col_last nobottommargin">
				<div id="top-social">
					<ul>
						<?php
						foreach ($meta['contact'] as $key => $value)
						{
							if (isLink($value))
							{
								?>
								<li><a href="<?php echo $value ?>" class="si-<?php echo $key;?>"><span class="ts-icon"><i class="icon-<?php echo $key;?>"></i></span><span class="ts-text"><?php echo $key ?></span></a></li>
								<?php
							}
						}?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
}