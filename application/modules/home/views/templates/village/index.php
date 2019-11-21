<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<div class="container">
		<?php $this->load->view('header') ?>
		<?php $this->load->view('menu_top') ?>
	</div>
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-9" style="padding: 20px;">
					<?php if ($mod['content'] == 'home/index'): ?>
						<?php $this->load->view('content_slider') ?>
						<?php 
						// $this->load->view('content') 
						?>
						<?php
						$this->load->view('content_top');
						$data_tmp['home'] = @$home;
						$data_tmp['home']['content_top'] = @$home['content'];
						$this->load->view('content_top', $data_tmp);
						$data_tmp['home']['content_top'] = @$home['content_bottom'];
						$this->load->view('content_top', $data_tmp);
						?>
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
						<?php $data_tmp['home'] = @$home; ?>
					</div>
					<br>
					<div class="sidebar">
						<?php 
						// $data_tmp['home']['widget_right'] = @$home['content_latest'];
						$this->load->view('content_latest');
						?>
					</div>
					<br>
					<div class="sidebar">
						<?php 
						// $data_tmp['home']['widget_right'] = @$home['content_popular'];
						$this->load->view('content_popular');
						?>
					</div>
					<br>
					<?php 
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
		<?php $this->load->view('footer') ?>
	</footer>
	<?php $this->load->view('js') ?>
</body>
</html>