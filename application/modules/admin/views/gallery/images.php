<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="panel panel-default">
	<div class="panel-heading">
		gallery
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<?php
				if(!empty($images))
				{
					$pictures = @$images['image'];
					$gallery_pictures = @$images['gallery'];
					$data_pictures = @$images['table_data']['data'];
					$pagination = @$images['table_data']['pagination'];
					if(!empty($pictures))
					{
						foreach ($pictures as $key => $value) 
						{
							foreach ($data_pictures as $dkey => $dvalue) 
							{
								$index = 'id';
								if($module == 'config')
								{
									$index = 'name';
								}else{
									$index = 'id';
								}
								if($dvalue[$index] == $value['id'])
								{
									$link_image = str_replace(FCPATH,base_url(),$value['path']);
									if(!empty(@getimagesize($link_image)))
									{
										?>
										<div class="col-md-3">
											<img src="<?php echo $link_image ?>" alt="" class="img-responsive" width="200">
										</div>
										<?php
									}
								}
							}
						}
					}
					if(!empty($gallery_pictures))
					{
						foreach ($gallery_pictures as $key => $value) 
						{
							foreach ($data_pictures as $dkey => $dvalue) 
							{
								if($dvalue['id'] == $value['0']['id'])
								{
									foreach ($value as $gkey => $gvalue) 
									{
										$link_image = str_replace(FCPATH,base_url(),$gvalue['path'].'/'.$gvalue['name']);
										if(!empty(@getimagesize($link_image)))
										{
											?>
											<div class="col-md-3">
												<img src="<?php echo $link_image ?>" alt="" class="img-responsive" width="200">
											</div>
											<?php
										}
									}
								}	
							}
						}
					}
				}
				?>				
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<?php echo @$pagination;?>
		
	</div>
</div>