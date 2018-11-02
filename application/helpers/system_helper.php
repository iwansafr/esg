<?php defined('BASEPATH') OR exit('No direct script access allowed');
function msg($msg = 'alert', $alert = 'default')
{
	?>
	<div class="alert alert-<?php echo $alert; ?>">
	  <strong><?php echo $alert; ?>!</strong> <?php echo $msg; ?>.
	</div>
	<?php
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
	$role   = @$_SESSION[base_url().'_logged_in']['role'];
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

function image_module($module = '', $image = '', $is_uri = false)
{
	$base_url = ($is_uri) ? '' : base_url();
	$src = $base_url.'images/icon.png';
	$check_path = FCPATH.'images/modules/';
	if(!empty($module))
	{
		$url = $base_url.'images/modules/'.$module.'/';
		$check_path = $check_path.$module.'/';
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
  // $config['base_url']             = base_url('admin/content_list').$url_get;
  $config['base_url']             = $url_get;
  $config['total_rows']           = $total_rows;
  $config['per_page']             = $limit;
  $config['full_tag_open']        = '<ul class="pagination" style="margin-top: 0;margin-bottom: 0;">';
  $config['num_tag_open']         = '<li>';
  $config['num_tag_close']        = '</li>';
  $config['first_tag_open']       = '<li>';
  $config['first_tag_close']      = '</li>';
  $config['last_tag_open']        = '<li>';
  $config['last_tag_close']       = '</li>';
  $config['cur_tag_open']         = '<li class="active"><a href="#">';
  $config['cur_tag_close']        = '</a></li>';
  $config['next_tag_open']        = '<li>';
  $config['next_tag_close']       = '</li>';
  $config['prev_tag_open']        = '<li>';
  $config['prev_tag_close']       = '</li>';
  $config['full_tag_close']       = '</ul>';
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