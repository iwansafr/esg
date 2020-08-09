<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Zea
{
	private $CI;
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->config->item('esg');
		$this->CI->load->database();
		$this->CI->load->helper('url');
		$this->CI->load->helper('html');
		$this->CI->load->helper('form');
		// $this->CI->load->library('upload');
		$this->CI->load->library('pagination');
		// $this->CI->load->library('image_lib');
		$this->setUrl();
	}

	var $api                 = '';
	var $api_server          = false;
	var $table               = '';
	var $formName            = 'form_1';
	var $view                = '';
	var $init                = '';
	var $heading             = '';
	var $edit_status         = true;
	var $numbering           = FALSE;
	var $none                = [];
	var $paramname           = '';
	var $dir_image           = '';
	var $where               = '';
	var $encrypt             = array();
	var $file_error          = array();
	var $edit_link           = 'edit?id=';
	var $limit               = 12;
	var $id                  = 0;
	var $delete              = false;
	var $delete_type         = 'submit';
	var $edit                = false;
	var $save                = true;
	var $options             = array();
	var $required            = array();
	var $hide                = array();
	var $data                = array();
	var $input               = array();
	var $link                = array();
	var $extlink             = array();
	var $label               = array();
	var $attribute           = array();
	var $field               = array();
	var $image               = array();
	var $type                = array();
	var $accept              = array();
	var $checkbox            = array();
	var $radio               = array();
	var $orderby             = 'id DESC';
	var $group_by            = '';
	var $multiselect         = array();
	var $elementid           = array();
	var $value               = array();
	var $startCollapse       = array();
	var $endCollapse         = array();
	var $collapse            = array();
	var $param               = array();
	var $plaintext           = array();
	var $help                = array();
	var $selected            = array();
	var $money               = array();
	var $clearget            = array();
	var $jointable           = array();
	var $delete_jointable    = false;
	var $edit_join           = [];
	var $unique              = array();
	var $unique_msg          = '';
	var $msg                 = array();
	var $search              = FALSE;
	var $success             = FALSE;
	var $datatable           = FALSE;
	var $darkmode            = FALSE;
	var $enable_delete_param = TRUE;
	var $insert_id           = 0;
	var $url                 = '';
	var $get                 = '';
	var $key                 = 'id';
	var $param_field         = 'value';
	var $before;

	public function set_delete_jointable($status = true)
	{
		$this->delete_jointable = $status;
	}

	public function api($url = '')
	{
		if(isLink($url))
		{
			$this->api = $url;
		}
	}

	public function api_server()
	{
		$this->api_server = true;
	}

	public function init($text = '')
	{
		if(!empty($text))
		{
			switch($text)
			{
				case 'roll':
					$this->init = $text;
				break;
				case 'edit':
					$this->init = $text;
				break;
				case 'param':
					$this->init = $text;
				break;
				default:
					$this->init = '';
				break;
			}
		}
	}

	public function setUrl($url = '')
	{
		if(empty($url))
		{
			$this->url = $this->CI->uri->uri_string();
			$this->url .= !empty($_SERVER['REDIRECT_QUERY_STRING']) ? '?'.$_SERVER['REDIRECT_QUERY_STRING'] : '';
			if($this->hasOrder($this->url))
			{
				$this->url = preg_replace('~\&?sort_by([\S]+)~', '', $this->url);
			}
		}else{
			$this->url = $url;
		}
	}

	public function hasGet($url = '')
	{
		if(!empty($url))
		{
			if(preg_match('~\?~', $url)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function theGet()
	{
		$get = @$_GET;
		if(!empty($get))
		{
			if(array_key_exists('keyword', $get))
			{
				unset($get['keyword']);
			}
			$this->get = $get;
		}
	}

	public function hasOrder($url = '')
	{
		if(!empty($url))
		{
			if(preg_match('~sort_by=~', $url)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function set_insert_id($id = 0)
	{
		if(!empty($id))
		{
			$this->insert_id = $id;
		}
	}

	public function get_insert_id()
	{
		return $this->insert_id;
	}

	public function order_by($field = '', $order = '')
	{
		if(!empty($field) && !empty($order))
		{
			$this->orderby = $field.' '.$order;
		}
	}

	public function group_by($field = '')
	{
		if(!empty($field))
		{
			$this->group_by = $field;
		}	
	}

	public function disable_order_by()
	{
		$this->orderby = '';
	}

	public function set_param($table = '',$name = '', $post = array())
	{
		$status = array();
		if(!empty($table))
		{
		  $data = array();
		  foreach ($post as $key => $value)
		  {
		    $data[$key] = $value;
		  }
		  $param = $this->CI->db->query('SELECT * FROM '.$table.' WHERE name = ?', $name)->row_array();
		  if(!empty($param))
		  {
		    $status = $this->CI->db->update($table, $data, "`name` = '{$name}'");
		  }else{
		    $status = $this->CI->db->insert($table, $data);
		    $last_id = $this->CI->db->insert_id();
					$this->set_insert_id($last_id);
		  }
		}
		return $status;
	}

	public function join($table = '', $cond = '', $field = '', $table2 = '', $cond2 = '')
	{
		if(!empty($table) && !empty($cond) && !empty($field))
		{
			$this->jointable['table']     = $table;
			$this->jointable['condition'] = $cond;
			$this->jointable['field']     = $field;
		}
		if(!empty($table2) && !empty($cond2))
		{
			$this->jointable['table2']     = $table2;
			$this->jointable['condition2'] = $cond2;	
		}
	}

	public function setLimit($limit = 0)
	{
		$this->limit = @intval($limit);
	}

	public function setWhere($sql = '')
	{
		if(!empty($sql))
		{
			$this->where = $sql;
		}
	}

	public function setFormName($name = '')
	{
		if(!empty($name))
		{
			$this->formName = $name;
		}
	}

	public function setParamName($name = '')
	{
		if(!empty($name))
		{
			$this->paramname = $name;
		}
	}

	public function setDirImage($name = '')
	{
		if(!empty($name))
		{
			$this->dir_image = $name;
		}
	}

	public function setParam($param = array())
	{
		if(!empty($param))
		{
			$this->param = $param;
		}
	}

	public function open_collapse($id = 'collapse1', $title = 'Collapsible Panel', $type = 'default')
	{
		$collapse = !empty($this->collapse[$id]) ? 'collapse' : '';
		$bg_class = $this->darkmode ? 'bg-dark text-white' : '';
		$darkmodestyle = $this->darkmode ? 'background: #495057;color: white;' : '';
		?>
		<br>
		<div class="card-group panel-group">
			<div class="panel panel-<?php echo $type ?> card card-<?php echo $type ?> <?php echo $bg_class ?>">
				<div class="panel-heading card-header">
					<h6 class="card-title panel-title m-0 font-weight-bold text-primary">
						<a data-toggle="collapse" href="#<?php echo $id; ?>"><?php echo $title ?></a>
					</h6>
				</div>
				<div id="<?php echo $id ?>" class="card-collapse panel-collapse <?php echo $collapse ?>">
					<div class="card-body panel-body <?php echo $bg_class ?>">

		<?php
	}

	public function close_collapse()
	{
		?>
					</div>
					<div class="card-footer panel-footer">Panel Footer</div>
				</div>
			</div>
		</div>
		<?php
	}

	public function search()
	{
		$this->theGet();
		$this->search = TRUE;
	}

	public function setImage($field = '', $module = '', $src = '')
	{
		if(!empty($field) && !empty($module))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->image[$field]['module'] = $module;
					$this->image[$field]['src']    = $src;
				}
			}
		}
	}

	public function setEditStatus($edit_status = true)
	{
		if(is_bool($edit_status))
		{
			$this->edit_status = $edit_status;
		}
	}

	public function setNumbering($numbering = true)
	{
		if(is_bool($numbering))
		{
			$this->numbering = $numbering;
		}
	}

	public function setHeading($heading = '')
	{
		$this->heading = $heading;
	}

	public function setView($view = '')
	{
		$this->view = $view;
		// $this->data_model->setView($view);
	}

	public function get_all($sql = '')
	{
		if(!empty($sql))
		{
			return $this->CI->db->query($sql)->result_array();
		}
	}

	public function setUnique($input = array(), $msg = '{value} was exist in table {table}')
	{
		if(!empty($input) && is_array($input))
		{
			foreach ($input as $key => $value)
			{
				foreach ($this->input as $ikey => $ivalue)
				{
					if($ivalue['text'] == $value)
					{
						$this->unique[] = $value;
					}
				}
			}
		}else{
			if($input == 'All')
			{
				foreach ($this->input as $ikey => $ivalue)
				{
					$this->unique[] = $ivalue;
				}
			}
		}
		if(!empty($msg))
		{
			// $msg = '{value} was exist in table {table} ';
			$this->unique_msg = $msg;
		}
	}

	public function tableOptions($field = '', $table = '', $index= '', $label = '', $ex = '',$extra_label = '')
	{
		if(!empty($table) && !empty($index) && !empty($label))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->CI->db->select($index);
					$this->CI->db->select($label);
					if(!empty($extra_label))
					{
						$this->CI->db->select($extra_label);
					}
					$this->CI->db->from($table);
					$this->options['ref_table_'.$field] = $table;
					if(!empty($ex))
					{
						$this->CI->db->where($ex);
					}
					$data = $this->CI->db->get()->result_array();
					$options    = array();
					if(empty($this->none[$field])){
						$options[0] = 'None';
					}
					if(!empty($data))
					{
						foreach ($data as $dkey => $dvalue)
						{
							$value_extra_label = !empty($extra_label) ? ' | '.$dvalue[$extra_label] : '';
							$dvalue[$index] = $dvalue[$index] == 0 ? '': $dvalue[$index];
							$options[$dvalue[$index]] = $dvalue[$label].$value_extra_label;
						}
						$this->options[$field] = $options;
					}else{
						$this->options[$field] = $options;
					}
				}
			}
		}
	}
	public function setFirstOption($field = '', $options = array())
	{
		if(!empty($field) && !empty($options) && is_array($options))
		{
			foreach ($this->input as $key => $value) 
			{
				if($value['text'] == $field)
				{
					$tmp_opt = array();
					foreach ($options as $okey => $ovalue) 
					{
						$tmp_opt[$field][$okey] = $ovalue;
					}
					foreach ($this->options[$field] as $opkey => $opvalue) 
					{
						$tmp_opt[$field][$opkey] = $opvalue;
					}
					$this->options[$field] = $tmp_opt;
				}
			}
		}
	}

	public function setHelp($field = '', $text = '')
	{
		if(!empty($field) && !empty($text))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->help[$field] = '<a href="#tooltip_'.$field.'" id="tooltip_'.$field.'" data-toggle="tooltip" data-placement="top" title="'.$text.'"><i class="fa fa-question-circle"></i></a>';
				}
			}
		}
	}

	public function removeNone($field = '',$none = true)
	{
		if(!empty($field))
		{
			$this->none[$field] = $none;
		}
	}

	public function setOptions($field = '',$options = array())
	{
		if(!empty($field) && !empty($options))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->options[$field] = $options;
				}
			}
		}
	}

	public function setMultiSelect($field = '', $table = '', $col = '')
	{
		if(!empty($field) && !empty($table) && !empty($col))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					if(is_array($table))
					{
						$this->multiselect[$field]['data'] = $table;
					}else{
						$this->multiselect[$field]['data'] = $this->get_all("SELECT {$col} FROM `{$table}` WHERE 1");
					}
				}
			}
		}
	}

	public function setSimpleMultiSelect($field = array())
	{
		if(!empty($field))
		{
			foreach ($field as $key => $value) 
			{
				$this->multiselect[$value]['simple'] = TRUE;
			}
		}
	}

	public function setType($field = '', $type = '') /*untuk input type text*/
	{
		if(!empty($field) && !empty($type))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->type[$field] = $type;
				}
			}
		}
	}

	public function setEncrypt($input = array())
	{
		if(!empty($input) && is_array($input))
		{
			foreach ($input as $key => $value)
			{
				foreach ($this->input as $ikey => $ivalue)
				{
					if($ivalue['text'] == $value)
					{
						$this->encrypt[] = $value;
					}
				}
			}
		}
	}

	public function setElementId($field = '', $id = '')
	{
		if(!empty($field) && !empty($id))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->elementid[$field] = $id;
				}
			}
		}
	}

	public function setSelected($field = '', $value = '0')
	{
		if(!empty($field))
		{
			foreach ($this->input as $ikey => $ivalue)
			{
				if($ivalue['text'] == $field)
				{
					$this->selected[$field] = $value;
				}
			}
		}
	}

	public function setValue($field = '', $value = '0')
	{
		if(!empty($field))
		{
			foreach ($this->input as $ikey => $ivalue)
			{
				if($ivalue['text'] == $field)
				{
					$this->value[$field] = $value;
				}
			}
		}
	}

	public function setField($fields = array())
	{
		$this->field = $fields;
	}

	public function setData($data = array())
	{
		if(empty($data))
		{
			if(!empty($this->input))
			{
				if(empty($this->api))
				{
					$field = $this->CI->db->list_fields($this->table);
					foreach ($this->input as $key => $value)
					{
						if($this->init == 'param')
						{
							$this->data[$key] = '';
						}else if($this->init == 'edit'){
							if(in_array($value['text'],$field))
							{
								$this->data[$key] = '';
							}
						}else if($this->init == 'roll')
						{
							$this->data[0][$key] = '';
							if(!in_array('id', $this->input))
							{
								$this->data[0]['id'] = 0;
							}
						}
					}
				}
			}
		}else{
			$this->data = $data;
		}
	}

	public function setDataTable($option = TRUE)
	{
		$this->datatable = $option;
	}
	public function setDarkMode($option = TRUE)
	{
		$this->darkmode = $option;
	}

	public function setLink($field = '', $link = '', $get = '')
	{
		if(!empty($field) && !empty($link))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					if(!empty($get))
					{
						$this->link['link_get'][$field] = $get;
					}
					$this->link[$field] = $link;
				}
			}
		}
	}

	public function setExtLink($field = '', $text = '')
	{
		if(!empty($field) && !empty($text))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->extlink[$field]  = $text;
				}
			}
		}
	}

	public function setClearGet($field = '')
	{
		if(!empty($field))
		{
			if(is_array($field))
			{
				foreach ($field as $field_key => $field_value) 
				{
					foreach ($this->input as $key => $value)
					{
						if($value['text'] == $field_value)
						{
							$this->clearget[$field_value] = 1;
						}
					}
				}
			}else{
				foreach ($this->input as $key => $value)
				{
					if($value['text'] == $field)
					{
						$this->clearget[$field] = 1;
					}
				}
			}
		}
	}

	public function setMoney($field = '', $type = 'Rp')
	{
		if(!empty($field))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->money[$field] = $type;
				}
			}
		}
	}

	public function setEditLink($edit_link = '')
	{
		$this->edit_link = $edit_link;
	}

	public function addInput($text = '', $type = '')
	{
		$this->input[$text] = array('text'=>$text, 'type'=>$type);
	}
	public function clearInput()
	{
		$this->input = array();
	}
	public function setInput($text = '', $type = '')
	{
		$this->input[$text] = array('text'=>$text, 'type'=>$type);
	}


	public function setTable($table = '', $index = '', $sort = '')
	{
		if(!empty($table))
		{
			$this->table = $table;
		}

		if(!empty($index) && !empty($sort))
		{
			$this->orderby = $index.' '.$sort;
		}
	}

	public function setRequired($input = array())
	{
		if(!empty($input) && is_array($input))
		{
			foreach ($input as $key => $value)
			{
				foreach ($this->input as $ikey => $ivalue)
				{
					if($ivalue['text'] == $value)
					{
						$this->required[$value] = 'required';
					}
				}
			}
		}else{
			if($input == 'All')
			{
				foreach ($this->input as $ikey => $ivalue)
				{
					$this->required[$ivalue['text']] = 'required';
				}
			}
		}
	}

	public function setHide($input = array())
	{
		if(!empty($input) && is_array($input))
		{
			foreach ($input as $key => $value)
			{
				foreach ($this->input as $ikey => $ivalue)
				{
					if($ivalue['text'] == $value)
					{
						$this->hide[$value] = TRUE;
					}
				}
			}
		}
	}

	public function startCollapse($field = '', $title = 'panel')
	{
		if(!empty($field))
		{
			foreach ($this->input as $ikey => $ivalue)
			{
				if($ivalue['text'] == $field)
				{
					$this->startCollapse[$field] = $field;
					if(!empty($title))
					{
						$this->startCollapse['title'][$field] = $title;
					}
				}
			}
		}
	}

	public function setCollapse($field = '', $collapse = FALSE)
	{
		$title = !empty($this->startCollapse['title']) ? $this->startCollapse['title'] : $field;
		if(!empty($title))
		{
			if(is_array($title))
			{
				foreach ($title as $key => $value)
				{
					if($key == $field)
					{
						$this->collapse[$field] = $collapse;
					}
				}
			}else{
				$this->collapse[$field] = $collapse;
			}
		}
	}

	public function endCollapse($field = '')
	{
		if(!empty($field))
		{
			foreach ($this->input as $ikey => $ivalue)
			{
				if($ivalue['text'] == $field)
				{
					$this->endCollapse[$field] = $field;
				}
			}
		}
	}

	public function setId($id = 0)
	{
		$this->id = @intval($id);
	}

	public function setKey($key = 'id')
	{
		$this->key = $key;
	}

	public function setLabel($field = '', $text = '')
	{
		if(!empty($field) && !empty($text))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->label[$field] = $text;
				}
			}
		}
	}

	public function setPlaintext($field = '', $text = '')
	{
		if(!empty($field) && !empty($text))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					if(is_array($text))
					{
						$text_link = '';
						foreach($text AS $text_key => $text_value)
						{
							$text_link .= '<li><a href="'.$text_key.'"><i class="fa fa-search"></i>'.$text_value.'</a></li>';
						}
						$text_link = 
						'<div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Action
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">'.$text_link.'</ul>
						</div>';
						$this->plaintext[$field] = $text_link;
					}else{
						$this->plaintext[$field] = $text;
					}
				}
			}
		}
	}

	public function setAttribute($field = '', $text = '')
	{
		if(!empty($field) && !empty($text))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->attribute[$field] = $text;
				}
			}
		}
	}


	public function setCheckBox($field = '', $option = array())
	{
		if(!empty($field) && !empty($option))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->checkbox[$field] = $option;
				}
			}
		}
	}

	public function setRadio($field = '', $option = array())
	{
		if(!empty($field) && !empty($option))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->radio[$field] = $option;
				}
			}
		}
	}

	public function setDelete($delete = true, $type = 'submit')
	{
		if(is_bool($delete))
		{
			$this->delete = $delete;
		}
		if(!empty($type))
		{
			$this->delete_type = $type;
		}
	}

	public function setEdit($edit = true)
	{
		if(is_bool($edit))
		{
			$this->edit = $edit;
		}
	}

	public function setSave($save = true)
	{
		if(is_bool($save))
		{
			$this->save = $save;
		}
	}

	public function setEnableDeleteParam($enable_delete_param = true)
	{
		if(is_bool($enable_delete_param))
		{
			$this->enable_delete_param = $enable_delete_param;
		}
	}

	public function setFile($field = '', $type = '')
	{
		if(!empty($field))
		{
			switch ($type) {
				case 'video':
					$this->input[$field]['file'] = $type;
					break;
				case 'image':
					$this->input[$field]['file'] = $type;
					break;
				case 'audio':
					$this->input[$field]['file'] = $type;
					break;
				default:
					$this->input[$field]['file'] = 'image';
					break;
			}
		}
	}

	public function setAccept($field = '', $accept = '')
	{
		if(!empty($field) && !empty($accept))
		{
			foreach ($this->input as $key => $value)
			{
				if($value['text'] == $field)
				{
					$this->accept[$field] = $accept;
				}
			}
		}
	}
	public function check_type($type = '', $title = '')
	{
		$result = FALSE;
		if(!empty($this->accept))
		{
			$types = explode(',',$this->accept[$title]);
			$data = array();
			$forbiden = array('*','php','exe','deb','PHP','EXE','DEB');
			foreach($types AS $c => $d)
			{
				$tmp = $d;
		    if(preg_match('~/~',$tmp))
		    {
		    	$tmp = explode('/',$tmp);
		      $tmp = @$tmp[1];
		      if(!empty($tmp))
		      {
			      if(!in_array($tmp, $forbiden))
			      {
		      		if(strtolower($tmp) == 'jpeg')
		      		{
		      			$data[] = '.jpg';
		      		}
		      		$data[] = '.'.$tmp;
			      }
		      }
		    }else{
		    	$data[] = $tmp;
		    }
			}
			$types = $data;
		}else{
			$types = explode(',','.jpg,.jpeg,.png,.bmp,.gif,.JPG,.JPEG,.PNG,.BMP,.GIF');
		}
		if(!empty($type))
		{
			$types = array_unique($types);
			foreach ($types as $key => $value)
			{
				if(strtolower($value) == '.'.strtolower($type))
				{
					$result = TRUE;
					$this->file_error[$title] = '';
					break;
				}else{
					$this->file_error[$title] = 'your file type is not allowed';
				}
			}
		}
		return $result;
	}

	private function getInput($is_array = true)
	{
		$input = array();
		foreach ($this->input as $key => $value)
		{
			$input[] = $value['text'];
		}
		if(!in_array('id', $input))
		{
			$input[] = 'id';
		}
		if(!$is_array)
		{
			$input = implode('`,`', $input);
			$input = '`'.$input.'`';
		}
		return $input;
	}
	public function del_to_trash($table ='',$ids = array(), $data = array())
	{
		$this->CI->db->where_in('id',$ids);
		$this->CI->db->delete($table);
  	if($table == 'trash')
  	{
  		foreach ($data as $key => $value) 
  		{
  			$trash_dir = FCPATH.'images/modules/trash/'.$value['table_title'].'/'.$value['table_id'].'/';
  			recursive_rmdir($trash_dir);
  			$trash_dir = FCPATH.'images/modules/trash/'.$value['table_title'].'/gallery/'.$value['table_id'].'/';
  			recursive_rmdir($trash_dir);
  		}
  	}else{
    	if(!empty($data))
    	{
	    	$new_data = [];
	    	$val_data = [];
	    	$i = 0;
	    	foreach($data as $key => $value)
	    	{
	    		$val_data['table_id'] = $value['id'];
	    		$val_data['user_id'] = @intval($_SESSION[base_url().'_logged_in']['id']);
	    		$val_data['table_title'] = $table;
	    		$val_data['table_content'] = json_encode($value);
	    		$new_data[$i] = $val_data;
	    		$i++;
	    	}

	    	$this->CI->db->insert_batch('trash', $new_data);
	      foreach ($data as $key => $value)
	      {
	      	$id = $value['id'];
	        $dir = FCPATH.'images/modules/'.$table.'/'.$id.'/';
	        $trash_dir = FCPATH.'images/modules/trash/'.$table.'/'.$id.'/';
	        if(!is_dir($dir) && !empty($value['name']))
	        {
	        	$dir = FCPATH.'images/modules/'.$table.'/'.$value['name'].'/';
	        	$trash_dir = FCPATH.'images/modules/trash/'.$table.'/'.$value['name'].'/';
	        }
	        if(is_dir($dir))
	        {
		        if(!is_dir($trash_dir))
		        {
		        	mkdir($trash_dir,0777,1);
		        }
		        foreach(glob($dir.'*') as $file)
						{
							$name_file = explode('/', $file);
							$name_file = end($name_file);
							@copy($file,$trash_dir.'/'.$name_file);
						}
		        recursive_rmdir($dir);
	        }
	      }
    	}
  	}
	}
	public function del_data($table='',$ids = array())
  {
    if(!empty($ids)&&!empty($table))
    {
    	$trash_exist = $this->CI->db->table_exists('trash');
    	if($trash_exist)
    	{
  			$this->CI->db->where_in('id',$ids);
	    	$data = $this->CI->db->get($table)->result_array();
    	}
    	$this->del_to_trash($table,$ids, $data);
    	if(!empty($this->jointable['table']) && !empty($this->delete_jointable))
    	{
    		$second_ids = [];
    		foreach ($data as $key => $value) 
    		{
    			$second_ids[] = $value[$this->jointable['table'].'_id'];
    		}
    		$this->CI->db->where_in('id',$second_ids);
	    	$second_data = $this->CI->db->get($this->jointable['table'])->result_array();
    		$this->del_to_trash($this->jointable['table'],$second_ids, $second_data);
    	}
  		
    }
  }
	public function set_data($table = '',$id = 0, $post = array())
  {
  	$status = array();
    if(!empty($table))
    {
      $data = array();
      foreach ($post as $key => $value)
      {
        $data[$key] = $value;
      }
      if($id > 0)
      {
        $status = $this->CI->db->update($table, $data, 'id = '.$id);
      }else{
        $status = $this->CI->db->insert($table, $data);
        $last_id = $this->CI->db->insert_id();
				$this->set_insert_id($last_id);
      }
    }
    return $status;
  }
  public function get_one($table = '', $field = '', $where = '')
  {
    if(!empty($table))
    {
      $sql   = "SELECT {$field} FROM `{$table}` {$where} LIMIT 1";
      $binds = false;
      if(!empty($this->statement) && !empty($this->statement_value))
      {
        $binds = $this->statement_value;
      }
      $data = $this->CI->db->query($sql,$binds)->row_array();

      return $data[$field];
    }
  }
	public function getData()
	{
		if(empty($this->api))
		{

			$navigation = $this->CI->esg->get_esg('navigation');
			$nav_module = @$navigation['array'][0];
			$nav_task   = !empty($navigation['array'][1]) ? $navigation['array'][1] : 'index';
			$data       = array();

			if($this->init == 'roll')
			{
				$input   = array();
				$limit   = !empty($this->limit) ? $this->limit : 12;
				$page    = (@intval($_GET['page']) > 0 ) ? $_GET['page']-1 : @intval($_GET['page']);
				$sort_by = !empty($_GET['sort_by']) ? $_GET['sort_by'] : '';
				$keyword = !empty($_GET['keyword']) ? $_GET['keyword'] : '';
				$id      = @intval($_GET['id']);
				$where   = '';
				$bind    = array();
				$url_get = '';
				$get     = !empty($_GET) ? $_GET : '';
				
				foreach ($this->input as $key => $value)
				{
					$input[] = $key;
				}
				if(!empty($input))
				{
					$input = implode(',',$input);
				}
				$sql = 'SELECT '.$input.' FROM '.$this->table;
				if(!empty($this->jointable))
				{
					$sql = 'SELECT '.$this->jointable['field'].' FROM '.$this->table.' INNER JOIN '.$this->jointable['table'].' '.$this->jointable['condition'];
					if(!empty($this->jointable['table2']) && !empty($this->jointable['condition2']))
					{
						$sql .= ' INNER JOIN '.$this->jointable['table2'].' '.$this->jointable['condition2'];
					}
				}
				if(!empty($keyword))
				{
					$url_get .= '?';
					$sql     .= ' WHERE (';
				}else if(!empty($this->where)){
					$sql     .= ' WHERE (';
				}else if(!empty($sort_by) || !empty($id))
				{
					$url_get .= '?';
				}
				if(!empty($get['page']))
				{
					$this->url = str_replace('?page='.$get['page'], '', $this->url);
					$this->url = str_replace('&page='.$get['page'], '', $this->url);
				}
				if(!empty($get))
				{
					$i = 0;
					foreach ($get as $key => $value)
					{
						if($key != 'page')
						{
							if($i > 0)
							{
								$url_get .= '&';
							}
							$url_get .= $key.'='.$value;
						}
						$i++;
					}
					if(!preg_match('~\?~', $url_get, $match)){
						$url_get = '?'.$url_get;
					}
					if(!empty($keyword))
					{
						$this->url = str_replace('?keyword='.$keyword, '', $this->url);
					}
				}
				if(!empty($keyword))
				{
					if(empty($this->field))
					{
						foreach ($this->input as $key => $value) 
						{
							$this->field[] = $value['text'];
						}
					}
					if(!empty($this->field))
					{
						if(is_array($this->field))
						{
							if(!empty($this->jointable))
							{
								$jointable_field = explode(',',$this->jointable['field']);
								foreach ($jointable_field as $key => $value)
								{
									if(preg_match('~(.*?) AS~', $value, $ketemu))
									{
										$value = @$ketemu[1];
									}
									if($key > 0){
										$where .= ' OR ';
									}
									$where .= $value.' LIKE ?';
									$bind[] = '%'.$keyword.'%';
								}
								$where .= ')';
							}else{
								foreach ($this->field as $key => $value)
								{
									if($key > 0){
										$where .= ' OR ';
									}
									$where .= $value.' LIKE ?';
									$bind[] = '%'.$keyword.'%';
								}
								$where .= ')';
							}
						}
						$sql .= $where;

					}
				}
				if(!empty($this->where))
				{
					$sql .= $this->hasGet($sql) ? ' AND ('.$this->where.' )' : ' '.$this->where.')';
				}
				if(!empty($this->group_by))
				{
					$sql .= ' GROUP BY '.$this->group_by;
				}
				$num_rows = $this->CI->db->query($sql,$bind)->num_rows();

				if(!empty($sort_by))
				{
					$this->order_by($sort_by, @$_GET['type']);
				}
				if(!empty($this->orderby))
				{
					$sql .= ' ORDER BY '.$this->orderby;
				}
				if(!$this->datatable)
				{
					$sql .= ' LIMIT '.$page*$limit.','.$limit;
				}
				if(!empty($bind))
				{
					$data['data']  = $this->CI->db->query($sql,$bind)->result_array();
				}else{
					$data['data']  = $this->CI->db->query($sql)->result_array();
				}
				$data['query'] = $this->CI->db->last_query();
				$data['num_rows'] = $num_rows;
				if(!$this->datatable)
				{
					$config        = pagination($num_rows,$limit,base_url($this->url.$url_get));
			    $this->CI->pagination->initialize($config);
			    $data['pagination'] = $this->CI->pagination->create_links();
				}else{
					$data['pagination'] = '';
				}
			}else if($this->init == 'edit'){
				$where = !empty($this->where) ? $this->where : '';
				$data = $this->CI->db->query('SELECT * FROM '.$this->table.' WHERE id = ? '.$where.' LIMIT 1', $this->id)->row_array();
				$data = @$data;
			}
		}else{
			// $data = file_get_contents($this->api);
			$data = curl($this->api);
			if(!empty($data))
			{
				$data = json_decode($data,1);
			}
		}
		return $data;
	}

	public function getParam()
	{
		if(!empty($this->paramname))
		{
			$data = $this->CI->db->query('SELECT '.$this->param_field.' FROM '.$this->table.' WHERE name = ?', $this->paramname)->row_array();
			// 
			if(empty($data) && !empty($this->id))
			{
				$data = $this->CI->db->query('SELECT '.$this->param_field.' FROM '.$this->table.' WHERE id = ?', $this->id)->row_array();
			}
			return $data;
		}
	}

	public function before($func)
	{
		$this->func = $func;
	}

	public function form()
	{
		if(!empty($this->input))
		{
			$bg_class = $this->darkmode ? 'bg-dark text-white' : '';
			$darkmodestyle = $this->darkmode ? 'background: #495057;color: white;' : '';
			$data = $this->getData();
			$message = array();
			if(!empty($_POST))
			{
				$message    = $this->action();
				$data       = $this->getData();
			}
			if($this->init == 'edit' || $this->init == 'param')
			{
				if($this->init == 'param')
				{
					if(!empty($this->param))
					{
						$name = $this->paramname;
						$data = json_decode($this->param[$this->param_field], 1);
					}else{
						$this->param = $this->getParam();
						$name = $this->paramname;
						if(!empty($this->param[$this->param_field]))
						{
							$data = $this->param[$this->param_field];
							$data = json_decode($data,1);
						}else{
							$data = [];
						}
					}
					// 
				}
				$action = !empty($this->view) ? base_url($this->view).'/'.$this->id : '';
				?>
				<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" name="<?php echo $this->formName ?>" id="<?php echo $this->formName ?>">
					<div class="panel panel-default card card-default <?php echo $bg_class ?>">
						<div class="panel panel-heading card-header <?php echo $bg_class ?>">
							<h6 class="panel-title m-0 font-weight-bold text-primary">
								<?php
								if($this->init == 'edit')
								{
									if(!empty($this->edit_status))
									{
										echo !empty($this->id) ? 'Ubah ' : 'Tambah ';
									}
									echo !empty($this->heading) ? $this->heading: $this->table;
								}else{
									echo !empty($this->heading) ? $this->heading: $this->table;
								}
								?>
							</h6>
						</div>
						<div class="panel panel-body card-body">
							<?php
							if(!empty($message))
							{
								foreach ($message as $key => $value) 
								{
									if(!empty($value['msg']) && !empty($value['alert']))
									{
										msg(@$value['msg'], @$value['alert']);
									}
								}
							}

							if(empty($data))
							{
								$this->setData();
								$data = $this->data;
							}
							foreach ($this->input as $key => $value)
							{
								if($this->init == 'param')
								{
									if(!array_key_exists($value['text'], $data))
									{
										$data[$value['text']] = '';
									}
								}
								if(array_key_exists($value['text'], $data))
								{
									$field    = !empty($value['text']) ? $value['text'] : '';
									$label    = !empty($this->label[$field]) ? $this->label[$field] : $field;
									$required = !empty($this->required[$field]) ? $this->required[$field] : '';

									if(!empty($this->startCollapse))
									{
										if(@$this->startCollapse[$value['text']] == $value['text'])
										{
											$collapse_title = !empty($this->startCollapse['title'][$value['text']]) ? $this->startCollapse['title'][$value['text']] : '';
											$this->open_collapse($value['text'], @$collapse_title);
										}
									}
									$class = '';
									if(in_array($field, $this->unique) && !empty($_POST) && ($this->success == FALSE) && array_key_exists($field, $this->msg))
									{
										$class = 'has-error';
									}
									echo '<div class="form-group '.$class.'">';
									switch($value['type'])
									{
										case 'text':
											include 'input/text.php';
											break;
										case 'thumbnail':
											include 'input/thumbnail.php';
											break;
										case 'button':
											include 'input/button.php';
											break;
										case 'password':
											include 'input/password.php';
											break;
										case 'plaintext':
											include 'input/plaintext.php';
											break;
										case 'link':
											include 'input/link.php';
											break;	
										case 'textarea':
											include 'input/textarea.php';
											break;
										case 'checkbox':
											include 'input/checkbox.php';
											break;
										case 'radio':
											include 'input/radio.php';
											break;
										case 'dropdown':
											include 'input/dropdown.php';
											break;
										case 'upload':
										case 'image':
										case 'file':
											include 'input/upload.php';
											break;
										case 'uploads':
										case 'images':
										case 'files':
										case 'multifiles':
										case 'gallery':
											include 'input/uploads.php';
											break;
										case 'multiselect':
											include 'input/multiselect.php';
											break;
										case 'hidden':
											include 'input/hidden.php';
											break;
									}
									echo '</div>';
									if(!empty($this->endCollapse))
									{
										if(@$this->endCollapse[$value['text']] == $value['text'])
										{
											$this->close_collapse();
										}
									}
								}else{
									echo msg('unknown Column '.$value['text'].' in table '.$this->table,'danger');
								}
							}
							?>
						</div>
						<div class="panel panel-footer card-footer">
							<!-- <button class="btn btn-default" onclick="window.history.back();" data-toggle="tooltip" title="go back"><i class="fa fa-arrow-left"></i></button> -->
							<?php
							if(!empty($this->save))
							{
								echo form_button(array(
									'name'    => $this->formName,
									'id'      => 'submit',
									'value'   => 'true',
									'type'    => 'success',
									'content' => '<i class="fa fa-floppy-o"></i> submit',
									'class'   => 'btn btn-success'));
								echo form_button(array(
									'name'    => 'reset',
									'id'      => 'reset',
									'value'   => 'true',
									'type'    => 'reset',
									'content' => '<i class="fa fa-undo"></i> reset',
									'class'   => 'btn btn-warning'));

								if($this->init == 'param' && !empty($this->enable_delete_param))
								{
									echo form_button(array(
										'name'    => 'delete_param',
										'id'      => 'delete_param',
										'value'   => 'true',
										'type'    => 'delete',
										'content' => '<i class="fa fa-trash"></i> Delete Config',
										'class'   => 'btn btn-danger'));
								}
							}
							?>
						</div>
					</div>
				</form>
				<?php
			}else if($this->init == 'roll')
			{
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
				$pagination = $data['pagination'];
				$data       = $data['data'];
				$pagination = !empty($data) ? $pagination : '';
				$message    = array();
				$page = !empty($_GET['page']) ? '?page='.$_GET['page'] : '';
				?>
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<div class="col-md-8">
									<h3 class="box-title">
										<?php echo $this->heading;?>
									</h3>
								</div>
								<?php
								if($this->search == TRUE)
								{
									if(!$this->datatable)
									{
										?>
											<div class="col-md-2 pull-right">
					             	<div class="box-tools">
					             		<form action="" method="get">
							              <div class="input-group input-group-sm">
							                <input type="text" name="keyword" class="form-control pull-right" placeholder="Search" value="<?php echo !empty(@$_GET['keyword']) ? $_GET['keyword'] : ''; ?>" required>
							                <?php if (!empty($this->get)): ?>
							                	<?php foreach ($this->get as $key => $value): ?>
							                		<?php if ($key != 'page'): ?>
							                			<input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
							                		<?php endif ?>
							                	<?php endforeach ?>
							                	
							                <?php endif ?>
							                <div class="input-group-btn">
							                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							                </div>
							              </div>
			              			</form>
					            	</div>
											</div>
										<?php
									}
								}
								$get_url = '';
								if(!empty($_GET)){
									$get_url = '?';
									foreach($_GET AS $getkey => $getvalue){
										$get_url .= $getkey.'='.$getvalue.'&';
									}
									$get_url = substr($get_url, 0, -1);
								}
								if(!empty($get_url)){
									$get_url = $get_url;
								}else if(!empty($this->view)){
									$get_url = base_url($this->view).$page;
								}
								?>
		          </div>
							<form method="post" action="<?php echo $get_url; ?>" enctype="multipart/form-data" name="<?php echo $this->formName ?>" id="<?php echo $this->formName ?>">
								<div class="box-body table-responsive no-padding">
									<?php if ($this->datatable): ?>
										<div class="box-tools">
											<div class="pull-right">
												<?php
												foreach ($this->input as $inputkey => $inputvalue)
												{
													if($inputvalue['type'] == 'checkbox' || $inputvalue['type'] == 'text' || $inputvalue['type'] == 'dropdown')
													{
														if(empty($this->attribute[$inputvalue['text']]) || is_array($this->attribute[$inputvalue['text']]))
														{
														// $add_text = $inputvalue['type'] == 'text' ? 'Save ' : '';
															$add_text = 'Save ';
															?>
															<button type="submit" name="<?php echo $inputvalue['text'] ?>" value="1" class="btn btn-info btn-sm">
																<span class="glyphicon glyphicon-floppy-saved"></span> <?php echo $add_text.' '.$inputvalue['text'] ?>
															</button>
															<?php
														}
													}
												}
												if($this->delete)
												{
													?>
													<button type="<?php echo $this->delete_type ?>" name="delete_<?php echo $this->formName?>" value="1" class="btn btn-danger btn-sm">
														<span class="glyphicon glyphicon-trash"></span> DELETE
													</button>
													<?php
												}
												?>
											</div>
										</div>
										<hr>
									<?php endif ?>
									<table class="table table-bordered table-hover table-striped <?php echo $this->datatable ? 'esg_data_table' : ''; ?>" table_name="<?php echo $this->table; ?>">
										<thead>
											<tr>
												<?php
												if(!empty($this->numbering))
												{
													echo '<th>No</th>';
												}
												$url_get  = '';
												$sort_by = @$_GET['sort_by'];
												$keyword = @$_GET['keyword'];
												$id      = @intval($_GET['id']);
												$get = @$_GET;
												if(!empty($keyword) || !empty($this->where))
												{
													$url_get .= '?';
												}else if(!empty($sort_by) || !empty($id))
												{
													$url_get .= '?';
												}
												if(!empty($get))
												{
													$i = 0;
													foreach ($get as $key => $value)
													{
														if($key != 'page')
														{
															if($i > 0)
															{
																$url_get .= '&';
															}
															$url_get .= $key.'='.$value;
														}
														$i++;
													}
												}
												$this->url .= $url_get;
												if($this->hasOrder($this->url))
												{
													$this->url = preg_replace('~\&?sort_by([\S]+)~', '', $this->url);
												}
												$delimiter_link = $this->hasGet($this->url) ? '&':'?';
												foreach ($this->input as $key => $value)
												{
													if(empty($data))
													{
														$this->setData();
														$data = $this->data;
													}
													if($value['type'] == 'order')
													{
														$max = $this->get_one($this->table, 'MAX('.$this->orderby['index'].')', 'WHERE '.$this->where);
													}
													if(array_key_exists($value['text'], $data[0]))
													{
														$field    = !empty($value['text']) ? $value['text'] : '';
														$label    = !empty($this->label[$field]) ? $this->label[$field] : $field;
														if($value['type'] == 'checkbox')
														{
															?>
															<th>
																<div class="checkbox">
																	<label>
																		<input id="selectAll<?php echo $label;?>" add="<?php echo $label; ?>" class="selectAll" type="checkbox"><?php echo ucwords($label) ?>
																	</label>
																</div>
															</th>
															<?php
														}else{
															$label = $value['type'] != 'hidden' ? $label : '';
															$type = empty($_GET['type']) || (@$_GET['type'] == 'desc') ? 'asc' : 'desc';
															$arrow = '';
															if(@$_GET['sort_by'] == $field)
															{
																$arrow = (@$_GET['type'] == 'asc') ? '<i class="fa fa-sort-alpha-asc"></i> ' : '<i class="fa fa-sort-alpha-desc"></i> ';
															}
															if(empty($this->hide[$field]))
															{
																if(!$this->datatable)
																{
																	echo '<th><a class="load_link" href="'.base_url($this->url).$delimiter_link.'sort_by='.$field.'&type='.$type.'">'.$arrow.ucwords($label).'</a></th>';
																}else{
																	echo '<th>'.ucwords($label).'</th>';
																}
															}
														}
													}
												}
												if($this->edit == true)
												{
													?>
													<th>EDIT</th>
													<?php
												}
												if($this->delete == true)
												{
													?>
													<th>
														<div class="checkbox">
															<label>
																<input id="selectAllDel" type="checkbox">DELETE
															</label>
														</div>
													</th>
													<?php
												}
											 ?>
											</tr>
										</thead>
										<tbody>
											<?php
											if(!empty($data))
											{
												$numbering_page = @intval($_GET['page']) < 1 ? 1 : @intval($_GET['page']);
												$i = ($this->limit*$numbering_page)-$this->limit+1;
												foreach ($data as $dkey => $dvalue)
												{
													if(!empty($dvalue[$this->key]))
													{
														?>
														<tr data-id="<?php echo $dvalue[$this->key] ?>">
															<?php
															if(!empty($this->numbering))
															{
																echo '<td>'.$i.'</td>';
																$i++;
															}
															foreach ($this->input as $ikey => $ivalue)
															{
																$field    = !empty($ivalue['text']) ? $ivalue['text'] : '';
																$label    = !empty($this->label[$field]) ? $this->label[$field] : $field;
																$required = !empty($ivalue['required']) ? $ivalue['required'] : '';
																$image    = !empty($this->image[$field]) ? $this->image[$field] : '';

																if(isset($dvalue[$ikey]) && empty($this->hide[$ikey]))
																{
																	$data_id = (!empty($dvalue[$ivalue['text']]) && ($dvalue[$ivalue['text']] > 0))  ? $ivalue['text'].'="'.$dvalue[$ivalue['text']].'"' : '';
																	echo '<td '.$data_id.'>';
																		switch ($ivalue['type'])
																		{
																			case 'text':
																				include 'input/text.php';
																				break;
																			case 'plaintext':
																				include 'input/plaintext.php';
																				break;
																			case 'thumbnail':
																				include 'input/thumbnail.php';
																				break;
																			case 'link':
																				include 'input/link.php';
																				break;
																			case 'textarea':
																				include 'input/textarea.php';
																				break;
																			case 'checkbox':
																				include 'input/checkbox.php';
																				break;
																			case 'dropdown':
																				include 'input/dropdown.php';
																				break;
																			case 'order':
																				include 'input/order.php';
																				break;
																			case 'upload':
																			case 'image':
																			case 'file':
																				include 'input/upload.php';
																				break;
																			case 'multiselect':
																				include 'input/multiselect.php';
																				break;
																			case 'hidden':
																				include 'input/hidden.php';
																				break;
																		}
																	echo '</td>'  ;
																}
															}
															if($this->edit == true)
															{
																if(!empty($this->edit_link))
																{
																	preg_match_all('~{.*?}~',$this->edit_link,$edit_link_output);
																	if(!empty($edit_link_output[0][0]))
																	{
																		$edit_link_output = $edit_link_output[0][0];
																		$this->edit_link = str_replace($edit_link_output, '', $this->edit_link);
																		$edit_link_output = str_replace('{', '', $edit_link_output);
																		$edit_link_output = str_replace('}', '', $edit_link_output);
																		$edit_link = $this->edit_link.$dvalue[$edit_link_output];
																	}else{
																		$edit_link = $this->edit_link.$dvalue[$this->key];
																	}
																}
																
																?>
																<td>
																	<a href="<?php echo $edit_link ?>" class="btn btn-default" title="click to edit" data-toggle="tooltip" data-placement="top"> <span class="fa fa-pencil-alt"></span></a>
																</td>
																<?php
															}
															if($this->delete == true)
															{
																?>
																<td>
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" class="del_check" name="del_row[]" value="<?php echo $dvalue[$this->key]; ?>"> <span class="glyphicon glyphicon-trash"></span>
																		</label>
																	</div>
																</td>
																<?php
															}
															?>
														</tr>
														<?php
													}
												}
												$tot_col = count($this->input);
												foreach ($this->input as $inputkey => $inputvalue)
												{
													if($inputvalue['type'] == 'checkbox' || $inputvalue['type'] == 'number' || $inputvalue['type'] == 'text' || $inputvalue['type'] == 'dropdown')
													{
														if(@$this->attribute[$inputvalue['text']] != 'disabled')
														{
															$tot_col--;
														}
													}
												}
												foreach ($this->hide as $hide_key => $hide_value) 
												{
													$tot_col--;
												}
												if(!empty($this->numbering))
												{
													$tot_col++;
												}
												if(!$this->datatable)
												{
													?>
													<tr>
														<td colspan="<?php echo $tot_col; ?>"><?php echo !empty($pagination) ? $pagination : ''; ?></td>
														<?php
														foreach ($this->input as $inputkey => $inputvalue)
														{
															if($inputvalue['type'] == 'checkbox' || $inputvalue['type'] == 'text' || $inputvalue['type'] == 'dropdown')
															{
																if(empty($this->attribute[$inputvalue['text']]) || is_array($this->attribute[$inputvalue['text']]))
																{
																// $add_text = $inputvalue['type'] == 'text' ? 'Save ' : '';
																	$add_text = 'Save ';
																	?>
																	<td>
																		<button type="submit" name="<?php echo $inputvalue['text'] ?>" value="1" class="btn btn-info btn-sm">
																			<span class="glyphicon glyphicon-floppy-saved"></span> <?php echo $add_text.' '.$inputvalue['text'] ?>
																		</button>
																	</td>
																	<?php
																}
															}
														}
														if($this->edit == true)
														{
															// $tot_col = $tot_col+1;
															echo '<td></td>';
														}
														if($this->delete)
														{
															?>
															<td>
																<button type="<?php echo $this->delete_type ?>" name="delete_<?php echo $this->formName?>" onclick="if(confirm('apakah anda yakin ingin menghapus data tsb ?')){}else{return false;};" value="1" class="btn btn-danger btn-sm">
																	<span class="glyphicon glyphicon-trash"></span> DELETE
																</button>
															</td>
															<?php
														}
														?>
													</tr>
													<?php
												}
											}
											?>
											<!-- <button class="btn btn-default" onclick="window.history.back();" data-toggle="tooltip" title="go back"><i class="fa fa-arrow-left"></i></button> -->
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php
			}
		}
	}

	public function editJoin($data)
	{
		if(!empty($data) && is_array($data))
		{
			if(!empty($data['table']))
			{
				$this->editJoin['table'] = $data['table'];
			}else{
				msg('Table cant be empty in tablejoin','danger');die();
			}
			if(!empty($data['field']))
			{
				if(is_array($data['field']))
				{
					$this->editJoin['field'] = $data['field'];
				}else{
					msg('Field must array in tablejoin','danger');die();
				}
			}else{
				msg('Field cant be empty in tablejoin','danger');die();
			}
			if(!empty($data['key']))
			{
				$this->editJoin['key'] = $data['key'];
				$key_id = $this->CI->db->query('SELECT '.$this->editJoin['key'].' FROM '.$this->table.' WHERE id = ?',$this->id)->row_array();
				$key_id = !empty($key_id[$this->editJoin['key']]) ? $key_id[$this->editJoin['key']] : 0;
				$this->editJoin['key_id'] = $key_id;
			}
		}
	}

	public function action()
	{
		if(!empty($_POST))
		{
			$this->success = TRUE;
			if(!empty($this->func))
			{
				$this->func();
			}
			if($this->init == 'edit' || $this->init == 'param')
			{
				$data    = array();
				$last_id = 0;
				
				foreach ($this->input as $key => $value) 
				{
					if($value['type'] == 'static')
					{
						if(!empty($this->value[$key]))
						{
							$_POST[$value['text']] = $this->value[$key];
						}else{
							$_POST[$value['text']] = '';
						}
					}
				}
				$data_post = $_POST;
				foreach ($data_post as $key => $value)
				{
					if(empty($data_post['del_row']) && ($this->init == 'edit'))
					{
						if(is_array($value))
						{
							$data_post[$key] = ','.implode(',',$value).',';
						}
					}
				}
				$this->formName = str_replace('.', '_', $this->formName);
				if(!empty($data_post[$this->formName]))
				{
					unset($data_post[$this->formName]);
					unset($data_post[$this->CI->security->get_csrf_token_name()]);
					// if(isset($data_post['password']))
					// {
					// 	if(empty($this->encrypt))
					// 	{
					// 		$data_post['password'] = $data_post['password'];
					// 	}else{
					// 		$data_post['password'] = encrypt($data_post['password']);
					// 	}
					// }
					if(!empty($this->encrypt))
					{
						foreach ($this->encrypt as $en_key => $en_value) 
						{
							$data_post[$en_value] = encrypt($data_post[$en_value]);
						}
					}
					$post_secure = array();
					foreach ($this->input as $key => $value) 
					{
						$post_secure[$value['text']] = @$data_post[$value['text']];
					}
					$data_post = $post_secure;
					if(!empty($this->table))
					{
						$data['msg']   = 'Data Failed to Save';
						$data['alert'] = 'danger';

						$upload  = array();
						$uploads = array();
						$title   = '';
						foreach ($this->input as $key => $value)
						{
							$upload_type = array('upload','image','file');
							$uploads_type = array('uploads','images','files','gallery','multifiles');
							if(in_array($value['type'], $upload_type))
							{
								$upload[] = $value['text'];
							}
							if(in_array($value['type'], $uploads_type))
							{
								$uploads[] = $value['text'];
							}
							if($value['text'] != 'csrf_esg')
							{
								$data_post[$value['text']] = @$data_post[$value['text']];
							}
							if($value['type'] == 'checkbox')
							{
								if(empty($data_post[$value['text']]))
								{
									$data_post[$value['text']] = 0;
								}
							}
						}

						foreach ($this->input as $key => $value)
						{
							if($value['type'] == 'text')
							{
								$title = $value['text'];
								break;
							}
						}
						if(!empty($this->unique))
						{
							foreach ($this->unique as $key => $value) 
							{
								if(empty($this->id))
								{
									if(!empty($this->editJoin['table']))
									{
										$data = $this->CI->db->query('SELECT '.$value.' FROM '.$this->editJoin['table'].' WHERE '.$value.' = ?', @$data_post[$value])->row_array();
									}else{
										$data = $this->CI->db->query('SELECT '.$value.' FROM '.$this->table.' WHERE '.$value.' = ?', @$data_post[$value])->row_array();
									}
								}else{
									if(!empty($this->editJoin['table']))
									{
										$data = $this->CI->db->query('SELECT '.$value.' FROM '.$this->editJoin['table'].' WHERE '.$value.' = ? AND id != ?', array(@$data_post[$value], $this->editJoin['key_id']))->row_array();
									}else{
										$data = $this->CI->db->query('SELECT '.$value.' FROM '.$this->table.' WHERE '.$value.' = ? AND id != ?', array(@$data_post[$value], $this->id))->row_array();
									}
								}
								if(!empty($data))
								{
									$this->success = FALSE;
									$value_label = !empty($this->label[$value]) ? $this->label[$value] : $value;
									if(!empty($this->unique_msg))
									{
										$pattern[0] = '~{value}~';
										$pattern[1]= '~{table}~';
										$this->unique_msg = $value_label.' '.preg_replace($pattern, [@$data_post[$value], $this->table], $this->unique_msg);
									}else{
										$this->unique_msg = $value_label.' '.@$data_post[$value].' was exist in table '.$this->table;
									}
									$this->msg[$value] = array('msg'=>$this->unique_msg, 'alert' => 'danger',$value=>'has-error');
								}
							}
						}
						if($this->success)
						{
							$deleted_images = array();
							if(!empty($this->editJoin['table']) && !empty($this->editJoin['field']))
							{
								$data_join_post = [];
								foreach ($data_post as $dpkey => $dpvalue) 
								{
									foreach ($this->editJoin['field'] as $ejkey => $ejvalue) 
									{
										if($ejvalue == $dpkey)
										{
											$data_join_post[$ejvalue] = $data_post[$dpkey];
										}
									}
								}
								if(empty($this->editJoin['key_id']))
								{
									$this->set_data($this->editJoin['table'],0,$data_join_post);
								}else{
									$this->set_data($this->editJoin['table'],$this->editJoin['key_id'],$data_join_post);
								}
								if(!empty($this->editJoin['key']))
								{
									$last_join_id = $this->insert_id;
									// $data_post[$this->editJoin['key']] = $last_join_id;
									
								}
							}

							if($this->init == 'edit')
							{
								if($this->set_data($this->table, $this->id, $data_post))
								{
									$data['msg']   = 'Data Saved Successfully';
									$data['alert'] = 'success';
								}
							}else if($this->init == 'param')
							{
								$data_param = array();
								if(!empty($data_post))
								{
									$data_param['name'] = $this->paramname;
									$data_param[$this->param_field] = json_encode($data_post);
								}
								if($this->set_param($this->table, $this->paramname, $data_param))
								{
									$data['msg']   = 'Data Saved Successfully';
									$data['alert'] = 'success';
								}else{
									$data['msg']   = 'Data Failed to Saved';
									$data['alert'] = 'danger';
								}
							}
							$last_id = $this->CI->db->insert_id();
							
							
							if(!empty($last_id) && !empty($last_join_id))
							{
								$this->set_data($this->table,$last_id,[$this->editJoin['key']=>$last_join_id]);
							}
							$this->set_insert_id($last_id);
							if(!empty($last_id) || !empty($this->id) || !empty($this->paramname))
							{
								$post_ori = $data_post;
								if(!empty($upload))
								{
									$i = 0;
									$dir_image = '';
									if($this->init == 'edit')
									{
										$dir_image = !empty($this->id) ? $this->id : $last_id;
									}else if($this->init == 'param'){
										$dir_image = !empty($this->dir_image) ? $this->dir_image : $this->paramname;
									}
									foreach ($upload as $u_key => $u_value)
									{
										$module = !empty($this->table) ? 'modules/'.$this->table : 'uploads';
										$dir = FCPATH.'images/'.$module.'/'.$dir_image.'/';
										if(!empty($_FILES[$upload[$i]]['name']) && empty($_FILES[$upload[$i]]['error']))
										{
											$data_post[$u_value] = !empty($data_post[$title]) ? $u_value.'_'.str_replace(' ','_',$data_post[$title]) : $u_value.'_image';
											if(!is_dir($dir))
											{
												mkdir($dir, 0777,1);
											}
											$ext = pathinfo($_FILES[$upload[$i]]['name']);
											if($this->check_type($ext['extension'],$u_value))
											{
												$file_name = $data_post[$u_value].'.'.$ext['extension'];
												if($this->init == 'edit')
												{
													$file_name_exist = $this->get_one($this->table, $u_value);
												}else if($this->init == 'param')
												{
													$data_image      = json_decode($data_param[$this->param_field],1);
													$file_name_exist = $data_image[$u_value];
												}
												if(empty($data_post[$u_value]))
												{
													foreach(glob($dir.'/'.$u_value.'_*') as $file)
													{
														unlink($file);
													}
												}else if(empty($file_name_exist))
												{
													foreach(glob($dir.'/'.$u_value.'_*') as $file)
													{
														unlink($file);
													}
												}
												$file_name = str_replace('/','_',$file_name);
												copy($_FILES[$upload[$i]]['tmp_name'], $dir.$file_name);

												$config_image_lib['image_library']  = 'gd2';
												$config_image_lib['source_image']   = $dir.$file_name;
												// $config_image_lib['create_thumb']   = TRUE;
												$config_image_lib['maintain_ratio'] = TRUE;
												$config_image_lib['width']          = 750;
												$config_image_lib['height']         = 500;

												$this->CI->load->library('image_lib');

												$this->CI->image_lib->initialize($config_image_lib);
												if($this->CI->image_lib->resize())
												{
												}
												if($this->init == 'edit')
												{
													$update_file = array($u_value => $file_name);
													$this->set_data($this->table, $dir_image, $update_file);
												}else if($this->init == 'param'){
													$image_array = 
													[
														'upload',
														'image',
														'file',
														'uploads',
														'images',
														'files',
														'multifiles',
														'gallery',
													];
													foreach ($data_post as $dp_key => $dp_value)
													{
														if(in_array($this->input[$dp_key]['type'], $image_array))
														{
															if(!preg_match('~.'.$ext['extension'].'~',$file_name))
															{
																$file_name = $file_name.'.'.$ext['extension'];
															}
															$data_post[$u_value] = $file_name;
														}
													}
													$data_param[$this->param_field] = json_encode($data_post);
													$data_param['name']  = $this->paramname;
													$this->set_param($this->table, $this->paramname, $data_param);
												}
											}
										}
										$i++;
									}
									if($this->init == 'param')
									{
										$tmp_data_param = json_decode($data_param[$this->param_field], 1);
										foreach ($tmp_data_param as $tdpkey => $tdpvalue) 
										{
											if(empty($tmp_data_param[$tdpkey]))
											{
												$deleted_images[] = $tdpkey;
											}
										}
									}else if($this->init == 'edit')
									{
										foreach ($data_post as $tdpkey => $tdpvalue) 
										{
											if(empty($data_post[$tdpkey]))
											{
												$deleted_images[] = $tdpkey;
											}
										}
									}
									foreach ($deleted_images as $dikey => $divalue)
									{
										foreach(glob($dir.$divalue.'_*') as $file)
										{
											unlink($file);
										}
									}
								}
								if(!empty($uploads))
								{
									$i = 0;
									$dir_image = '';
									if($this->init == 'edit')
									{
										$dir_image = !empty($this->id) ? $this->id : $last_id;
									}else if($this->init == 'param'){
										$dir_image = $this->paramname;
									}
									foreach ($uploads as $u_key => $u_value)
									{
										$data_post[$u_value] = !empty($data_post[$title]) ? $u_value.'_'.str_replace(' ','_',$data_post[$title]) : 'image';
										$files_ready     = true;
										if(!empty($_FILES[$uploads[$i]]['error']))
										{
											foreach ($_FILES[$uploads[$i]]['error'] as $err_key => $err_value )
											{
												if(!empty($err_value))
												{
													$files_ready = false;
												}
											}
										}
										$module = !empty($this->table) ? 'modules/'.$this->table : 'uploads';
										$dir = FCPATH.'images/'.$module.'/gallery'.'/'.$dir_image.'/';
										if($files_ready)
										{
											if(!is_dir($dir))
											{
												mkdir($dir, 0777,1);
											}
											$exts = array();
											$files_name = array();
											if(!empty($_FILES[$uploads[$i]]['name']))
											{
												foreach ($_FILES[$uploads[$i]]['name'] as $n_key => $n_value)
												{
													$exts[$n_key]       = pathinfo($n_value);
													$files_name[$n_key] = $data_post[$u_value].'_'.$n_key.'_'.time().'.'.$exts[$n_key]['extension'];
												}
											}
											$files_upload = array();
											$j = 0;
											if(!empty($_FILES[$uploads[$i]]['tmp_name']))
											{
												foreach ($_FILES[$uploads[$i]]['tmp_name'] as $n_key => $n_value)
												{
													$files_upload[$j]['tmp'] = $n_value;
													$j++;
												}
											}
											$j = 0;
											foreach ($files_name as $f_key => $f_value)
											{
												$files_upload[$j]['name'] = $f_value;
												$j++;
											}
											if(!empty($files_upload))
											{
												$tmp_file_name = array();
												$file_name = string_to_array($post_ori[$u_value]);
												if(is_array($file_name))
												{
													foreach ($file_name as $flkey => $flvalue) {
														$tmp_file_name[] = $flvalue;
													}
													$file_name = json_encode($tmp_file_name);
													foreach(glob($dir.'/'.$u_value.'_*') as $file)
													{
														$current_file = explode('/',$file);
														$current_file = end($current_file);
														if(!in_array($current_file, $tmp_file_name))
														{
															unlink($file);
														}
													}
												}
												foreach ($files_upload as $fu_key => $fu_value)
												{
													copy($fu_value['tmp'], $dir.str_replace('/','_',$fu_value['name']));
												}
											}
											if(is_array($files_name))
											{
												$file_name = json_encode($files_name);
											}else{
												$file_name = string_to_array($files_name);
												$file_name = json_encode($file_name);
											}
											if(!empty($tmp_file_name))
											{
												$new_file_name = array_merge($files_name, $tmp_file_name);
											}
											if(!empty($new_file_name))
											{
												if(is_array($new_file_name))
												{
													$file_name = json_encode($new_file_name);
												}else{
													$file_name = string_to_array($new_file_name);
													$file_name = json_encode($file_name);
												}
											}
											if($this->init == 'edit')
											{
												$update_file = array($u_value => $file_name);
												$this->set_data($this->table, $dir_image, $update_file);
											}else if($this->init == 'param')
											{
												foreach ($data_post as $dp_key => $dp_value)
												{
													if($dp_key=='image')
													{
														$data_post[$dp_key] = $file_name;
													}
												}
												$data_param[$this->param_field] = json_encode($data_post);
												$data_param['name']  = $dir_image;
												// $this->set_param($this->table, $dir_image, $data_param);
											}
										}else{
											$tmp_file_name = array();
											$file_name = string_to_array($post_ori[$u_value]);
											if(is_array($file_name))
											{
												foreach ($file_name as $flkey => $flvalue) {
													$tmp_file_name[] = $flvalue;
												}
												$file_name = json_encode($tmp_file_name);
												if($this->init == 'edit')
												{
													$update_file = array($u_value => $file_name);
													$this->set_data($this->table, $dir_image, $update_file);
												}else if($this->init == 'param')
												{
													foreach ($data_post as $dp_key => $dp_value)
													{
														if($dp_key=='images')
														{
															$data_post[$dp_key] = $file_name;
														}
													}
													$data_param[$this->param_field] = json_encode($data_post);
													$data_param['name']  = $dir_image;
													$this->set_param($this->table, $dir_image, $data_param);
												}
												$separator_dir = substr($dir,-1);
												$separator_dir = $separator_dir == '/' ? '' : '/';
												$glob_images = $dir.$separator_dir.$u_value.'_*';
												if(empty(glob($dir.$separator_dir.$u_value.'_*')))
												{
													$glob_images = $dir.$separator_dir.'image_*';
												}
												foreach(glob($glob_images) as $file)
												{
													$current_file = explode('/',$file);
													$current_file = end($current_file);
													if(!in_array($current_file, $tmp_file_name))
													{
														unlink($file);
													}
												}
											}else{
												foreach(glob($dir.'/'.$u_value.'_*') as $file)
												{
													unlink($file);
												}
											}
										}
										$i++;
									}
								}
							}
						}else{
							return $this->msg;
						}
					}else{
						$data['msg']   = 'Table Undefined';
						$data['alert'] = 'danger';
						$this->msg[] = $data;
					}
				}else if(!empty($data_post['delete_param'])){
					$this->CI->db->delete($this->table,['name'=>$this->paramname]);
					$data['msg']   = 'Delete Config Successfully';
					$data['alert'] = 'success';
				}else{
					// $data['msg']   = 'Please Press Submit Button to Save';
					// $data['alert'] = 'warning';
				}

				$this->msg[] = $data;
				return $this->msg;
			}else if($this->init == 'roll')
			{
				$current_data = $this->getdata();
				// $current_data = $data;
				$current_data = $current_data['data'];
				$data = array();
				if(!empty($this->table))
				{
					foreach ($this->input as $inputkey => $inputvalue)
					{
						if($inputvalue['type'] == 'checkbox')
						{
							if(!empty($_POST[$inputvalue['text']]))
							{
								$data_checkbox = array();
								$currentdatai = 0;
								foreach ($_POST[$inputvalue['text'].'_row_h'] as $currentdatakey => $currentdatavalue)
								{
									$data_checkbox[$currentdatai] = $currentdatavalue;
									$currentdatai++;
								}
								if(!empty($data_checkbox))
								{
									$data['msg']   = 'No Data Selected to '.$inputvalue['text'];
									$data['alert'] = 'success';
									$checkbox_q = [];
									foreach ($data_checkbox as $dc_key => $dc_id)
									{
										$data['msg']   = 'Data '.ucfirst($inputvalue['text']).' Successfully';
										$data['alert'] = 'success';

										if(!empty($_POST[$inputvalue['text'].'_row']))
										{
											if(in_array($dc_id, $_POST[$inputvalue['text'].'_row']))
											{
												$checkbox_q[] = ['id'=>$dc_id,$inputvalue['text']=>1];
											}else{
												$checkbox_q[] = ['id'=>$dc_id,$inputvalue['text']=>0];
											}
										}else{
											$checkbox_q[] = ['id'=>$dc_id,$inputvalue['text']=>0];
										}
									}
									$this->CI->db->update_batch($this->table, $checkbox_q,'id');
								}
							}
						}
						if($inputvalue['type'] == 'text')
						{
							if(!empty($_POST[$inputvalue['text']]))
							{
								$data_text = array();
								$currentdatai = 0;
								foreach ((array) @$_POST[$inputvalue['text'].'_row'] as $currentdatakey => $currentdatavalue)
								{
									$data_text[$currentdatai] = $currentdatakey;
									$currentdatai++;
								}
								if(!empty($data_text))
								{
									$data['msg']   = 'No Data Selected to '.$inputvalue['text'];
									$data['alert'] = 'success';
									$text_q = [];
									foreach ($data_text as $dt_key => $dt_id)
									{
										$data['msg']   = 'Data '.ucfirst($inputvalue['text']).' Successfully';
										$data['alert'] = 'success';

										if(!empty($_POST[$inputvalue['text'].'_row']))
										{
											$text_q[] = ['id'=>$dt_id, $inputvalue['text']=>$_POST[$inputvalue['text'].'_row'][$dt_id]];
										}
									}
									// $this->CI->db->update($this->table, array($inputvalue['text']=>$_POST[$inputvalue['text'].'_row'][$dt_id]), 'id = '.$dt_id);
									$this->CI->db->update_batch($this->table, $text_q, 'id');
								}
							}
						}
						if($inputvalue['type'] == 'dropdown')
						{
							if(!empty($_POST[$inputvalue['text']]))
							{
								$data_text = array();
								$currentdatai = 0;
								foreach ($current_data as $currnetdatakey => $currentdatavalue)
								{
									$data_text[$currentdatai] = $currentdatavalue['id'];
									$currentdatai++;
								}
								if(!empty($data_text))
								{
									$data['msg']   = 'No Data Selected to '.$inputvalue['text'];
									$data['alert'] = 'success';
									foreach ($data_text as $dt_key => $dt_id)
									{
										$data['msg']   = 'Data '.ucfirst($inputvalue['text']).' Successfully';
										$data['alert'] = 'success';

										if(!empty($_POST[$inputvalue['text'].'_row']))
										{
											$this->CI->db->update($this->table, array($inputvalue['text']=>$_POST[$inputvalue['text'].'_row'][$dt_id]), 'id = '.$dt_id);
										}
									}
								}
							}
						}
					}
					if(!empty($_POST['delete_'.$this->formName]))
					{
						$data['msg']   = 'No Data Selected to Delete';
						$data['alert'] = 'success';
						if(!empty($_POST['del_row']))
						{
							$data['msg']   = 'Data Deleted Successfully';
							$data['alert'] = 'success';
							$this->del_data($this->table, $_POST['del_row']);
						}
					}
				}else{
					$data['msg'] = 'Table Undefined';
					$data['alert'] = 'danger';
				}
				$this->msg[] = $data;
				return $this->msg;
			}
		}
		if(!empty($this->api_server))
		{
			if(empty($this->id))
			{
				if($this->init == 'param')
				{
					if(!empty($this->param))
					{
						$name = $this->paramname;
						$data = json_decode($this->param[$this->param_field], 1);
					}else{
						$this->param = $this->getParam();
						$name = $this->paramname;
						$data = $this->param[$this->param_field];
						$data = json_decode($data,1);
					}
				}else{
					$this->setData();
					$data = $this->data;
				}
				return $data;
			}
		}
	}

	/*=====================================================
	 * $data[]  = array(
				'id'      => $id
			, 'par_id'  => $par_id
			, 'title'   => $title);
	 *====================================================*/
	function array_path($data, $par_id = 0, $separate = ' / ', $prefix = '', $load_parent = '')
	{
		$output = array();
		foreach((array)$data AS $dt)
		{
			if(@$dt['par_id'] == $par_id)
			{
				if(empty($load_parent))
				{
					$text = ($par_id==0) ? $prefix.$dt['title'] : $prefix.$separate.$dt['title'];
					$output[$dt['id']] = $text;
				}else{
					$output[$dt['id']] = ($par_id==0) ? $prefix.$dt['title'] : $prefix.$separate.$dt['title'];
					$text = ($par_id==0) ? $prefix.$load_parent : $prefix.$separate.$load_parent;
				}
				$r = $this->array_path($data, $dt['id'], $separate, $text, $load_parent);
				if(!empty($r)) {
					foreach($r AS $i => $j)
						$output[$i] = $j;
				}
			}
		}
		return $output;
	}
	function createOption($arr, $select='')
	{
		$output = '';
		$valueiskey = $check_first = false;
		foreach((array)$arr AS $key => $dt){
			if(is_array($dt)){
				list($value, $caption) = array_values($dt);
				if(empty($caption)) $caption = $value;
			}else{
				if(!$check_first) {
					if((is_numeric($key) && $key != 0)
					|| (is_string($key) && !is_numeric($key))) {
						$valueiskey = true;
					}
					$check_first = true;
				}
				if(empty($dt) && !empty($key)) $dt = $key;
				$value = $valueiskey ? $key : $dt;
				$caption = $dt;
			}
			if(isset($select)){
				if(is_array($select)) $selected = (in_array($value, $select)) ? ' selected="selected"':'';
				else    $selected = ($value==$select) ? ' selected="selected"':'';
			}else{
				$selected = '';
			}
			$output .= "<option value=\"$value\"$selected>$caption</option>";
		}
		return $output;
	}
}