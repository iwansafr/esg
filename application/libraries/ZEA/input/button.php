<?php defined('BASEPATH') OR exit('No direct script access allowed');
echo '<br>';
if(!empty($field))
{
	$field_name = '';
	if($this->init == 'edit' || $this->init == 'param')
	{
		if(!empty($this->id) || empty($this->value[$field]))
		{
			$data_value =  $data[$field];
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		}else{
			$data_value =  $this->value[$field];
			echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
		}
	}else{
		$data_value = $dvalue[$ikey];
		$field_name = '_row['.$dvalue['id'].']';
	}

	?>
	<a href="#" data-toggle="modal" data-target="#modal_browse_<?php echo $field?>" class="btn btn-default btn-sm" ><?php echo $label ?></a>
	<br>
		<div class="modal fade" id="modal_browse_<?php echo $field?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $field?>">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content" >
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="img_title_<?php echo $field?>"><?php echo $field;?></h4>
		      </div>
		      <div class="modal-body" style="max-height: 100%;">
		        <iframe src="<?php echo base_url('admin/media_pick_gallery?dir=content')?>" width="100%" height="100%">

		        </iframe>
		      </div>
		      <div class="modal-footer">
						<button class="btn btn-default hidden" id="select_image">Select</button>

		      </div>
		    </div>
		  </div>
		</div>
	<?php
	ob_start();
	?>
	<script type="text/javascript">

	</script>
	<?php
	$js_extra = ob_get_contents();
	$this->CI->session->set_userdata('js_extra', $js_extra);
	ob_end_clean();
}