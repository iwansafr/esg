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
		$this->footer();
		$this->user();
		$this->message();
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
		$menu = $this->db->query("SELECT * FROM admin_menu WHERE user_role_ids LIKE '%,{$role_id},%' ORDER BY sort_order ASC")->result_array();
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
			// pr($b_data);
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
						$data[$id]['list'][$tvalue['par_id']][$tvalue['id']]  = $tvalue;
						// if($tvalue['id'] == '114')
						// {
						// 	pr($id);
						// 	pr($tvalue['id']);
						// 	pr($tvalue['par_id']);
						// }
					}
				}
			}
			// pr($data);die();
			$this->esg->set_esg('sidebar_menu', $data);
		}
	}

	public function site()
	{
		$data = array();
		$data['logo'] = $this->esg->get_config('logo');
		$data['site'] = $this->esg->get_config('site');
		$this->esg->set_esg('site', $data);

		$site = $this->esg->get_esg('site')['site'];
		$meta = $this->esg->get_esg('meta');
		if(!empty($site))
		{
			foreach ($site as $key => $value) 
			{
				if($key == 'image' && !empty($value))
				{
					$meta['icon'] = image_module('config/site',$value);
				}
				$meta[$key] = $value;
			}
			$this->esg->set_esg('meta', $meta);
		}
	}
	public function footer()
	{
		$data = array();
		$data['footer'] = $this->esg->get_config('footer');
		$this->esg->set_esg('footer', $data);
	}

	public function user()
	{
		$this->esg->set_esg('user', $this->session->userdata(base_url().'_logged_in'));
	}

	public function message()
	{
		$data = array();
		$data['list'] = $this->db->query('SELECT * FROM message WHERE status = 1 LIMIT 10')->result_array();
		$data['total'] = $this->db->query('SELECT id FROM message WHERE status = 1')->num_rows();
		$this->esg->set_esg('message', $data);
	}

	public function home()
	{
		$data = array();
		$table = $this->esg->get_config('dashboard');
		if(!empty($table['publish_row']))
		{
			$table_tmp = $table['publish_row'];
			foreach ($table_tmp as $key => $value) 
			{
				$data[$value]['total'] = $this->db->query('SELECT id FROM '.$value)->num_rows();
				$data[$value]['color'] = $table['color_row'][$value];
				$data[$value]['icon'] = $table['icon'][$value];
				$data[$value]['link'] = base_url($table['link'][$value]);
			}
		}
		$this->esg->set_esg('home', $data);

		
		// $this->esg->set_esg('dashboard', $tmp_data);
	}

}