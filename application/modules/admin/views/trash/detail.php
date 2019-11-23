<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($data['status'])
{
	?>
	<div class="panel panel-default card card-default">
		<div class="panel-heading card-header">
			detail
		</div>
		<div class="panel-body card-body">
			<table class="table table-bordered">
				<?php 
					foreach($data['data']['table_content'] AS $key => $value)
					{
						if (preg_match('/(\.jpg|\.jpeg|\.png|\.bmp)$/i', strtolower($value))) {
							$img_src = image_module('trash/'.$data['data']['table_title'],$data['data']['table_id'].'/'.$value);
							$value = '<img src="'.$img_src.'" class="img-responsive img-fluid">';
						}
						?>
						<tr>
							<td><?php echo $key ?></td>
							<td>:<?php echo $value ?></td>
						</tr>
						<?php
					}
				?>
			</table>
		</div>
		<div class="panel-footer card-footer">
			
		</div>
	</div>
	<?php
}else{
	msg('data not found','danger');
}