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
					<?php if (empty($value['child'])): ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a>
						</li>
					<?php else: ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?php echo menu_link($value['link']) ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $value['title'] ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach ($value['child'] as $ckey => $cvalue): ?>
									<a class="dropdown-item" href="<?php echo menu_link($cvalue['link']) ?>"><?php echo $cvalue['title'] ?></a>
								<?php endforeach ?>
							</div>
						</li>

					<?php endif ?>
				<?php endforeach ?>
			<?php endif ?>
		</ul>
	</div>
</nav>