<?php

if(!empty($content))
{
	?>
	<center>
		<h3><?php echo $content['title'] ?></h3>
		<figure class="figure">
			<img class="img-responsive image" src="<?php echo image_module('content', $content['id'].'/'.$content['image'])?>">
			<figcaption class="figure-caption text-center"><?php echo $content['title'] ?></figcaption>
			<?php 
			$data = $content['images'];
			if(!empty($data))
			{
				$data = json_decode($data);
				$i = 1;
				foreach ($data as $key => $value) 
				{
					?>
					<img src="<?php echo image_module('content', 'gallery'.'/'.$content['id'].'/'.$value);?>"  data-toggle="modal" data-target="#img-<?php echo $i;?>" class="img-responsive" style="object-fit: cover;height: 50px;">
					<!-- Modal -->
					<div class="modal fade" id="img-<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="img-<?php echo $i;?>" aria-hidden="true">
					  <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="img-<?php echo $i;?>">Modal title</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					    		<img src="<?php echo image_module('content', 'gallery'.'/'.$content['id'].'/'.$value);?>" class="img-responsive" style="width:100%;">    
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>								
					<?php
					$i++;
				}
			}
			?>
		</figure>
	</center>
	<?php
	echo $content['content'];
}