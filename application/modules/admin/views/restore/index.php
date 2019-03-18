<?php 
if(is_root() || is_admin())
{
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>Restore</h5>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>data</td>
						<td>action</td>
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