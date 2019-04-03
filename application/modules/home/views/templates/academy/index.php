<!DOCTYPE html>
<html lang="<?php echo @$site['lang'] ?>">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<div id="preloader">
		<i class="circle-preloader"></i>
	</div>
	<header class="header-area">
		<div class="top-header">
			<div class="container h-100">
				<div class="row h-100">
					<?php $this->load->view('logo') ?>
				</div>
			</div>
		</div>
		<div class="academy-main-menu">
			<div class="classy-nav-container breakpoint-off">
				<div class="container">
					<nav class="classy-navbar justify-content-between" id="academyNav">
						<div class="classy-navbar-toggler">
							<span class="navbarToggler"><span></span><span></span><span></span></span>
						</div>
						<?php $this->load->view('menu_top') ?>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<?php
	if($mod['content'] == 'home/index')
	{
		$this->load->view('content_slider');
		
		$this->load->view('content_top_feature');
		
		$this->load->view('content_course');
		
		$this->load->view('content_testimonials');
		
		$this->load->view('content_popular_course');
		
		$this->load->view('content_partner');
		
		$this->load->view('content_touch');
	}else{
		?>
		<div class="top-popular-courses-area mt-50 section-padding-100-70">
			<?php $this->load->view('templates/'.$templates['public_template'].'/'.$mod['content']) ?>
		</div>
		<?php
	}?>
	<footer class="footer-area">
		<div class="main-footer-area section-padding-100-0">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-3">
						<?php $this->load->view('contact') ?>
					</div>
					<div class="col-12 col-sm-6 col-lg-3">
						<?php $this->load->view('menu_bottom') ?>
					</div>
					<div class="col-12 col-sm-6 col-lg-3">
						<?php $this->load->view('content_gallery') ?>
					</div>
					<div class="col-12 col-sm-6 col-lg-3">
						<?php $this->load->view('contact_detail') ?>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Supported by <a href="https://esoftgreat.com">esoftgreat</a> This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- jQuery-2.2.4 js -->
	<script src="<?php echo $link_template;?>/js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Popper js -->
	<script src="<?php echo $link_template;?>/js/bootstrap/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="<?php echo $link_template;?>/js/bootstrap/bootstrap.min.js"></script>
	<!-- All Plugins js -->
	<script src="<?php echo $link_template;?>/js/plugins/plugins.js"></script>
	<!-- Active js -->
	<script src="<?php echo $link_template;?>/js/active.js"></script>
	<?php $this->load->view('script') ?>
</body>

</html>