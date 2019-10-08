<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->model('esg_model');
		// $this->esg_model->set_meta();
		$this->init();
	}
	public function init()
	{
		$this->esg_model->navigation();
		// $this->esg_model->set_meta();
		$this->logo();
		$this->site();
		$this->meta();
		$this->template();
		$this->mod();
		// $this->home();
		// $this->js();
		$this->get_visitor();
		$this->account_bank();
	}

	public function mod()
	{
		$mod['name'] = $this->router->fetch_class();
		$mod['task'] = $this->router->fetch_method();
		$mod['content'] = $mod['name'].'/'.@$mod['task'];
		$this->esg->set_esg('mod', $mod);
	}

	public function template()
	{
		$data = $this->esg->get_config('templates');
		if(!empty($data))
		{
			$this->esg->set_esg('templates', $data);
			$cur_path = FCPATH;
			$cur_path = explode('/', $cur_path);
			array_pop($cur_path);
			array_pop($cur_path);
			$cur_path = implode('/', $cur_path).'/';
			if(is_dir(FCPATH.'templates/'.$data['public_template']))
			{
				$link_template = base_url().'templates/'.$data['public_template'];	
			}else{
				@unlink(FCPATH.'templates/'.$data['public_template']);
				if(symlink($cur_path.'esg_templates/'.$data['public_template'], FCPATH.'templates/'.$data['public_template']))
				{
					$link_template = base_url().'templates/'.$data['public_template'];	
				}else{
					$link_template = 'https://templates.esoftgreat.com/'.$data['public_template'];
				}
			}
		 	// if(@$_SERVER['SERVER_NAME'] == 'localhost')
		  // {
		  //   $link_template = base_url().'templates/'.$data['public_template'];
		  // }else{
		  //   $link_template = 'https://templates.esoftgreat.com/'.$data['public_template'];
		  // }
			$this->esg->set_esg('link_template', $link_template);
		}
	}

	public function js()
	{
		$this->esg->set_esg('extra_js',base_url('templates/'.$this->templates['public_template'].'/assets/dist/js/script.js'));
	}

	public function meta()
	{
		$data = $this->esg->get_config('site');
		$c_data = $this->esg->get_esg('meta');
		if(!empty($data))
		{
			foreach ($data as $key => $value)
			{
				$c_data[$key] = $data[$key];
			}
			if(!empty($data['image']))
			{
				$c_data['icon'] = $data['image'];
			}
			$this->esg->set_esg('meta', $c_data);
		}

		$data = $this->esg->get_config('contact');
		if(!empty($data))
		{
			$c_data['contact'] = $data;
			$this->esg->set_esg('meta', $c_data);
		}
	}

	public function home()
	{
		$widget = $this->esg->get_config($this->esg->get_esg('templates')['public_template'].'_widget');
		$this->esg->set_esg('block', $widget);
		$this->block();
	}

	public function block()
	{
		$block = $this->esg->get_esg('block');
		if(!empty($block))
		{
			foreach ($block as $key => $value)
			{
				if(is_array($value))
				{
					if(preg_match('~menu_~', $key))
					{
						$this->menu($key, $value);
					}else if(preg_match('~content~', $key))
					{
						$this->content($key, $value);
					}else if($key == 'twitter_widget'){
						$this->twitter($key,$value);
					}else{
						$this->custom($key, $value);
					}
				}
			}
		}
	}

	public function menu($key = '', $data = array())
	{
		if(!empty($data['content']))
		{
			$this->db->cache_off();
			$tmp_data = $this->db->query('SELECT * FROM menu WHERE position_id = ? AND publish = 1 ORDER BY sort_order', @intval($data['content']))->result_array();
			$position_name = $this->db->query('SELECT title FROM menu_position WHERE id = ?', @intval($data['content']))->row_array();
			$position_name = @$position_name['title'];
			if(!empty($tmp_data))
			{
				$output = array();
				$data = array();
				$b_data = array();
				foreach ($tmp_data as $tmkey => $tmvalue)
				{
					$b_data[$tmvalue['id']] = $tmvalue;
					$b_data[$tmvalue['id']]['position_name'] = $position_name;
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
							$data[$tvalue['par_id']]['child'][$tvalue['id']]  = $tvalue;
						}else if(!empty($b_data[$tvalue['par_id']]))
						{
							$id = $b_data[$tvalue['par_id']]['par_id'];
							$par_id = $b_data[$tvalue['id']]['par_id'];
							if(!empty($data[$id]))
							{
								$data[$id]['child'][$par_id]['child'][$tvalue['id']]  = $tvalue;
							}else{
								if(!empty(@intval($data[$b_data[$id]['par_id']])))
								{
									$data[$b_data[$id]['par_id']]['child'][$id]['child'][$par_id]['child'][$tvalue['id']] = $tvalue;
								}
							}
						}
					}
				}
				$output[$key] = $data;
				$home = $this->esg->get_esg('home');
				if(!empty($home))
				{
					$home = array_merge($home, $output);
				}else{
					$home = $output;
				}
				$this->esg->set_esg('home', $home);
			}
		}
	}

	public function content($key = '', $data = array())
	{
		if(!empty($data['content']))
		{
			$id = $data['content'];
			$limit = 'LIMIT '.@intval($data['limit']);
			$q = "SELECT * FROM content WHERE cat_ids LIKE '%,{$id},%' AND publish = 1 ORDER BY id DESC {$limit}";
			if(!is_numeric($id))
			{
				if($id == 'latest')
				{
					$q = 'SELECT * FROM content WHERE publish = 1 ORDER BY id DESC '.$limit;
				}else if($id == 'popular')
				{
					$q = 'SELECT * FROM content WHERE publish = 1 ORDER BY hits DESC '.$limit;
				}
			}
			$this->db->cache_off();
			$tmp_data = $this->db->query($q)->result_array();
			if(!empty($tmp_data))
			{
				if(is_numeric($id))
				{
					$category = $this->db->query('SELECT * FROM content_cat WHERE id = '.$id)->row_array();
				}else{
					if($id == 'latest')
					{
						$category = array('title'=>'Latest Content');
					}else if($id == 'popular')
					{
						$category = array('title'=>'Most Popular');
					}
				}
				$output = array();
				$tmp_data[0]['category'] = $category;
				$output[$key] = $tmp_data;
				$home = $this->esg->get_esg('home');
				if(!empty($home))
				{
					$home = array_merge($home, $output);
				}else{
					$home = $output;
				}
				$this->esg->set_esg('home', $home);
			}
		}
	}

	public function custom($key = '', $data = array())
	{
		if(!empty($data['content']))
		{
			$id          = $data['content'];
			$limit       = 'LIMIT '.@intval($data['limit']);
			$table       = array('content_cat','content_tag','content','content');
			$table       = array_start_one($table);
			$table       = $table[$id];
			$table_field = array('content_cat' => 'category','content_tag'=>'tag','content'=>'article','content'=>'article');
			$table_field = $table_field[$table];

			$this->db->cache_off();
			$tmp_data = $this->db->query('SELECT * FROM '.$table.' ORDER BY id DESC '.$limit)->result_array();
			if(!empty($tmp_data))
			{
				$output = array();
				$output[$key]['data'] = $tmp_data;
				$output[$key]['table'] = $table;
				$output[$key]['table_title'] = $table_field;
				$home = $this->esg->get_esg('home');
				if(!empty($home))
				{
					$home = array_merge($home, $output);
				}else{
					$home = $output;
				}
				$this->esg->set_esg('home', $home);
			}
		}
	}

	public function twitter($key = '',$data=array())
	{
		$home = $this->esg->get_esg('home');
		$output = array();
		$output[$key] = $data;
		if(!empty($home))
		{
			$home = array_merge($home, $output);
		}else{
			$home = $output;
		}
		$this->esg->set_esg('home', $home);
	}

	public function logo()
	{
		$data = $this->esg->get_config('logo');
		if(!empty($data))
		{
			$data['tag_image'] = '<img src="'.image_module('config','logo/'.$data['image']).'" width="'.@$data['width'].'" height="'.@$data['height'].'" class="img img-responsive">';
			$this->esg->set_esg('logo', $data);
		}
	}

	public function site()
	{
		$data = $this->esg->get_config('site');
		if(!empty($data))
		{
			$this->esg->set_esg('site', $data);
		}
	}

	public function account_bank()
	{
		$data = $this->db->get('bank_account')->result_array();
		if(!empty($data))
		{
			$this->esg->set_esg('account_bank', $data);
		}	
	}

	public function archived()
	{
		// $start_y = $this->db->query('SELECT created FROM content ORDER BY created ASC LIMIT 1')->row_array();
		// if(!empty($start_y))
		// {
		// 	$start_y = substr($start_y['created'],0,4);
		// }
		// $end_y = $this->db->query('SELECT created FROM content ORDER BY created DESC LIMIT 1')->row_array();
		// if(!empty($end_y))
		// {
		// 	$end_y = substr($end_y['created'],0,4);
		// }
		// pr($start_y);
		// pr($end_y);
	}

	public function get_visitor()
	{
		$ip = ip();
		$detail = ip_detail($ip);
		$visitor = array(
			'browser' => @$_SERVER['HTTP_USER_AGENT'],
			'visited' => base_url($this->esg->get_esg('navigation')['string']),
			'ip'      => $ip,
			'city'    => ''.@$detail['city'].'',
			'region'  => ''.@$detail['region'].'',
			'country' => ''.@$detail['country'].''
		);
		$this->db->cache_off();
		$this->db->insert('visitor', $visitor);
	}
}