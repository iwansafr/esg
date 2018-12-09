<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('meta'); ?>
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('menu_top'); ?>
			<?php 
			if($mod['content'] == 'home/index')
			{
				$this->load->view('content_slider'); 
			}
			?>
			<div class="clearfix"></div>
			<hr>
			<?php 
			$this->load->view('content_hot'); 
			?>
			<hr>
			<div class="row">
				<div class="col-md-9">
					<?php 
					if($mod['content'] == 'home/index')
					{
						$this->load->view('content_top'); 
						$this->load->view('content');
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
							<h5>Category 
								<?php 
								if(!empty($content['cat']))
								{
									foreach ($content['cat'] as $ckey => $cvalue) 
									{
										echo '<a href="'.content_cat_link($cvalue['slug']).'"><span class="badge badge-secondary">'.$cvalue['title'].'</span></a>';
										echo ' ';
									}
								}
								?>
							</h5>
						</div>
						<hr>
						<?php
						$this->load->view($mod['content']);
					}
					?>
					<hr>
					<?php 
					if($mod['content'] == 'home/index')
					{
						$this->load->view('content_bottom');
					}
					?>
				</div>
				<div class="col">
					<?php $this->load->view('right'); ?>
				</div>
			</div>
		</div>
		<hr>
		<?php $this->load->view('footer'); ?>
	</body>
</html>