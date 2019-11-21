<?php
if($dvalue[$field] > 1)
{
	?>
	<a href="">
		<button><i class="fa fa-arrow-up"></i></button>
	</a>
	<?php
}
if($dvalue[$field] < $max)
{
	?>
	<a href="">
		<button><i class="fa fa-arrow-down"></i></button>
	</a>
	<?php
}