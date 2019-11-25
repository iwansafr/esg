<?php defined('BASEPATH') OR exit('No direct script access allowed');
function msg($msg = 'alert', $alert = 'default')
{
	?>
	<div class="alert alert-<?php echo $alert; ?>">
	  <strong><?php echo $alert; ?>!</strong> <?php echo $msg; ?>.
	</div>
	<?php
}

function button($label = '', $link = '', $type='default')
{
	echo '<a href="'.$link.'" class="btn btn-'.$type.'" >'.$label.'</a>';
}

function array_to_string($data = array())
{
	if(!empty($data) && is_array($data))
	{
		$data = implode(',',$data);
		$data = ','.$data.',';
		return $data;
	}
}

function array_start_one($data = array())
{
	if(!empty($data) && is_array($data))
	{
		$i = 1;
		$new = array();
		foreach ($data as $key => $value)
		{
			$new[$i] = $value;
			$i++;
		}
		return $new;
	}
}

function string_to_array($data = '')
{
	if(!empty($data))
	{
		$data = explode(',',$data);
		$data = array_filter($data);
		return $data;
	}
}

function search_form()
{
	?>
	<form action="<?php echo base_url('content/search') ?>" method="get">
    <?php $keyword = !empty($_GET['keyword']) ? $_GET['keyword'] : '';?>
		<input type="text" name="keyword" class="form-control" placeholder="search" value="<?php echo $keyword?>"  style="margin-top: 7px;">
  </form>
  <?php
}

function back_form($class = '')
{
	$class_form = !empty($class) ? 'class="'.$class.'"' : '';
	$_SESSION['back_link'] = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : @$_SESSION['back_link'];
	if(!empty($_SESSION['back_link']))
	{
		?>
		<a href="<?php echo $_SESSION['back_link'] ?>" <?php echo $class_form ?>>< back</a>
		<?php
	}
}

function back_button()
{
	?>
	<button class="btn btn-default" onclick="window.history.back();" data-toggle="tooltip" title="go back"><i class="fa fa-arrow-left"></i></button>
	<?php
}

function get_block_config($title = '', $data =array())
{
	$block = array();
	$block['id'] = '';
	$block['where'] = '';
	$block['header'] = '';
	if(!empty($data) && is_array($data) && !empty($title))
	{
		if(preg_match('~menu_~', $data[$title]['content']))
		{
			$block['table'] = 'menu';
			$block['id'] = str_replace('menu_','',$data[$title]['content']);
		}else if(preg_match('~prodcat_~', $data[$title]['content']))
		{
			$block['table']  = 'product';
			$block['id']     = str_replace('prodcat_','',$data[$title]['content']);
			$block['where']  = ($block['id'] != 0) ? "publish = 1 AND cat_ids LIKE '%,{$block['id']},%'" : 'publish = 1';
			$block['header'] = ($block['id'] == 0) ? 'LATEST' : '';
			$block['limit']  = $data[$title]['limit'];
		}else if(preg_match('~cat_~', $data[$title]['content']))
		{
			$block['table']  = 'content';
			$block['id']     = str_replace('cat_','',$data[$title]['content']);
			$block['where']  = ($block['id'] != 0) ? "publish = 1 AND cat_ids LIKE '%,{$block['id']},%'" : 'publish = 1';
			$block['header'] = ($block['id'] == 0) ? 'LATEST' : '';
			$block['limit']  = $data[$title]['limit'];
		}
	}
	return $block;
}

if(!function_exists('pr'))
{
	function pr($text='', $return = false)
	{
		$is_multiple = (func_num_args() > 2) ? true : false;
		if(!$is_multiple)
		{
			if(is_numeric($return))
			{
				if($return==1 || $return==0)
				{
					$return = $return ? true : false;
				}else $is_multiple = true;
			}
			if(!is_bool($return)) $is_multiple = true;
		}
		if($is_multiple)
		{
			echo "<pre style='text-align:left;'>\n";
			echo "<b>1 : </b>";
			print_r($text);
			$i = func_num_args();
			if($i > 1)
			{
				$j = array();
				$k = 1;
				for($l=1;$l < $i;$l++)
				{
					$k++;
					echo "\n<b>$k : </b>";
					print_r(func_get_arg($l));
				}
			}
			echo "\n</pre>";
		}else{
			if($return)
			{
				ob_start();
			}
			echo "<pre style='text-align:left;'>\n";
			print_r($text);
			echo "\n</pre>";
			if($return)
			{
				$output = ob_get_contents();
				ob_end_clean();
				return $output;
			}
		}
	}
}

function copy_dir($source = '', $destination = '')
{
	$output = ['msg'=>'copy failed','type'=>'danger'];
	if(!empty($source) && !empty($destination))
	{
		if(is_dir($source))
		{
			foreach(glob("{$source}/*") as $file)
		  {
	    	$file_name = explode('/',$file);
				$file_name = end($file_name);
		    if(is_dir($file)) {
		      copy_dir($file, $destination.'/'.$file_name);
		    } else {
		    	if(is_dir($destination))
		    	{
			    	if(!file_exists($destination.'/'.$file_name))
			    	{
			      	copy($file, $destination.'/'.$file_name);
			    	}
		    	}else{
		    		$cn_dir = explode('/',$destination);
		    		$dev_dir = '/';
		    		foreach ($cn_dir as $key => $value) 
		    		{
		    			$dev_dir .= $value.'/';
		    			if(!is_dir($dev_dir))
		    			{
		    				mkdir($dev_dir);
								copy_dir($file, $destination);		    		
		    			}else{
								copy_dir($file, $destination);		    		
		    			}
		    		}
		    		copy($file, $dev_dir.'/'.$file_name);
		    	}
		    }
		  }
		}
	}
}

function getSSLPage($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSLVERSION,3); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

function curl($url = '')
{
	// create a new cURL resource
	$ch = curl_init();
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// grab URL and pass it to the browser
	curl_exec($ch);
	// close cURL resource, and free up system resources
	curl_close($ch);
}
function _class($module = '')
{
	if(!empty($module))
	{
		foreach(glob(FCPATH.'application/modules/'.$module.'/_class.php') as $file)
		{
			if(!empty($file))
			{
				include $file;
			}
		}
	}
}

function _func($module = '')
{
	if(!empty($module))
	{
		foreach(glob(FCPATH.'application/modules/'.$module.'/_function.php') as $file)
		{
			if(!empty($file))
			{
				include $file;
			}
		}
	}
}

function is_admin()
{
	$return = false;
	$role   = @$_SESSION[base_url().'_logged_in']['level'];
	if(!empty($role))
	{
		if($role==2)
		{
			$return = true;
		}
	}
	return $return;
}

function is_root()
{
	$return = false;
	$role   = @$_SESSION[base_url().'_logged_in']['level'];
	if(!empty($role))
	{
		if($role==1)
		{
			$return = true;
		}
	}
	return $return;
}

function output_json($array)
{
	$output = '{}';
	if (!empty($array))
	{
		if (is_object($array))
		{
			$array = (array)$array;
		}
		if (!is_array($array))
		{
			$output = $array;
		}else{
			if (defined('JSON_PRETTY_PRINT'))
			{
				$output = json_encode($array, JSON_PRETTY_PRINT);
			}else{
				$output = json_encode($array);
			}
		}
	}
	header('content-type: application/json; charset: UTF-8');
	header('cache-control: must-revalidate');
	header('expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
	echo $output;
	exit();
}

function menu_link($text = '')
{
	$link = base_url();
	if(!empty($text))
	{
		if(filter_var($text, FILTER_VALIDATE_URL) !== false)
		{
			$link = $text;
		}else{
			$link = base_url($text);
		}
	}
	return $link;
}

function isLink($link = '')
{
	$is_link = FALSE;
	if(!empty($link))
	{
		if(filter_var($link, FILTER_VALIDATE_URL) !== FALSE)
		{
			$is_link = TRUE;
		}
	}
	return $is_link;
}

function image_module($module = '', $image = '', $is_uri = '')
{
	$base_url = base_url();
	$src = $base_url.'images/icon.png';
	if(empty($is_uri) || !isLink($is_uri))
	{
		$check_path = FCPATH.'images/modules/';
		if(!empty($module))
		{
			$url = $base_url.'images/modules/'.$module.'/';
			$check_path = $check_path.$module.'/';
			if(!empty($image))
			{
				if(is_array($image))
				{
					// if(!empty($image['image_link']) && isLink($image['image_link']) && @getimagesize($image['image_link']))
					if(!empty($image['image_link']) && isLink($image['image_link']))
					{
						$url = $image['image_link'];
						$src = $url;
					}else{
						$url = $url.@intval($image['id']).'/'.@$image['image'];
						$check_path = $check_path.@intval($image['id']).'/'.@$image['image'];
						if(file_exists($check_path))
						{
							$src = $url;
						}
					}
				}else{
					$url = $url.$image;
					$check_path = $check_path.$image;
					if(file_exists($check_path) && is_file($check_path))
					{
						$src = $url;
					}
				}
			}
		}
	}else{
		$src = $is_uri;
	}
	return $src;
}

function content_image($image='', $id = 0)
{
	$src = base_url().'images/modules/content/none.gif';
	$check_path = FCPATH.'images/modules/';
	if(!empty($id))
	{
		$url = base_url().'images/modules/content/'.$id.'/';
		$check_path = $check_path.'content/'.$id.'/';
		if(!empty($image))
		{
			$url = $url.$image;
			$check_path = $check_path.$image;
			if(file_exists($check_path))
			{
				$src = $url;
			}
		}
	}
	return $src;
}

function image_src($module = 'content', $image='', $id = 0)
{
	$src = base_url().'images/modules/content/none.gif';
	$check_path = FCPATH.'images/modules/';
	if(!empty($id))
	{
		$url = base_url().'images/modules/'.$module.'/'.$id.'/';
		$check_path = $check_path.$module.'/'.$id.'/';
		if(!empty($image))
		{
			$url = $url.$image;
			$check_path = $check_path.$image;
			if(file_exists($check_path))
			{
				$src = $url;
			}
		}
	}
	return $src;
}

function pagination($total_rows = 0,$limit = 0, $url_get = '')
{
  $config['base_url']             = $url_get;
  $config['total_rows']           = $total_rows;
  $config['per_page']             = $limit;
  // $config['full_tag_open']        = '<ul class="pagination" style="margin-top: 0;margin-bottom: 0;">';
  // $config['num_tag_open']         = '<li>';
  // $config['num_tag_close']        = '</li>';
  // $config['first_tag_open']       = '<li>';
  // $config['first_tag_close']      = '</li>';
  // $config['last_tag_open']        = '<li>';
  // $config['last_tag_close']       = '</li>';
  // $config['cur_tag_open']         = '<li class="active"><a href="#">';
  // $config['cur_tag_close']        = '</a></li>';
  // $config['next_tag_open']        = '<li>';
  // $config['next_tag_close']       = '</li>';
  // $config['prev_tag_open']        = '<li>';
  // $config['prev_tag_close']       = '</li>';
  // $config['full_tag_close']       = '</ul>';


  $config['full_tag_open']        = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
  $config['num_tag_open']         = '<li class="page-item">';
  $config['num_tag_close']        = '</li>';
  $config['first_tag_open']       = '<li class="page-item">';
  $config['first_tag_close']      = '</li>';
  $config['last_tag_open']        = '<li class="page-item">';
  $config['last_tag_close']       = '</li>';
  $config['cur_tag_open']         = '<li class="page-item active"><a href="#" class="page-link">';
  $config['cur_tag_close']        = '</a></li>';
  $config['next_tag_open']        = '<li class="page-item">';
  $config['next_tag_close']       = '</li>';
  $config['prev_tag_open']        = '<li class="page-item">';
  $config['prev_tag_close']       = '</li>';
  $config['full_tag_close']       = '</ul></nav>';
  $config['attributes'] 					= array('class' => 'page-link');

  $config['enable_query_strings'] = TRUE;
  $config['page_query_string']    = TRUE;
  $config['query_string_segment'] = 'page';
  $config['use_page_numbers']     = TRUE;
  return $config;
  // $this->pagination->initialize($config);

  // return $this->pagination->create_links();
}

function image_upload($image = '')
{
	$src        = base_url().'images/modules/content/none.gif';
	$url        = base_url().'images/uploads/';
	$check_path = FCPATH.'images/uploads/';

	if(!empty($image))
	{
		$url = $url.$image;
		$check_path = $check_path.$image;
		if(file_exists($check_path))
		{
			$src = $url;
		}
	}
	return $src;
}

function encrypt($string = '')
{
	$key = '';
	if(!empty($string))
	{
		$key = password_hash($string, PASSWORD_DEFAULT);
	}
	return $key;
}

function decrypt($string = '', $current_key = '')
{
	$key = '';
	if(!empty($string) && !empty($current_key))
	{
		$key = password_verify($string, $current_key);
	}
	return $key;
}

function content_date($date = '')
{
	$data = '';
	if(!empty($date))
	{
		$data = $date;
		$data = date_create($date);
		$data = date_format($data,'d-M-Y');
	}
	return $data;
}


function remove_php($directory)
{
	foreach(glob("{$directory}/*") as $file)
  {
    if(is_dir($file)) {
      remove_php($file);
    } else {
    	$is_php = explode('.',$file);
			$is_php = end($is_php);
			if(strtolower($is_php) =='php')
			{
      	unlink($file);
			}
    }
  }
}

function recursive_rmdir($directory)
{
  foreach(glob("{$directory}/*") as $file)
  {
    if(is_dir($file)) {
      recursive_rmdir($file);
    } else {
      unlink($file);
    }
  }
  if(is_dir($directory))
  {
  	rmdir($directory);
  }
}

function assoc($data = array(), $key = 'id', $value = 'title')
{
	$list = array();
	if(!empty($data))
	{
		foreach ($data as $dkey => $dvalue)
		{
			$list[$dvalue[$key]] = $dvalue[$value];
		}
	}
	return $list;
}

function user($key = '')
{
	$user = @$_SESSION[base_url().'_logged_in'];
	if(!empty($key))
	{
		$user = @$user[$key];
	}
	return $user;
}