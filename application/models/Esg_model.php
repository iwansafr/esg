<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Esg_model extends CI_Model
{
	var $templates = array();
	var $esg_data  = array();

	public function __construct()
	{
		parent::__construct();
	}
	public function init()
	{
		$this->sidebar_menu();
		$this->navigation();
		$this->set_meta();
		$this->templates = $this->esg->get_config('templates');
		$this->esg->set_esg('templates',$this->templates);
		$this->esg_data = $this->esg->get_esg();
	}
	public function sidebar_menu()
	{
		$data = array();
		$menu = array(
		  array(
		    'title' => 'Dashboard',
		    'icon' => 'fa-dashboard',
		    'link' => base_url('admin')
		  ),
		  array(
		    'title' => 'User',
		    'icon' => 'fa-user',
		    'link' => base_url('admin/user/list'),
		    'list' => array(
		      array(
		        'title' => 'User List',
		        'icon' => 'fa-circle-o',
		        'link' => base_url('admin/user/list')
		      ),
		      array(
		        'title' => 'User Add',
		        'icon' => 'fa-circle-o',
		        'link' => base_url('admin/user/edit')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Content',
		    'icon' => 'fa-file-text',
		    'link' => base_url('admin/content_list'),
		    'list' => array(
		    	array(
		        'title' => 'Category',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content_category')
		      ),
		      array(
		        'title' => 'Add Content',
		        'icon' => 'fa-pencil',
		        'link' => base_url('admin/content_edit')
		      ),
		      array(
		        'title' => 'Content List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content_list')
		      ),
		      array(
		        'title' => 'Comment',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/comment_list')
		      ),
		      array(
		        'title' => 'Content Config',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/content_config')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Menu',
		    'icon' => 'fa-list',
		    'link' => base_url('admin/menu_list'),
		    'list' => array(
		    	array(
		        'title' => 'Add Menu',
		        'icon' => 'fa-pencil',
		        'link' => base_url('admin/menu_edit')
		      ),
		      array(
		        'title' => 'Menu List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/menu_list')
		      ),
		      array(
		        'title' => 'Menu Position',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/menu_position')
		      ),
		    )
		  ),
		  array(
		  	'title' => 'Visitor',
		  	'icon' => 'fa-line-chart',
		  	'link' => base_url('admin/visitor_list'),
		  	'list' => array(
		  		array(
		  			'title' => 'All Visited',
		  			'icon' => 'fa-line-chart',
		  			'link' => base_url('admin/visitor_list'),
		  		),
		  		array(
		  			'title' => 'Vistor',
		  			'icon' => 'fa-line-chart',
		  			'link' => base_url('admin/visitor_ip'),
		  		)
		  	)
		  ),
		  array(
		  	'title' => 'Media',
		  	'icon' => 'fa-picture-o',
		  	'link' => base_url('admin/media_gallery/gallery')
		  ),
		  array(
		    'title' => 'Configuration',
		    'icon' => 'fa-cog',
		    'link' => base_url('admin/config/'),
		    'list' => array(
		    	array(
		        'title' => 'Header',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config_header/header')
		      ),
					array(
		        'title' => 'header_bottom',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config_header_bottom/header_bottom')
		      ),
		      array(
		        'title' => 'logo',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/logo')
		      ),
		      array(
		        'title' => 'site',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/site')
		      ),
		      array(
		      	'title' => 'Add Js',
		      	'icon' => 'fa-cog',
		      	'link' => base_url('admin/config_js_extra/js_extra')
		      ),
		      array(
		        'title' => 'templates',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config_templates/templates')
		      ),
		      array(
		        'title' => 'template_config',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config_template_config/template_config')
		      ),
		      array(
		        'title' => 'alert',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config_alert/alert')
		      ),
		      array(
		        'title' => 'web type',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config_web_type/web_type')
		      ),
		    )
		  ),
		);
		$web_type = $this->esg->get_config('web_type');
		if(!empty($web_type['type']))
		{
			$menu[] = array(
		    'title' => 'Product',
		    'icon' => 'fa-file-text',
		    'link' => base_url('admin/product_list'),
		    'list' => array(
		    	array(
		        'title' => 'Category',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/product_category')
		      ),
		      array(
		        'title' => 'Add Product',
		        'icon' => 'fa-pencil',
		        'link' => base_url('admin/product_edit')
		      ),
		      array(
		        'title' => 'Product List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/product_list')
		      ),
		    )
		  );
		}
		$data['menu'] = $menu;
		$this->esg->set_esg('sidebar_menu', $data['menu']);
	}

	public function set_meta($data = array())
	{
		if(empty($data) || !is_array($data))
		{
			$data = array(
						'title' => 'esoftgreat',
						'keyword' => 'software development',
						'description' => 'software development and it consultan',
						'developer' => 'esoftgreat',
						'author' => 'esoftgreat',
						'email' => 'iwan@esoftgreat.com , iwansafr@gmail.com',
						'phone' => '6285640510460',
						'icon' => base_url('images/icon.png')
					);
		}
		$this->esg->set_esg('meta', $data);
	}

	public function navigation()
	{
		$uri = array();
		$uri['string'] = $this->uri->uri_string();
		$uri['array'] = explode('/',$uri['string']);
		$this->esg->set_esg('navigation',$uri);
	}

	public function get_data_list($table = '', $field = array(), $input = array(), $limit = 0,$page = 0, $keyword = NULL)
	{
	    $data    = array();
	    $url_get = base_url($this->esg_data['navigation']['string']).'';
	    $id = 0;
	    if(!empty($this->view))
	    {
	      $url_get = base_url($this->view);
	    }
	    $add_sql = '';
	    if(!empty($input) && is_array($input))
	    {
	      $input = '`'.implode('`,`',$input).'`';
	    }else{
	      $input = '*';
	    }

	    if(!empty($_GET))
	    {
	      if(!empty($_GET['keyword']))
	      {
	        $keyword = $this->db->escape_str($_GET['keyword']);
	        $url_get = base_url('admin/'.$table.'_list').'?keyword='.$keyword;
	        if(!empty($this->view))
	        {
	          $url_get = base_url($this->view).'?keyword='.$keyword;
	        }
	      }
	      if(!empty($_GET['page']))
	      {
	        $page = @intval($_GET['page']);
	      }

	      if(!empty($_GET['id']))
	      {
	        $id = $_GET['id'];
	      }
	    }

	    if(!empty($field) && is_array($field))
	    {
	      $i = 0;
	      foreach ($field as $fkey => $fvalue)
	      {
	        $col = $i == 0 ? '(' :'';
	        // if(!empty($this->jointable))
	        // {
	        //   $fvalue = $this->jointable['table'].'.'.$fvalue;
	        // }
	        $add_sql .= " OR {$col} {$fvalue} LIKE '%{$keyword}%'";
	        $i++;
	      }
	      $add_sql .= ')';
	    }

	    if($page>0)
	    {
	      $page = $page-1;
	    }

	    $page = @intval($page)*$limit;
	    $this->db->limit($limit,$page);

	    $sql = '';
	    if($keyword != NULL)
	    {
	      $sql = " WHERE `id` = ".@intval($keyword)." {$add_sql}";
	      if(!empty($this->jointable))
	      {
	        $add = $this->jointable['table'];
	        $sql = " WHERE $add.id = ".@intval($keyword)." {$add_sql}";
	      }
	    }

	    if(!empty($this->where))
	    {
	      if(!empty($sql))
	      {
	        $sql = $sql.' AND '.$this->where;
	      }else{
	        $sql = ' WHERE '.$this->where;
	      }
	    }

	    if(!empty($this->jointable))
	    {
	      $this->orderby = ' ORDER BY '.$this->jointable['table'].'.id DESC ';
	    }

	    if(!empty($this->jointable))
	    {
	      $jointable = $this->jointable['table'];
	      $condition = $this->jointable['condition'];
	      $joinfield = $this->jointable['field'];
	      $query     = $this->db->query("SELECT {$joinfield} FROM `{$table}` LEFT JOIN {$jointable} {$condition} $sql {$this->orderby} LIMIT {$page},{$limit}");
	    }else{
	      $query = $this->db->query("SELECT {$input} FROM `{$table}` $sql {$this->orderby} LIMIT {$page},{$limit}");
	    }

	    $data['query'] = $this->db->last_query();
			$data['data']  = $query->result_array();
	    if($keyword==NULL && empty($id))
	    {
	      if(!empty($this->where))
	      {
	        $where = $this->where;
	        $total_rows = $this->db->query("SELECT `id` FROM `{$table}`  WHERE $where")->num_rows();
	        if(!empty($this->jointable))
	        {
	          $jointable  = $this->jointable['table'];
	          $condition  = $this->jointable['condition'];
	          $joinfield  = $this->jointable['field'];
	          $total_rows = $this->db->query("SELECT {$joinfield} FROM `{$table}` LEFT JOIN {$jointable} {$condition} $sql {$this->orderby}")->num_rows();
	        }
	      }else{
	        $total_rows = $this->db->count_all($table);
	      }
	    }else{
	      $q = "SELECT `id` FROM `{$table}`  WHERE `id` = '{$keyword}' {$add_sql}";
	      if(!empty($this->jointable))
	      {
	        $jointable = $this->jointable['table'];
	        $condition = $this->jointable['condition'];
	        $joinfield = $this->jointable['field'];
	        $q         = "SELECT {$joinfield} FROM `{$table}` LEFT JOIN {$jointable} {$condition} $sql {$this->orderby}";
	      }
	      $query = $this->db->query($q);
	      $total_rows = $query->num_rows();
	      if(!empty($this->where))
	      {
	        if(!empty($sql))
	        {
	          $sql = $sql.' AND '.$this->where;
	        }else{
	          $sql = ' WHERE '.$this->where;
	        }
	        $query = $this->db->query("SELECT `id` FROM `{$table}`  {$sql}");
	        $total_rows = $query->num_rows();
	      }
	    }
	    $config = pagination($total_rows,$limit,$url_get);
	    $this->pagination->initialize($config);
	    $data['pagination'] = $this->pagination->create_links();
		return $data;
	}	
}