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
						    	$url = '';
									foreach ($navigation['array'] as $key => $value)
									{
										$url .= '/'.$value;
										if($key > 0)
										{
											echo '<li><a href="'.base_url($url).'">'.$value.'</a></li>';
										}
									}
						    }
						    ?>
						  </ol>
						</nav>
						<div class="col">
							<h5>Category <a href=""><span class="badge badge-secondary">Furniture</span></a></h5>
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