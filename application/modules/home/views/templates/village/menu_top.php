<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<nav class="navbar navbar-expand-lg navbar-light" id="main_navbar">
	<div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>">
			<?php if (!empty($logo['image'])): ?>
				<img src="<?php echo image_module('config','logo'.'/'.$logo['image']) ?>" class="img img-responsive" alt="<?php echo $site['title'] ?>" width="<?php echo $logo['width'] ?>" height="<?php echo $logo['height'] ?>" >
			<?php else: ?>
				<strong><?php echo $site['title'] ?></strong>
			<?php endif ?>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<?php if (!empty(@$home['menu_top'])): ?>
        <ul class="navbar-nav mr-auto">
        	<?php foreach ($home['menu_top'] as $key => $value): ?>
        		<?php if (empty($value['child'])): ?>
	            <li class="nav-item active">
	                <a class="nav-link" href="<?php echo $value['link'] ?>"><?php echo $value['title'] ?></a>
	            </li>
	          <?php else: ?>
	            <li class="nav-item dropdown">
	              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_<?php echo $value['id']?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <?php echo $value['title'] ?>
								</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown_<?php echo $value['id']?>">
                	<?php foreach ($value['child'] as $ckey => $cvalue): ?>
                		<?php if (empty($cvalue['child'])): ?>
                			<a class="dropdown-item" href="<?php echo $cvalue['link'] ?>"><?php echo $cvalue['title'] ?></a>
                		<?php else: ?>
	                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown<?php echo $cvalue['id']?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php echo $cvalue['title'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo $cvalue['id']?>">
                        	<?php foreach ($cvalue['child'] as $gckey => $gcvalue): ?>
                        		<?php if (empty($gcvalue['child'])): ?>
                          		<li><a class="dropdown-item" href="<?php echo $gcvalue['link'] ?>"><?php echo $gcvalue['title'] ?></a></li>
                          	<?php else: ?>
	                            <li class="nav-item dropdown">
                                  <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown<?php echo $gcvalue['id']?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $gcvalue['title'] ?>
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo $gcvalue['id']?>">
                                  	<?php foreach ($gcvalue['child'] as $ggckey => $ggcvalue): ?>
                                      <li><a class="dropdown-item" href="<?php echo $ggcvalue['link'] ?>"><?php echo $ggcvalue['title'] ?></a></li>
                                  	<?php endforeach ?>
                                  </ul>
                              </li>
                        		<?php endif ?>
                        	<?php endforeach ?>
                        </ul>
                      </li>
                		<?php endif ?>
                	<?php endforeach ?>
                </ul>
	            </li>
        		<?php endif ?>
        	<?php endforeach ?>
        </ul>
    	<?php endif ?>
      <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('search') ?>" method="get">
				<div class="input-btn">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search" style="border: none;box-shadow: none;outline: none;">
					<button style="background: transparent;border: none;outline: none;color: #555;font-size: 16px;" type="submit"><i class="fas fa-search"></i></button>
				</div>
			</form>
    </div>
	</div>
</nav>