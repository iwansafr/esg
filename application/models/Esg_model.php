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
		// $this->js();
		$this->templates = $this->esg->get_config('templates');
		$this->esg->set_esg('templates',$this->templates);
		$this->esg_data = $this->esg->get_esg();
	}
	public function js()
	{
		$this->esg->set_esg('extra_js',base_url('templates/AdminLTE/assets/dist/js/script.js'));
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
		      array(
		        'title' => 'User Role',
		        'icon' => 'fa-circle-o',
		        'link' => base_url('admin/user/role'),
		      ),
		    )
		  ),
		  array(
		    'title' => 'Content',
		    'icon' => 'fa-file-text',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		    	array(
		        'title' => 'Category',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/category')
		      ),
		      array(
		        'title' => 'Add Content',
		        'icon' => 'fa-pencil',
		        'link' => base_url('admin/content/edit')
		      ),
		      array(
		        'title' => 'Content List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/list')
		      ),
		      array(
		        'title' => 'Comment',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/comment_list')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Menu',
		    'icon' => 'fa-list',
		    'link' => base_url('admin/menu/list'),
		    'list' => array(
		    	array(
		        'title' => 'Add Menu',
		        'icon' => 'fa-pencil',
		        'link' => base_url('admin/menu/edit')
		      ),
		      array(
		        'title' => 'Menu List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/menu/list')
		      ),
		      array(
		        'title' => 'Menu Position',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/menu/position')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Configuration',
		    'icon' => 'fa-cog',
		    'link' => base_url('admin/config/'),
		    'list' => array(
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
		        'title' => 'templates',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/templates')
		      ),
		    )
		  ),
		);
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
						'description' => 'software development and it consultant',
						'developer' => 'esoftgreat',
						'author' => 'esoftgreat',
						'email' => 'iwan@esoftgreat.com , iwansafr@gmail.com',
						'phone' => '6285640510460',
						'icon' => base_url('images/icon.png'),
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
}