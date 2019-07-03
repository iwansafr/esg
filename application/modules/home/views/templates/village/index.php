<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<?php $this->load->view('menu_top') ?>
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-9" style="padding: 20px;">
					<?php if ($mod['content'] == 'home/index'): ?>
						<?php $this->load->view('content_slider') ?>
						<?php $this->load->view('content') ?>
					<?php else: ?>
						<?php $title = end($navigation['array']);?>
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
						    <?php 
						    if(count($navigation['array'])>1)
						    {
						    	$value = end($navigation['array']);
									$url = '/'.$value;
									echo '<li class="breadcrumb-item active" aria-current="page">'.$value.'</li>';
						    }
						    if(!empty($content['title']))
						    {
						    	echo '<li class="breadcrumb-item active" aria-current="page">'.$content['title'].'</li>';
						    }
						    ?>
						  </ol>
						</nav>
						<div class="col">
							<h5>
								<?php 
								if(!empty($navigation['array'][1]))
						    {
									$type = $navigation['array'][0];
									echo $type.' of ';
					    		$slug  = str_replace('.html','', $navigation['array'][1]);
					    		$title = str_replace('-', ' ', $slug);
				    			$link  = '';
				    			switch ($type) {
				    				case 'category':
				    					$link = content_cat_link($slug);
				    					break;
				    				case 'tag':
				    					$link = content_tag_link($slug);
				    					break;
				    				default:
				    					$link = '';
				    					break;
				    			}
				    			echo '<a href="'.$link.'"><span class="badge badge-secondary">'.$title.'</span></a>';
									echo ' ';		
						    }
								?>
							</h5>
						</div>
						<hr>
						<?php
						$this->load->view($mod['content']);?>
					<?php endif ?>
				</div>
				<div class="col-md-3" style="padding: 20px;">
					<div class="sidebar">
						<?php $this->load->view('twitter_block') ?>
					</div>
					<br>
					<?php 
					$data_tmp['home'] = @$home;
					$data_tmp['home']['widget_right'] = @$home['category'];
					?>
					<div class="sidebar">
						<?php $this->load->view('widget_right', $data_tmp) ?>
					</div>
					<br>
					<div class="sidebar">
						<?php 
						$data_tmp['home']['widget_right'] = @$home['tag'];
						$this->load->view('widget_right', $data_tmp);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3>Sipapat</h3>
					<ul>
						<li><i class="fas fa-location-arrow"></i> <p>Srobyong, Mlonggo, Jepara, Jawa Tengah</p></li>
						<li><i class="far fa-envelope"></i> <p>infodesa@yahoo.com</p></li>
						<li><i class="fas fa-phone-alt"></i> <p>+62 890 898 890</p></li>
					</ul>
				</div>	
				<div class="col-md-3">
					<h5>Nav Links</h5>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Kategori</a></li>
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Kontak</a></li>
						<li><a href="#">Acara</a></li>
						<li><a href="#">Donatur</a></li>
						<li><a href="#">Dana</a></li>
					</ul>
				</div>	
				<div class="col-md-3">
					<h5>Nav Links</h5>
					<ul>
						<li>Satu</li>
						<li>Dua</li>
						<li>Tiga</li>
						<li>Empat</li>
						<li>Lima</li>
					</ul>
				</div>	
				<div class="col-md-3">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<form>
						<div class="input-btn">
							<input type="text" name="" placeholder="Your email">
							<button style="font-weight: bold;text-transform: uppercase;">Subscribe</button>
						</div>
					</form>
				</div>	
			</div>
			<br>
			<hr>
			<p style="margin: 0;padding: 0;height: 60px;line-height: 45px;">&copy; Copyright 2019 All Right Reserved. <a style="color: #16a085;" href="https://github.com/salungp">BySalung</a></p>
		</div>
	</footer>
	<?php $this->load->view('js') ?>
</body>
</html>