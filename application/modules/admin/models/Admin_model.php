<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		// $this->load->library('ZEA/zea');
		$this->sidebar_menu();
		$this->site();
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
		        'title' => 'Tag',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/tag')
		      ),
		    )
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
		      array(
		        'title' => 'contact',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/contact')
		      ),
		      array(
		        'title' => 'style',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/style')
		      ),
		      array(
		        'title' => 'script',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/script')
		      ),
		    )
		  ),
		);
		$data['menu'] = $menu;
		$this->esg->set_esg('sidebar_menu', $data['menu']);
	}

	public function site()
	{
		$data = array();
		$data['logo'] = $this->esg->get_config('logo');
		$data['site'] = $this->esg->get_config('site');
		$this->esg->set_esg('site', $data);
	}

	public function home()
	{
		$data = array();
		$data['content'] = $this->db->query('SELECT id FROM content')->num_rows();
		$data['category'] = $this->db->query('SELECT id FROM content_cat')->num_rows();
		$data['tag'] = $this->db->query('SELECT id FROM content_tag')->num_rows();
		$data['menu'] = $this->db->query('SELECT id FROM menu')->num_rows();
		$data['menu_position'] = $this->db->query('SELECT id FROM menu_position')->num_rows();
		$data['user'] = $this->db->query('SELECT id FROM user')->num_rows();
		$data['user_role'] = $this->db->query('SELECT id FROM user_role')->num_rows();
		$data['message'] = $this->db->query('SELECT id FROM message WHERE status = 1')->num_rows();
		$this->esg->set_esg('home', $data);
	}

}