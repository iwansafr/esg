<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="<?php echo base_url() ?>"> 
		<?php if ($logo['display']=='title'): ?>
			<?php echo $logo['title'] ?>
		<?php else: ?>
			<img src="<?php echo image_module('config','logo/'.$logo['image']);?>" alt="logo" width="<?php echo $logo['width'] ?>" height="<?php echo $logo['height'] ?>"> 
		<?php endif ?>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse main-menu-item justify-content-end"
		id="navbarSupportedContent">
		<ul class="navbar-nav align-items-center">
			<?php if (!empty($home['menu_top'])): ?>
				<?php foreach ($home['menu_top'] as $key => $value): ?>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo $value['link'] ?>"><?php echo $value['title'] ?></a>
					</li>
				<?php endforeach ?>
			<?php endif ?>
			<!-- <li class="nav-item">
				<a class="nav-link" href="about.html">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="cource.html">Courses</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="blog.html">Blog</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Pages
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="single-blog.html">Single blog</a>
					<a class="dropdown-item" href="elements.html">Elements</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contact.html">Contact</a>
			</li>
			<li class="d-none d-lg-block">
				<a class="btn_1" href="#">Get a Quote</a>
			</li> -->
		</ul>
	</div>
</nav>