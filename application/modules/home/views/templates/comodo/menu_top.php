<nav class="navbar navbar-expand-lg navbar-light">
	<?php if (!empty($home['menu_top'])): ?>
		<div class="container">
			<?php if (is_admin() || is_root()): ?>
				<a href="<?php echo base_url('admin/config/logo') ?>" class="esg_edit"><i class="fa fa-pencil"></i></a>
			<?php endif ?>
			<a class="navbar-brand logo_h" href="<?php echo base_url() ?>">
				<img src="<?php echo image_module('config/logo', @$logo['image']) ?>" alt="<?php echo @$logo['title'] ?>" style="max-width: <?php echo @$logo['width'] ?>px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
				<ul class="nav navbar-nav menu_nav justify-content-center">
					<?php
		      foreach ($home['menu_top'] as $key => $value)
		      {
		        if(empty($value['child']))
		        {
		          ?>
		          <li class="nav-item">
		            <a href="<?php echo menu_link($value['link']) ?>" class="nav-link"><?php echo $value['title'] ?></a>
		          </li>
		          <?php
		        }else{
		          ?>
		          <li class="nav-item submenu dropdown">
		            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		              <?php echo $value['title'] ?>
		            </a>
		            <ul class="dropdown-menu">
		              <?php
		              foreach ($value['child'] as $ckey => $cvalue)
		              {
		                if(empty($cvalue['child']))
		                {
		                  ?>
		                  <li class="nav-item">
		                    <a class="nav-link" href="<?php echo menu_link($cvalue['link']) ?>"><?php echo $cvalue['title'] ?></a>
		                  </li>
		                  <?php
		                }else{
		                  ?>
		                  <li class="nav-item submenu dropdown">
		                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		                      <?php echo $cvalue['title'] ?>
		                    </a>
		                    <ul class="dropdown-menu">
		                      <?php
		                      foreach ($cvalue['child'] as $cckey => $ccvalue)
		                      {
		                        ?>
		                        <li class="nav-item"><a class="nav-link" href="<?php echo menu_link($ccvalue['link']) ?>"><?php echo $ccvalue['title'] ?></a></li>
		                        <?php
		                      }
		                      ?>
		                    </ul>
		                  </li>
		                  <?php
		                }
		              }
		              ?>
		            </ul>
		          </li>
		          <?php
		        }
		      }
		      ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item"><a href="" class="primary_btn">join us</a></li>
				</ul>
			</div>
		</div>
	<?php endif ?>
</nav>