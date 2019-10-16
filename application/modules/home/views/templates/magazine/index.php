<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<?php $this->load->view('meta') ?>
	</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		<div id="top-bar">
			<div class="container clearfix">
				<div class="col_half nobottommargin">
					<?php $this->load->view('menu_top') ?>		
				</div>
				<div class="col_half fright col_last nobottommargin">
					<?php $this->load->view('social_media') ?>
				</div>
			</div>
		</div>
		<header id="header" class="sticky-style-2">
			<div class="container clearfix">
				<div id="logo">
					<?php $this->load->view('logo') ?>
				</div>
				<div class="top-advert">
					<?php $this->load->view('content_top_banner') ?>					
				</div>
			</div>
			<div id="header-wrap">
				<nav id="primary-menu" class="style-2">
					<?php $this->load->view('menu_main') ?>
				</nav>
			</div>
		</header>
		<section id="content">
			<div class="content-wrap">
				<div class="section header-stick bottommargin-lg clearfix" style="padding: 20px 0;">
					<div>
						<?php $this->load->view('content_news') ?>
					</div>
				</div>
				<div class="container clearfix">
					<div class="row">
						<div class="col-md-8 bottommargin">
							<?php if ($mod['content'] == 'home/index'): ?>
								<div class="col_full bottommargin-lg">
									<?php $this->load->view('content_slider') ?>
								</div>
								<div class="clear"></div>
								<div class="col_full bottommargin-lg clearfix">
									<?php $this->load->view('content_block',['number'=>'1']) ?>
								</div>

								<div class="bottommargin-lg">
									<?php $this->load->view('content_banner') ?>
								</div>

								<div class="col_full bottommargin-lg clearfix">
									<?php $this->load->view('content_block', ['number'=>'2']) ?>
								</div>

								<?php $this->load->view('content_gallery') ?>

								<div class="col_full nobottommargin clearfix">
									<?php $this->load->view('content_grid') ?>
								</div>
							<?php else: ?>
								<div class="col_full bottommargin-lg clearfix">
									<?php $this->load->view($mod['content']);?>
								</div>
							<?php endif ?>
						</div>

						<div class="col-md-4">

							<div class="line hidden-lg hidden-md"></div>

							<div class="sidebar-widgets-wrap clearfix">
								<div class="widget clearfix">
									<?php $this->load->view('content_advertisement') ?>									
								</div>

								<div class="widget widget_links clearfix">
									<?php $this->load->view('category') ?>
								</div>

								<div class="widget clearfix">
									<?php $this->load->view('twitter') ?>
								</div>

								<div class="widget clearfix">

									<div class="tabs nobottommargin clearfix" id="sidebar-tabs">
										<?php $this->load->view('content_double') ?>
									</div>
								</div>
								<div class="widget clearfix">
									<?php $this->load->view('content_banner_right') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer id="footer" class="dark">
			<div class="container">
				<div class="footer-widgets-wrap clearfix">
					<div class="col_two_third">
						<div class="col_one_third">
							<?php $this->load->view('description') ?>
						</div>
						<div class="col_one_third">
							<?php $this->load->view('menu_bottom') ?>
						</div>
						<div class="col_one_third col_last">
							<?php $this->load->view('content_bottom') ?>
						</div>
					</div>
					<div class="col_one_third col_last">
						<div class="widget clearfix">
							<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
							<form action="<?php echo base_url('home/subscribe') ?>" role="form" method="post" class="nobottommargin">
								<div class="input-group divcenter">
									<span class="input-group-addon"><i class="icon-email2"></i></span>
									<input type="email" name="email" class="form-control required email" placeholder="Enter your Email" required="">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
								</div>
							</form>
						</div>

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-md-6 clearfix bottommargin-sm">
									<a target="_blank" href="<?php echo @$meta['contact']['facebook'] ?>" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a target="_blank" href="<?php echo @$meta['contact']['facebook'] ?>"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-md-6 clearfix">
									<a target="_blank" href="https://twitter.com/<?php echo @$meta['contact']['twitter'] ?>" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
										<i class="icon-twitter"></i>
										<i class="icon-twitter"></i>
									</a>
									<a target="_blank" href="https://twitter.com/<?php echo @$meta['contact']['twitter'] ?>"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on Twitter</small></a>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; <?php echo $site['year'] ?> All Rights Reserved by <?php echo $site['title'] ?>.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<?php $this->load->view('footer') ?>
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<?php $this->load->view('js') ?>

</body>
</html>