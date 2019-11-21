<?php
if(!empty($home['content']))
{
	?>
	<ul class="list-unstyled">
		<?php
		$i = 1;
		foreach ($home['content'] as $key => $value)
		{
			$css = ($i%2 == 0) ? 'my-4' : '';
			?>
		  <li class="media <?php echo $css ?>">
		  	<a href="<?php echo content_link($value['slug']) ?>"><img class="thumb mr-3" src="<?php echo image_module('content', $value['id'].'/'.$value['image']);?>" alt="<?php echo $value['title'] ?>"></a>
		    <div class="media-body">
		    	<a href="<?php echo content_link($value['slug']) ?>"><h5 class="mt-0 mb-1"><?php echo $value['title'] ?></h5></a>
		      <?php echo $value['intro'] ?>
		    </div>
		  </li>
			<?php
			$i++;
		}
		?>
	</ul>
	<?php
}