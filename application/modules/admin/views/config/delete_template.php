<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="panel panel-default">
	<div class="panel-heading">
		Delete Template <?php echo $title ?>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label>template <?php echo $title ?> Deleted</label><br>
		</div>
	</div>
	<div class="panel-footer">
		<a href="<?php echo base_url('admin/config/template_list')?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> back</a>
	</div>
</div>