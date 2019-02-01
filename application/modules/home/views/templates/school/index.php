<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('meta', $this->esg->get_esg()); ?>
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('menu_top') ?>
			<div class="clearfix"></div>
			<hr>
			<div class="row">
				<div class="col-lg-9">
					<?php
					$this->load->view('content_slider');
					$this->load->view('content_top');
					$data_tmp['home'] = $home;
					$data_tmp['home']['content_top'] = $home['content'];
					$this->load->view('content_top', $data_tmp);
					$data_tmp['home']['content_top'] = $home['content_bottom'];
					$this->load->view('content_top', $data_tmp);
					?>
				</div>
				<div class="col-lg-3">
					<div class="form-group top-20">
						<input type="text" name="" class="form-control" placeholder="Search...">
					</div>
					<?php $this->load->view('content_latest') ?>
					<?php $data_tmp['home']['content_latest'] = $home['content_popular']; ?>
					<?php 
					$this->load->view('content_latest', $data_tmp);
					$data_tmp['home']['widget_right'] = $home['category'];
					$this->load->view('widget_right', $data_tmp);
					$data_tmp['home']['widget_right'] = $home['tag'];
					$this->load->view('widget_right', $data_tmp);
					?>
				</div>
			</div>
		</div>
		<hr>
		<?php $this->load->view('footer'); ?>
	</body>
</html>