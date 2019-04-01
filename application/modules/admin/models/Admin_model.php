<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		// $this->load->library('ZEA/zea');
		// $this->sidebar_menu();
		$this->menu();
		$this->site();
	}

	public function visitor()
	{
		$data = array();
		// $data['browser']['chrome'] = $this->db->query("SELECT id FROM visitor WHERE browser LIKE '%Chrome%'")->num_rows();
		// $data['browser']['firefox'] = $this->db->query("SELECT id FROM visitor WHERE browser LIKE '%Firefox%'")->num_rows();
		$city = $this->db->query('SELECT city FROM visitor WHERE 1 GROUP BY city')->result_array();
		$region = $this->db->query('SELECT region FROM visitor WHERE 1 GROUP BY region')->result_array();
		$country = $this->db->query('SELECT country FROM visitor WHERE 1 GROUP BY country')->result_array();
		$browser = $this->db->query('SELECT browser FROM visitor WHERE 1 GROUP BY browser')->result_array();
		if(!empty($city))
		{
			foreach ($city as $key => $value) 
			{
				if(!empty($value['city']))
				{
					$data['city'][$value['city']] = $this->db->query('SELECT id FROM visitor WHERE city = ?', $value['city'])->num_rows();
				}
			}
		}
		if(!empty($region))
		{
			foreach ($region as $key => $value) 
			{
				if(!empty($value['region']))
				{
					$data['region'][$value['region']] = $this->db->query('SELECT id FROM visitor WHERE region = ?', $value['region'])->num_rows();
				}
			}
		}
		if(!empty($country))
		{
			foreach ($country as $key => $value) 
			{
				if(!empty($value['country']))
				{
					$data['country'][$value['country']] = $this->db->query('SELECT id FROM visitor WHERE country = ?', $value['country'])->num_rows();
				}
			}
		}
		if(!empty($browser))
		{
			foreach ($browser as $key => $value) 
			{
				if(!empty($value['browser']))
				{
					$data['browser'][$value['browser']] = $this->db->query('SELECT id FROM visitor WHERE browser = ?', $value['browser'])->num_rows();
				}
			}
		}
		if(!empty($data))
		{
			$this->esg->set_esg('visitor', $data);
		}
	}

	public function sidebar_menu()
	{
		$data = array();
		$menu = array(
		  array(
		    'title' => 'Dashboard',
		    'icon' => 'fa-tachometer-alt',
		    'link' => base_url('admin')
		  ),
		  array(
		    'title' => 'Content',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		    	array(
		        'title' => 'Category',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/category')
		      ),
		      array(
		        'title' => 'Add Content',
		        'icon' => 'fa-pencil-alt',
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
		  	'title' => 'Gallery',
		  	'icon' => 'fa-images',
		  	'link' => base_url('admin/gallery'),
		  	'list' => array(
		  		array(
		  			'title' => 'Images',
				  	'icon' => 'fa-image',
				  	'link' => base_url('admin/gallery'),
		  		),
		  	),
		  ),
		  array(
		    'title' => 'User',
		    'icon' => 'fa-user',
		    'link' => base_url('admin/user/list'),
		    'list' => array(
		      array(
		        'title' => 'User List',
		        'icon' => 'fa-dot-circle',
		        'link' => base_url('admin/user/list')
		      ),
		      array(
		        'title' => 'User Add',
		        'icon' => 'fa-dot-circle',
		        'link' => base_url('admin/user/edit')
		      ),
		      array(
		        'title' => 'User Role',
		        'icon' => 'fa-dot-circle',
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
		        'icon' => 'fa-pencil-alt',
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
		    'title' => 'Admin Menu',
		    'icon' => 'fa-list',
		    'link' => base_url('admin/admin_menu/list'),
		    'list' => array(
		    	array(
		        'title' => 'Add Menu',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/admin_menu/edit')
		      ),
		      array(
		        'title' => 'Menu List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/admin_menu/list')
		      ),
		      array(
		        'title' => 'Parent Menu',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/admin_menu?id=0')
		      ),
		    )
		  ),
		  array(
		    'title' => 'data',
		    'icon' => 'fa-database',
		    'link' => base_url('admin/visitor'),
		    'list' => array(
		    	array(
		        'title' => 'Visitor',
		        'icon' => 'fa-chart-bar',
		        'link' => base_url('admin/visitor')
		      )
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
		      array(
		        'title' => 'backup',
		        'icon' => 'fa-download',
		        'link' => base_url('admin/backup')
		      ),
		      array(
		        'title' => 'restore',
		        'icon' => 'fa-upload',
		        'link' => base_url('admin/restore')
		      ),
		    )
		  ),
		);
		$data['menu'] = $menu;
		$this->esg->set_esg('sidebar_menu', $data['menu']);
	}

	public function menu()
	{
		$data = array();
		$role_id = @$this->session->userdata(base_url('_logged_in'))['user_role_id'];
		$menu = $this->db->query("SELECT * FROM admin_menu WHERE user_role_ids LIKE '%,{$role_id},%' ORDER BY sort_order")->result_array();
		$tmp_data = $menu;
		if(!empty($tmp_data))
		{
			$output = array();
			$data = array();
			$b_data = array();
			foreach ($tmp_data as $tmkey => $tmvalue)
			{
				$b_data[$tmvalue['id']] = $tmvalue;
			}
			foreach ($b_data as $tkey => $tvalue)
			{
				if($tvalue['par_id'] == 0)
				{
					$data[$tvalue['id']] = $tvalue;
				}
			}
			foreach ($b_data as $tkey => $tvalue)
			{
				if($tvalue['par_id'] > 0)
				{
					if(!empty($data[$tvalue['par_id']]))
					{
						$data[$tvalue['par_id']]['list'][$tvalue['id']]  = $tvalue;
					}else if(!empty($b_data[$tvalue['par_id']]))
					{
						$id = $b_data[$tvalue['par_id']]['par_id'];
						$data[$id]['list'][$tvalue['id']]  = $tvalue;
					}
				}
			}
			$this->esg->set_esg('sidebar_menu', $data);
		}
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