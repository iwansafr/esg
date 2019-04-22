<!DOCTYPE html>
<html lang="<?php echo @$site['lang'] ?>">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<header class="header_area">
		<div class="main_menu">
			<?php $this->load->view('menu_top') ?>
		</div>
	</header>
	<?php if ($mod['content'] =='home/index'): ?>
		<?php $this->load->view('content_top') ?>
		<?php $this->load->view('content') ?>
		<?php $this->load->view('content_oval') ?>
		<?php $this->load->view('content_tab') ?>
		<?php $this->load->view('content_gallery') ?>
		<?php $this->load->view('content_testimonial') ?>
		<?php $this->load->view('content_pricing') ?>
		<?php $this->load->view('content_faq') ?>
		<?php $this->load->view('content_blog'); ?>
	<?php else: ?>
		<section class="banner_area">
			<div class="banner_inner d-flex align-items-center">
				<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<div class="page_link">
							<a href="<?php echo base_url() ?>">Home</a>
							<a href="#"><?php echo str_replace('.html','',end($navigation['array'])) ?></a>
						</div>
						<h2><?php echo str_replace('-',' ',str_replace('.html','',end($navigation['array']))) ?></h2>
					</div>
				</div>
			</div>
		</section>
		<?php if (empty($tpl)): ?>
			<section class="sample-text-area">
				<div class="container">
		<?php endif ?>
			<?php $this->load->view($mod['content']) ?>
		<?php if (empty($tpl)): ?>
				</div>
			</section>
		<?php endif ?>
	<?php endif ?>
	<?php $this->load->view('touch') ?>
	<footer class="footer_area section_gap_top">
		<div class="container">
			<?php $this->load->view('footer') ?>
		</div>
	</footer>
	<?php $this->load->view('js') ?>
</body>

</html>