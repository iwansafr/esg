<?php defined('BASEPATH') OR exit('No direct script access allowed');
$active_template = $this->esg->get_config('templates');
if(!empty($active_template))
{
	$active_template = @$active_template['public_template'];
	foreach(glob(FCPATH.'application/modules/home/views/templates/'.$active_template.'/index.esg') as $file)
	{
		if(!empty($_POST))
		{
			$config       = $_POST;
			$config_title = $config['template'].'_widget';
			$this->zea->init('param');
			$this->zea->setTable('config');
			$this->zea->setParamName($config_title);
			$this->zea->setFormName('config_widget');
			$message = $this->zea->action();
			if(!empty($message))
			{
				msg($message['msg'], $message['alert']);
			}
		}
		$config_name = $active_template.'_widget';
		$data = $this->esg->get_config($config_name);
		$view = file_get_contents($file);
		preg_match_all('~{.*?}~', $view, $blocks);
		$block = array();
		foreach ($blocks as $key => $value)
		{
			$block = $value;
		}
		$blocks = array();
		$this->db->select('id,title');
		$cat = $this->db->get_where('content_cat', 'publish = 1')->result_array();
		$cat[] = array('id'=>0, 'title'=>'Latest');
		foreach ($cat as $catkey => &$catvalue)
		{
			$catvalue['id'] = 'cat_'.$catvalue['id'];
		}

		$this->db->select('id,title');
		$prodcat = $this->db->get_where('product_cat', 'publish = 1')->result_array();
		$prodcat[] = array('id'=>0, 'title'=>'Latest');
		foreach ($prodcat as $prodcatkey => &$prodcatvalue)
		{
			$prodcatvalue['id'] = 'prodcat_'.$prodcatvalue['id'];
		}

		$this->db->select('id,title');
		$menu = $this->db->get_where('menu_position')->result_array();
		foreach ($menu as $menukey => &$menuvalue)
		{
			$menuvalue['id'] = 'menu_'.$menuvalue['id'];
		}
		// $option_block = array_merge($cat, $menu);
		echo '<form method="post" action="">';
		echo '<input type="hidden" name="template" value="'.$active_template.'">';
		foreach ($block as $blockkey => $blockvalue)
		{
			$block_title = str_replace('{','', $blockvalue);
			$block_title = str_replace('}','', $block_title);

			ob_start();
			$this->zea->open_collapse($block_title, str_replace('_',' ',$block_title),'default');
			echo '<h3>'.str_replace('_',' ',$block_title).'</h3>';
			echo '<label>content</label>';
			?>
			<select class="form-control" name="<?php echo $block_title?>[content]">
			<?php
			$option_block = array();
			if(preg_match('~menu_~', $block_title))
			{
				$option_block = $menu;
			}else if(preg_match('~product_~', $block_title)){
				$option_block = $prodcat;
			}else{
				$option_block = $cat;
			}
			echo '<option value="0">None</option>';
			foreach ($option_block as $keys => $values)
			{
				$selected = ($values['id'] == $data[$block_title]['content']) ? 'selected' : '';
				echo '<option value="'.$values['id'].'" '.$selected.'>'.$values['title'].'</option>';
			}
			echo '</select>';
			if(!preg_match('~menu_~', $block_title))
			{
				echo '<label>limit</label>';
				$limit = !empty($data[$block_title]['limit']) ? $data[$block_title]['limit'] : '7';
				?>
				<input type="number" name="<?php echo $block_title ?>[limit]" class="form-control" value="<?php echo $limit ?>">
				<?php
			}
			$this->zea->close_collapse();
			$options = ob_get_contents();
			ob_end_clean();
			$view = preg_replace('~'.$blockvalue.'~', $options, $view);
		}
		// $view = preg_replace('~{top}~', $array, $view);
		echo $view;
		echo '<hr>';
		echo '<button class="btn btn-success" name="config_widget" value="submit"><span><i class="fa fa-floppy-o"></i></span> SAVE</button>';
		echo '</form>';
	}
}

