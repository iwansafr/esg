<?php defined('BASEPATH') OR exit('No direct script access allowed');
echo '<div class="row">';
if(!empty($this->esg->get_esg('home')))
{
	foreach ($this->esg->get_esg('home') as $key => $value) 
	{
		$attr = array();
		switch ($key) {
			case 'content':
				$attr['bg'] = 'bg-aqua';
				$attr['icon'] = 'database';
				break;
			case 'category':
				$attr['bg'] = 'bg-green';
				$attr['icon'] = 'bookmark';
				break;
			case 'tag':
				$attr['bg'] = 'bg-yellow';
				$attr['icon'] = 'circle-o';
				break;
			case 'user':
				$attr['bg'] = 'bg-red';
				$attr['icon'] = 'user';
				break;		
			default:
				$attr['bg'] = 'bg-aqua';
				$attr['icon'] = 'circle-o';
				break;
		}
		?>
		<div class="col-md-3">
			<div class="small-box <?php echo $attr['bg'] ?>">
			  <div class="inner">
			    <h3><?php echo $value ?></h3>

			    <p><?php echo $key ?></p>
			  </div>
			  <div class="icon">
			    <i class="fa fa-<?php echo $attr['icon'] ?>"></i>
			  </div>
			  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php
	}
}
echo '</div>';