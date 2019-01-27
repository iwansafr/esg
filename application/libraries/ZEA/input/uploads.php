<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($field))
{
	$image_src = array();
	if(!empty($this->id))
	{
		$data_image = $this->db->query('SELECT '.$field.' FROM '.$this->table.' WHERE id = ? ', $this->id)->row_array();
		$data_image = $data_image[$field];
		if(!empty($data_image))
		{
			if(empty(json_decode($data_image)))
			{
				$data_image = string_to_array($data_image);
			}
			$data_image = json_decode($data_image,1);
			foreach ($data_image as $di_key => $di_value)
			{
				$image_src[$di_key] = !empty($di_value) ? 'gallery'.'/'.$this->id.'/'.$di_value : '';;
			}
		}
	}else if($this->init == 'param')
	{
		if(!empty($data[$field]))
		{
			foreach ($data[$field] as $di_key => $di_value)
			{
				$image_src[$di_key] = !empty($di_value) ? 'gallery'.'/'.$name.'/'.$di_value : '';;
			}
		}
	}
	echo form_label(ucfirst($label), $label);
	echo '<br>';
	if(!empty($image_src))
	{
		foreach ($image_src as $im_key => $im_value)
		{
			$multi_file = pathinfo($im_value);
			$image_type = array('jpg','jpeg','png','gif');
			$file_type = array('doc','docs','xls','xlsx','pdf','ppt','pptx');
			?>
			<div class="col-md-2">
				<div class="image" data="<?php echo $data_image[$im_key] ?>">
					<?php if (in_array(strtolower($multi_file['extension']), $image_type)): ?>
						<a href="#">
							<img src="<?php echo image_module($this->table, $im_value) ?>" class="img-responsive image-thumbnail image" style="object-fit: cover;width: 200px;height: 140px;" data-toggle="modal" data-target="#img_<?php echo $field.$im_key?>">
						</a>
						<span><a href="#del_image" class="del_images"><i class="fa fa-close" style="position: relative;top: -135px;right: -180px;color: red;"></i></a></span>
					<?php else: ?>
						<a href="<?php echo image_module($this->table, $im_value); ?>">
							<i class="fa fa-file-alt" style="font-size: 140px;" title="<?php echo $multi_file['basename'] ?>"></i>
						</a>
						<span><a href="#del_image" class="del_images"><i class="fa fa-close" style="position: relative;top: -110px;right: 15px;color: red;"></i></a></span>
					<?php endif ?>
				</div>

				<div class="modal fade" id="img_<?php echo $field.$im_key?>" tabindex="-1" role="dialog" aria-labelledby="img_<?php echo $field.$im_key?>">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="img_title_<?php echo $field.$im_key?>"><?php echo $field.' '.$im_key;?></h4>
				      </div>
				      <div class="modal-body" style="text-align: center;">
				        <img src="<?php echo image_module($this->table, $im_value); ?>" class="img-thumbnail img-responsive">
				      </div>
				      <div class="modal-footer">
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<?php
		}
	}
	$value_input = json_encode($data[$field]);
	$array_input = array(
		'name'   => $field.'[]',
		'class'  => 'form-control',
		'accept' => @$this->accept[$field],
		$required => $required,
		// 'value'  => $value_input
		);
	if(!empty($this->attribute[$field]))
	{
		$attr = $this->attribute[$field];
		if(is_array($attr))
		{
			foreach ($attr as $attr_key => $attr_value)
			{
				$array_input[$attr_key] = $attr_value;
			}
		}else{
			$array_input[$attr] = $attr;
		}
	}
	echo form_upload($array_input);

	if(!empty($this->id) || ($this->init == 'param'))
	{
		$data_loop = ($this->init == 'param') ? $data[$field] : $data_image;
		// if(is_array($data_loop))
		// {
		// 	$data_loop = json_encode($data_loop);
		// }
		// echo form_hidden($field, $data_loop);
		if(!empty($data_loop) && is_array($data_loop))
		{
			// pr($data_loop);
			foreach ($data_loop as $di_key => $di_value)
			{
				// echo form_hidden($field.'[]',$di_value);
				echo form_hidden($field.'[]',$di_value);
			}
		}
	}else{
		echo form_hidden($field,'');
	}
	// $this->session->set_userdata('link_js', base_url().'templates/admin/');
}