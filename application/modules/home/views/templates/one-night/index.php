<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('meta'); ?>
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('menu_top'); ?>
			<?php $this->load->view('content_slider'); ?>
			<div class="clearfix"></div>
			<hr>
			<?php $this->load->view('content_hot'); ?>
			<hr>
			<div class="row">
				<div class="col-md-9">
					<?php $this->load->view('content_top'); ?>
					<?php $this->load->view('content') ?>
					<hr>
					<?php $this->load->view('content_bottom') ?>
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