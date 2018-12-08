<?php
if(!empty($home['right']))
{
	?>
	<div class="card">
	  <div class="card-header">
	    Category
	  </div>
	  <ul class="list-group list-group-flush">
	  	<?php 
	  	foreach ($home['right'] as $key => $value) 
	  	{
	  		echo '<li class="list-group-item"><a href="'.content_cat_link($value['slug']).'">'.$value['title'].'</a></li>';
	  	}
	  	?>
	  </ul>
	</div>
	<?php
}