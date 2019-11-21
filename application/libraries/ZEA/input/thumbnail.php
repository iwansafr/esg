<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	if($this->init == 'edit')
	{
		$data_value = $data[$field];

		echo form_label(ucfirst($label), $label).' '.@$this->help[$field];
	}else{
		$data_value = $dvalue[$ikey];
	}
	if(empty($this->image[$field]))
	{
		$this->image[$field]['module'] = $this->table;
	}
	if(!empty($this->image[$field]['src']))
	{
		$image_src = $data[$field];
	}else{
		if($this->init == 'roll' )
		{
			$image_src = image_module($this->image[$field]['module'], $dvalue['id'].'/'.$data_value);
		}else{
			$image_src = image_module($this->image[$field]['module'], $data['id'].'/'.$data_value);
		}
	}
	if(!empty($data_value))
	{
		$dvalue['id'] = !empty($dvalue['id']) ? $dvalue['id'] : time();
		if($this->init == 'edit' || $this->init == 'param')
		{
			echo form_hidden($field,$data_value);
		}
		?>
		<div class="image">
			<a href="#">
				<img src="<?php echo $image_src ?>" class="img-responsive image-thumbnail image" style="object-fit: cover;width: 50px;height: 50px;" data-toggle="modal" data-target="#img_<?php echo $field.'_'.$dvalue['id']?>">
			</a>
		</div>

		<div class="modal fade" id="img_<?php echo $field.'_'.$dvalue['id']?>" tabindex="-1" role="dialog" aria-labelledby="img_<?php echo $field.'_'.$dvalue['id']?>">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="img_title_<?php echo $field.'_'.$dvalue['id']?>"><?php echo $field.'_'.$dvalue['id'];?></h4>
		      </div>
		      <div class="modal-body" style="text-align: center;">
		        <img src="<?php echo $image_src; ?>" class="img-thumbnail img-responsive">
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>

		<?php
	}
}