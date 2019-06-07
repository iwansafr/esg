<?php defined('BASEPATH') OR exit('No direct script access allowed');
$navigation = $this->esg->get_esg('navigation');
$title = end($navigation['array']);
$title = $title == 'admin' ? 'home' : $title;
?>
<h1>
	<?php echo str_replace('_',' ',$title) ?>
</h1>
<ol class="breadcrumb">
	<?php
	echo '<li><a href="'.base_url('admin').'"> <i class="fa fa-home"></i> Home</a></li>';
	$nav_tot = count($navigation['array']) - 1;
	if($nav_tot > 1)
	{
		$url = '';
		foreach ($navigation['array'] as $key => $value)
		{
			$url .= '/'.$value;
			if($key < $nav_tot)
			{
				echo '<li><a href="'.base_url($url).'">'.$value.'</a></li>';
			}else{
				echo '<li>'.$value.'</li>';
			}
		}
	}
	?>
</ol>