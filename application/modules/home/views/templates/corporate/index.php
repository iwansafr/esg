<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		<?php $this->load->view('menu_top') ?>
		<header id="header" class="sticky-style-2">
			<?php $this->load->view('logo') ?>
			<?php $this->load->view('menu_main') ?>
		</header>
		<?php $this->load->view('content_slider') ?>
		<section id="content">
			<?php $this->load->view('content') ?>
		</section>
		<footer id="footer" class="dark">
			<div id="copyrights">
				<?php $this->load->view('footer') ?>
			</div>
		</footer>
	</div>
	<div id="gotoTop" class="icon-angle-up"></div>
	<script type="text/javascript" src="<?php echo base_url('templates/corporate/');?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url('templates/corporate/');?>js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url('templates/corporate/');?>js/functions.js"></script>
</body>
</html>