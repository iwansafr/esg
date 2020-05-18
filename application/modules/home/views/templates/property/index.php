<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		<?php $this->load->view('menu_top') ?>
		<?php if ($mod['content'] == 'home/index'): ?>
			<?php $this->load->view('content_slider') ?>
			<section id="content">
				<div class="content-wrap">
					<?php $this->load->view('content_views') ?>
					<?php $this->load->view('content_category') ?>
					<?php $this->load->view('content_facilities') ?>
					<?php $this->load->view('content_location') ?>
				</div>
			</section>
		<?php else: ?>
			<section id="content">
				<?php $this->load->view('templates/'.$templates['public_template'].'/'.$mod['content']) ?>
				<?php $this->load->view('content_contact') ?>
			</section>
		<?php endif ?>
		<footer id="footer" class="dark">
			<div id="copyrights">
				<?php $this->load->view('footer') ?>
			</div>
		</footer>
	</div>
	<div id="gotoTop" class="icon-angle-up"></div>
	<?php $this->load->view('js') ?>
</body>
</html>