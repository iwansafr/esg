<?php defined('BASEPATH') OR exit('No direct script access allowed');
// .bg-red,
// .bg-yellow,
// .bg-aqua,
// .bg-blue,
// .bg-light-blue,
// .bg-green,
// .bg-navy,
// .bg-teal,
// .bg-olive,
// .bg-lime,
// .bg-orange,
// .bg-fuchsia,
// .bg-purple,
// .bg-maroon,
// .bg-black,
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
				$attr['link'] = base_url('admin/content/list');
				break;
			case 'category':
				$attr['bg'] = 'bg-blue';
				$attr['icon'] = 'bookmark';
				$attr['link'] = base_url('admin/content/category');
				break;
			case 'tag':
				$attr['bg'] = 'bg-green';
				$attr['icon'] = 'anchor';
				$attr['link'] = base_url('admin/content/tag');
				break;
			case 'menu':
				$attr['bg'] = 'bg-orange';
				$attr['icon'] = 'bars';
				$attr['link'] = base_url('admin/menu/list');
				break;
			case 'menu_position':
				$attr['bg'] = 'bg-red';
				$attr['icon'] = 'columns';
				$attr['link'] = base_url('admin/menu/position');
				break;		
			case 'user':
				$attr['bg'] = 'bg-teal';
				$attr['icon'] = 'user';
				$attr['link'] = base_url('admin/user/list');
				break;		
			case 'user_role':
				$attr['bg'] = 'bg-maroon';
				$attr['icon'] = 'book';
				$attr['link'] = base_url('admin/user/role');
				break;			
			default:
				$attr['bg'] = 'bg-light-blue';
				$attr['icon'] = 'circle-o';
				$attr['link'] = base_url('admin');
				break;
		}
		?>
		<div class="col-md-3">
			<div class="small-box <?php echo $attr['bg'] ?>">
			  <div class="inner">
			    <h3><?php echo $value ?></h3>

			    <p><?php echo str_replace('_',' ',$key) ?></p>
			  </div>
			  <div class="icon">
			    <i class="fa fa-<?php echo $attr['icon'] ?>"></i>
			  </div>
			  <a href="<?php echo $attr['link'] ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php
	}
}
echo '</div>';
if(is_root())
{
	// pr(ip_detail(ip()));
}
?>
