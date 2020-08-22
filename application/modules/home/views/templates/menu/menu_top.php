<?php
if(!empty($home['menu_top']))
{
	echo '<div class="dropdown">';
		echo $this->home_model->build_menu('menu_top',$block['menu_top']['content']);
	echo '</div>';
}
?>
<hr>