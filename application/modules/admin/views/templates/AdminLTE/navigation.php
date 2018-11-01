<?php defined('BASEPATH') OR exit('No direct script access allowed');
$navigation = $this->esg_model->esg_data['navigation'];
$title = end($navigation['array']);
$title = $title == 'admin' ? 'home' : $title;
?>
<h1>
	<?php echo $title ?>
</h1>
<ol class="breadcrumb">
	<?php
	echo '<li><a href="'.base_url('admin').'"> <i class="fa fa-dashboard"></i> Home</a></li>';
	if(count($navigation['array']) > 1)
	{
		$url = '';
		foreach ($navigation['array'] as $key => $value)
		{
			$url .= '/'.$value;
			if($key > 0)
			{
				echo '<li><a href="'.base_url($url).'">'.$value.'</a></li>';
			}
		}
	}
	?>
</ol>