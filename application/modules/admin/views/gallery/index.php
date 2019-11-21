<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style type="text/css">
	.folder{
		font-size: 24px;
		color: #78a5a5;
		text-align: center;
	}
</style>
<div class="panel panel-default">
	<div class="panel-heading">
		gallery
	</div>
	<div class="panel-body">
		<div class="row">
			<?php
			if(!empty($module))
			{
				foreach ($module as $key => $value) 
				{
					?>
						<div class="col-md-3 col-xs-6 folder">
							<a href="<?php echo base_url('admin/gallery/images/'.$value['name']) ?>" class="folder"><i class="fa fa-folder"></i><br> <?php echo str_replace('_',' ',$value['name']) ?></a>
						</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<div class="panel-footer">
		
	</div>
</div>