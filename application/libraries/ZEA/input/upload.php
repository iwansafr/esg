<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($field))
{
	if(!empty($this->id) && $this->init == 'edit')
	{
		$data_image = $this->CI->db->query('SELECT '.$field.' FROM '.$this->table.' WHERE id = ?',$this->id)->row_array();
		$data_image = @$data_image[$field];
		$image      = !empty($data_image) ? $this->id.'/'.$data_image : '';
	}else if($this->init == 'param')
	{
		if(!empty($this->dir_image))
		{
			$name = $this->dir_image;
		}
		$image    = !empty($data[$field]) ? $name.'/'.$data[$field] : '';
	}
	if (empty($this->accept[$field])) {
		$this->accept[$field] = $this->accept_file;
	}
	echo form_label(ucfirst($label), $label).' Max Size ('.$this->max_size.' KB)'.' '.$this->accept[$field].' '.@$this->help[$field];
	if(!empty($image))
	{
		?>
		<div class="image" data="<?php echo $field ?>">
			<span><a href="#del_image" class="del_image"><i class="fa fa-close" style="color: red;"></i></a></span>
			<a href="#">
				<?php 
				if(!empty($this->input[$field]['file']))
				{
					switch ($this->input[$field]['file']) {
						case 'video':
							
							break;
						case 'image':
							
							break;
						case 'document':
							?>
								<iframe src="<?php echo image_module($this->table, $image); ?>#toolbar=0&navpanes=0&scrollbar=0" frameborder="0" width="100%" height="500px;"></iframe>
							<?php
							break;
						case 'audio':
							?>
							<audio controls>
							  <source src="<?php echo image_module($this->table, $image) ?>" class="image" type="audio/mpeg">
							Browser Anda tidak mendukung untuk media audio ini
							</audio>
							<?php
							break;
						default:
							?>
							<img src="<?php echo image_module($this->table, $image) ?>" class="img-responsive image-thumbnail image" style="object-fit: cover;width: 200px;height: 140px;" data-toggle="modal" data-target="#img_<?php echo $field?>">
							<?php
							break;
					}
				}else{
					?>
					<img src="<?php echo image_module($this->table, $image) ?>" class="img-responsive image-thumbnail image" style="object-fit: cover;width: 200px;height: 140px;" data-toggle="modal" data-target="#img_<?php echo $field?>">
					<?php
				}
				?>
			</a>
		</div>

		<div class="modal fade" id="img_<?php echo $field?>" tabindex="-1" role="dialog" aria-labelledby="img_<?php echo $field?>">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="img_title_<?php echo $field?>"><?php echo $field;?></h4>
		      </div>
		      <div class="modal-body" style="text-align: center;">
		        <img src="<?php echo image_module($this->table, $image); ?>" class="img-thumbnail img-responsive">
		      </div>
		      <div class="modal-footer">
		      </div>
		    </div>
		  </div>
		</div>
		<br>
		<?php
	}
	$array_input = array(
		'name'   => $field,
		'class'  => 'form-control',
		'accept' => @$this->accept[$field],
		$required => $required,
		'value'  => $data[$field]
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
	echo !empty($this->file_error[$field]) ? msg($this->file_error[$field],'danger') : '';
	echo form_upload($array_input);
	if(!empty($this->id) || ($this->init == 'param'))
	{
		echo form_hidden($field,$data[$field]);
	}else{
		echo form_hidden($field,'');
	}
	?>
	<img src="" class="image_place" class="img img-responsive" style="object-fit: cover; height: 100px;" alt="">
	<?php
}