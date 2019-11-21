<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($data['upload_data']))
{
	msg($data['upload_data']['client_name'] . ' updated successfully','success');
}else{
	if(!empty($_POST))
	{
		$error = str_replace('<p>','',$data['error']);
		$error = str_replace('</p>','',$error);
		msg($error, 'danger');
	}
}

echo '<a href="" class="btn btn-default btn-sm"><i class="fa fa-sync"></i> Refresh</a>';
foreach(glob(FCPATH.'images/*.png') as $file)
{
	$file = str_replace(FCPATH, '', $file);
	$name = str_replace('images/', '', $file);
	$name = str_replace('.png', '', $name);
	?>
	<form action="" method="post" enctype="multipart/form-data" name="<?php echo str_replace(' ', '-', $name) ?>">
		<div class="panel panel-default card card-default">
			<div class="panel-heading card-header">
				<?php echo $name ?>
			</div>
			<div class="panel-body card-body">
				<div class="form-group">
					<img src="<?php echo base_url($file) ?>" alt="" width="200">
				</div>
				<div class="form-group">
					<input type="file" class="form-control" name="image" accept=".png">
				</div>

			</div>
			<div class="card-footer panel-footer">
				<button class='btn btn-sm btn-success' name="item" value="<?php echo $name ?>"><i class="fa fa-floppy-o"></i> Submit</button>
			</div>
		</div>
	</form>
	<?php
}