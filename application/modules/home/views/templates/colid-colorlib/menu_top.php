<div class="container">
	<!--Logo-->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="<?php echo base_url() ?>" class="navbar-brand logo">
			<?php if ($logo['display'] == 'image'): ?>
				<?php echo $logo['tag_image'] ?>
			<?php else: ?>
				<h2><?php echo $logo['title'] ?></h2>
			<?php endif ?>
		</a>
	</div>
	<!--Logo/-->
	<nav class="collapse navbar-collapse" id="primary-menu">
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#home-page">Home</a></li>
			<li><a href="#service-page">Service</a></li>
			<li><a href="#feature-page">Features</a></li>
			<li><a href="#price-page">Pricing</a></li>
			<li><a href="#team-page">Team</a></li>
			<li><a href="#faq-page">FAQ</a></li>
			<li><a href="#blog-page">Blog</a></li>
			<li><a href="#contact-page">Contact</a></li>
		</ul>
	</nav>
</div>