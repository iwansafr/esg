<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		<?php $this->load->view('menu_top') ?>
		<header id="header" class="sticky-style-2" style="height: 60px;">
			<?php $this->load->view('menu_main') ?>
		</header>
		<?php if ($mod['content'] == 'home/index'): ?>
			<?php $this->load->view('content_slider') ?>
		<?php else: ?>
			<?php $this->load->view('page_title') ?>
		<?php endif ?>
		<section id="content">
			<?php if ($mod['content']=='home/index'): ?>
				<?php $this->load->view('content') ?>
				<?php $this->load->view('content_extra') ?>
			<?php else: ?>
				<?php $this->load->view('templates/'.$templates['public_template'].'/'.$mod['content']) ?>
			<?php endif ?>
		</section>
		<footer id="footer" class="dark">
			<div id="copyrights">
				<?php $this->load->view('footer') ?>
			</div>
		</footer>
	</div>
	<div id="gotoTop" class="icon-angle-up"></div>
	<script type="text/javascript" src="<?php echo $link_template;?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $link_template;?>/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo $link_template;?>/js/functions.js"></script>
</body>
</html>