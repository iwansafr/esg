<!DOCTYPE html>
<html lang="<?php echo @$site['lang'] ?>">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<?php 
	$home_class = $mod['content'] == 'home/index' ? 'home_menu':'single_page_menu';
	?>
	<header class="main_menu <?php echo $home_class ?>">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<?php $this->load->view('menu_top') ?>
				</div>
			</div>
		</div>
	</header>
	<?php if ($mod['content'] == 'home/index'): ?>
		<?php $this->load->view('content_banner') ?>
		<?php $this->load->view('content_feature') ?>
		<?php $this->load->view('content_about') ?>
		<?php $this->load->view('content_count') ?>
		<?php $this->load->view('content_courses') ?>
		<?php $this->load->view('content_advance') ?>
		<?php $this->load->view('content_testimonials') ?>
		<?php $this->load->view('content_blog') ?>
	<?php else: ?>
		<?php $this->load->view('content');?>
		<section class="blog_area single-post-area section_padding">
      <div class="container">
				<?php $this->load->view($mod['content']);?>
      </div>
    </section>
	<?php endif ?>
	
	<footer class="footer-area">
		<?php $this->load->view('footer') ?>
	</footer>
	<?php $this->load->view('js') ?>
	<?php $this->load->view('script') ?>
</body>

</html>