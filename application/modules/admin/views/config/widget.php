<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(is_admin() || is_root())
{
	$active_template = $this->esg->get_config('templates');
	echo '<a href="'.base_url($this->esg->get_esg('navigation')['string']).'" class="btn btn-warning pull-right" title="refresh"><i class="fa fa-sync"></i></a>';
	echo '<a href="'.base_url().'" target="_blank" class="btn btn-info pull-right" title="display"><i class="fa fa-eye"></i></a>';
	echo '<form method="post" action="" name="config_widget">';
	echo '<button class="btn btn-success pull-right" title="save" value="submit" name="config_widget"><span><i class="fa fa-save"></i></span></button>';
	if(!empty($active_template))
	{
		$active_template = @$active_template['public_template'];
		foreach(glob(FCPATH.'application/modules/home/views/templates/'.$active_template.'/index.esg') as $file)
		{
			echo '<div class="panel panel-default">';
			echo '<div class="panel panel-heading">';
			echo '<h3 class="panel-title">Manage Widget</h3>';
			echo '</div>';
			echo '<div class="panel panel-body">';
			if(!empty($_POST))
			{
				$config       = $_POST;
				$config_title = @$config['template'].'_widget';
				$this->zea->init('param');
				foreach ($_POST as $key => $value) 
				{
					if($key!='config_widget')
					{
						$this->zea->addInput($key,'hidden');
						$this->zea->setValue($key,$value);
					}
				}
				$this->zea->setTable('config');
				$this->zea->setParamName($config_title);
				$this->zea->setFormName('config_widget');
				$message = $this->zea->action();
				if(!empty($message))
				{
					foreach ($message as $key => $value) 
					{
						if(!empty($value['msg']) && !empty($value['alert']))
						{
							msg($value['msg'], $value['alert']);
						}
					}
				}
			}
			$config_name = $active_template.'_widget';
			$data = $this->esg->get_config($config_name);
			$view = file_get_contents($file);
			preg_match_all('~{.*?}~', $view, $blocks);
			preg_match_all('~#.*?#~', $view, $links);
			$block = array();
			$link = array();
			foreach ($blocks as $key => $value)
			{
				$block = $value;
			}
			foreach ($links as $key => $value)
			{
				$link = $value;
			}
			$blocks = array();
			$links = array();
			$this->db->select('id,title');
			$cat = $this->db->get_where('content_cat', 'publish = 1')->result_array();
			$cat[] = array('id'=>'latest', 'title'=>'Latest Content');
			$cat[] = array('id'=>'popular', 'title'=>'Most Popular');
			foreach ($cat as $catkey => &$catvalue)
			{
				$catvalue['id'] = $catvalue['id'];
			}

			$this->db->select('id,title');
			$prodcat = $this->db->get_where('product_cat', 'publish = 1')->result_array();
			$prodcat[] = array('id'=>'latest', 'title'=>'Latest Product');
			$prodcat[] = array('id'=>'popular', 'title'=>'Most Popular');
			foreach ($prodcat as $prodcatkey => &$prodcatvalue)
			{
				$prodcatvalue['id'] = $prodcatvalue['id'];
			}

			$this->db->select('id,title');
			$menu = $this->db->get_where('menu_position')->result_array();
			foreach ($menu as $menukey => &$menuvalue)
			{
				$menuvalue['id'] = $menuvalue['id'];
			}
			// $option_block = array_merge($cat, $menu);
			echo '<input type="hidden" name="template" value="'.$active_template.'">';
			foreach ($block as $blockkey => $blockvalue)
			{
				$block_title = str_replace('{','', $blockvalue);
				$block_title = str_replace('}','', $block_title);

				ob_start();
				$this->zea->setCollapse($block_title,TRUE);
				$this->zea->open_collapse($block_title, str_replace('_',' ',$block_title),'default');
				echo '<h3>'.str_replace('_',' ',$block_title).'</h3>';
				if($block_title=='twitter_widget')
				{
					$limit = !empty($data[$block_title]['limit']) ? $data[$block_title]['limit'] : '7';
					echo '<label>twitter link</label>';
					?>
					<div class="form-group">
						<input type="text" name="<?php echo $block_title ?>[content]" class="form-control" value="<?php echo @$data[$block_title]['content'] ?>">
					</div>
					<div class="form-group">
						<input type="number" name="<?php echo $block_title ?>[limit]" class="form-control" value="<?php echo $limit ?>">
					</div>
					<?php
				}else{
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
					}else if(preg_match('~content~', $block_title)){
						$option_block = $cat;
					}else{
						$option_block = array(
							array(
								'id'=>'1',
								'title' => 'Category'
							),
							array(
								'id'=>'2',
								'title' => 'Tag'
							),
							array(
								'id'=>'3',
								'title' => 'Content'
							),
							array(
								'id'=>'4',
								'title' => 'Image'
							)
						);
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
				}
				$this->zea->close_collapse();
				$options = ob_get_contents();
				ob_end_clean();
				$view = preg_replace('~'.$blockvalue.'~', $options, $view);
			}
			foreach ($link as $linkkey => $linkvalue) 
			{
				$link_value = str_replace('#','', $linkvalue);
				$link_value = str_replace('#','', $link_value);
				$link_value = base_url($link_value);
				$view = preg_replace('~'.$linkvalue.'~', $link_value, $view);
			}
			echo $view;
			echo '</div>';
			echo '<div class="panel panel-footer">';
			echo '<button class="btn btn-success" title="save" value="submit" name="config_widget"><span><i class="fa fa-save"></i></span></button>';
			echo '<a href="'.base_url($this->esg->get_esg('navigation')['string']).'" class="btn btn-warning" title="refresh"><i class="fa fa-sync"></i></a>';
			echo '<a href="'.base_url().'" target="_blank" class="btn btn-info" title="display"><i class="fa fa-eye"></i></a>';
			echo '</div>';
			echo '</div>';
		}
	}
	echo '</form>';

}else{
	msg('Maaf anda tidak memiliki akses ke halaman ini','danger');
}