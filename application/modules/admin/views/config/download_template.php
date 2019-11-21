<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel panel-default">
	<div class="panel-heading">
		Download Template <?php echo $title ?>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label>Click button Bellow to Download template <?php echo $title ?></label><br>
			<a href="<?php echo base_url('images/tmp/'.$title.'.zip') ?>" class="btn btn-sm btn-default" no_load="no_load"><i class="fa fa-download"></i> Download</a>
		</div>
	</div>
	<div class="panel-footer">
		<a href="<?php echo base_url('admin/config/template_list')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> back</a>
	</div>
</div>