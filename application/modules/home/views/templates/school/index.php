<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('meta'); ?>
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('header') ?>
			<?php $this->load->view('menu_top') ?>
			<div class="clearfix"></div>
			<hr>
			<div class="row pt-5">
				<div class="col-lg-9">
					<?php 
					if($mod['content'] == 'home/index')
					{
						$this->load->view('content_slider');
						$this->load->view('content_top');
						$data_tmp['home'] = @$home;
						$data_tmp['home']['content_top'] = @$home['content'];
						$this->load->view('content_top', $data_tmp);
						$data_tmp['home']['content_top'] = @$home['content_bottom'];
						$this->load->view('content_top', $data_tmp);
					}else{
						$title = end($navigation['array']);
						?>
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
						$this->load->view($mod['content']);
					}
					?>
				</div>
				<div class="col-lg-3 pt-3">
					<div class="form-group">
						<form action="<?php echo base_url('search') ?>" method="get">
							<input type="text" name="keyword" class="form-control" placeholder="Search...">
						</form>
					</div>
					<?php $this->load->view('content_latest') ?>
					<?php 
					$data_tmp['home'] = @$home;
					$data_tmp['home']['content_latest'] = @$home['content_popular'];
					$this->load->view('content_latest', $data_tmp);
					$this->load->view('twitter_block');
					$data_tmp['home']['widget_right'] = @$home['category'];
					$this->load->view('widget_right', $data_tmp);
					$data_tmp['home']['widget_right'] = @$home['tag'];
					$this->load->view('widget_right', $data_tmp);
					?>
				</div>
			</div>
		</div>
		<hr>
		<?php $this->load->view('footer'); ?>
	</body>
</html>