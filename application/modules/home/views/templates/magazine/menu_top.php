<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="top-links">
	<ul>
		<?php if (!empty($home['menu_top'])): ?>
			<?php foreach ($home['menu_top'] as $key => $value): ?>
				<li><a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a></li>
			<?php endforeach ?>
		<?php endif ?>
		<li id="login_form"><a href="#">Login</a>
			<div class="top-link-section">
				<form id="top-login" method="post" action="<?php echo base_url('admin/login') ?>" role="form">
					<div class="input-group" id="top-login-username">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Username" required="">
					</div>
					<div class="input-group" id="top-login-password">
						<span class="input-group-addon"><i class="icon-key"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Password" required="">
					</div>
					<label class="checkbox">
					  <input type="checkbox" value="remember-me"> Remember me
					</label>
					<button class="btn btn-danger btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</li>
	</ul>
</div>