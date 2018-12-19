<?php
$table = array('content_cat'=>'category','content_tag'=>'tag','content'=>'article','content'=>'article');
if(!empty($home['right']))
{
	?>
	<div class="card">
	  <div class="card-header">
	    <?php echo $table[$home['right']['table']] ?>
	  </div>
	  <ul class="list-group list-group-flush">
	  	<?php 
	  	foreach ($home['right']['data'] as $key => $value) 
	  	{
	  		$link = content_type_link($home['right']['table'], $value);
	  		echo '<li class="list-group-item"><a href="'.$link.'">'.$value['title'].'</a></li>';
	  	}
	  	?>
	  </ul>
	</div>
	<?php
}

if(!empty($home['menu_right']))
{
	?>
	<br>
	<div class="card">
	  <div class="card-header">
	    Menu
	  </div>
	  <ul class="list-group list-group-flush">
	  	<?php 
	  	foreach ($home['menu_right'] as $key => $value) 
	  	{
	  		echo '<li class="list-group-item"><a href="'.menu_link($value['link']).'">'.$value['title'].'</a></li>';
	  	}
	  	?>
	  </ul>
	</div>
	<?php
}

if(!empty($home['right_extra']))
{
	?>
	<br>
	<div class="card">
	  <div class="card-header">
	    <?php echo $table[$home['right_extra']['table']] ?>
	  </div>
	  <ul class="list-group list-group-flush">
	  	<?php 
	  	foreach ($home['right_extra']['data'] as $key => $value) 
	  	{
	  		$link = content_type_link($home['right_extra']['table'], $value);
	  		echo '<li class="list-group-item"><a href="'.$link.'">'.$value['title'].'</a></li>';
	  	}
	  	?>
	  </ul>
	</div>
	<?php
}