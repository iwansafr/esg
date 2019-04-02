<?php 
if(is_root() || is_admin())
{
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>Restore</h5>
		</div>
		<div class="panel-body">
			<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#restore_form">Upload</a>
					</h4>
				</div>
				<form method="post" action="" enctype="multipart/form-data">
					<div id="restore_form" class="panel-collapse collapse">
						<div class="panel-body">
								<div class="form-group">
									<label>Upload Backup</label>
									<input type="file" name="brf" class="form-control">
								</div>
						</div>
						<div class="panel-footer">
							<button class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>data</th>
						<th>action</th>
					</tr>
					<?php 
					foreach (glob(FCPATH.'images/modules/backup/*.zip') AS $value) 
					{
						$name = explode('/',$value);
						$name = end($name);
						$name = str_replace('.zip', '', $name);
						echo '<tr><td>'.$name.'</td>';
						echo '<td><a href="'.base_url('admin/restore/data/'.$name).'" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Restore</a></td></tr>';
					}
					?>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			esoftgreat
		</div>
	</div>
	<?php
}else{
	msg('you dont have permision to access this site','danger');
}