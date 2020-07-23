<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Esg
{
	private $CI;
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->config->item('esg');
		$this->CI->load->database();
	}

	public function set_esg($index = '', $data = array())
	{
		$output = $this->get_esg();
		if(!empty($index))
		{
			if(!empty($data))
			{
				$output[$index] = $data;
			}
		}
		$this->CI->config->set_item('esg', $output);
	}

	public function add_js($data = array())
	{
		$cur_js = $this->get_esg('extra_js');
		$output = array();
		if(!empty($cur_js))
		{
			$output[] = $cur_js;
			$output[] = $data;
		}else{
			$output[] = $data;
		}
		$output = array_unique($output);
		$this->set_esg('extra_js', $output);
	}

	public function add_css($data = array())
	{
		$cur_js = $this->get_esg('extra_css');
		$output = array();
		if(!empty($cur_js))
		{
			$output[] = $cur_js;
			$output[] = $data;
		}else{
			$output[] = $data;
		}
		$output = array_unique($output);
		$this->set_esg('extra_css', $output);
	}

	public function add_script($data = array())
	{
		if(!empty($data))
		{
			$cur_script = $this->get_esg('script');
			$output = array();
			if(!empty($cur_script))
			{
				$output = $cur_script;
				$output[] = $data;
			}else{
				$output[] = $data;
			}
			if(is_array($output))
			{
				$output = array_unique($output);
			}
			$this->set_esg('script', $output);
		}
	}

	function set_tag($table = 'content_tag')
	{
    $post['tag_ids'] = $_POST['tag_ids'];
    $post['tag_ids'] = explode(',', $post['tag_ids']);
    $tag_ids = array();
    foreach ($post['tag_ids'] as $key => $value)
    {
    	$value = url_title($value);
      $tag_exist = $this->CI->db->query('SELECT title FROM '.$table.' WHERE title = ? LIMIT 1',$value)->row_array();
      $tag_exist = $tag_exist['title'];
      if(empty($tag_exist))
      {
        $this->CI->db->insert($table, array('title'=>$value));
      }
      $tag_id = $this->CI->db->query('SELECT id FROM '.$table.' WHERE title = ? LIMIT 1',$value)->row_array();
      $tag_id = $tag_id['id'];
      if(!empty($tag_id))
      {
      	$total = $this->CI->db->query("SELECT count(id) AS total FROM content WHERE tag_ids LIKE '%,{$tag_id},%'")->row_array();
      	if(!empty($total))
      	{
      		$total = $total['total'];
      	}else{
      		$total = 1;
      	}
      	$this->CI->db->update($table, array('total'=>$total), 'id = '.$tag_id);
        $tag_ids[] = $tag_id;
      }
    }
    $tag_ids = array_unique($tag_ids);
    $post['tag_ids'] = ','.implode($tag_ids,',').',';
    return $post['tag_ids'];
  }

	public function check_login()
	{
		$base_url = str_replace('.', '_', base_url());
		$cookie_username = @$_COOKIE[base_url().'_username'];
		if(empty($cookie_username))
		{
			$cookie_username = @$_COOKIE[$base_url.'_username'];
		}

		if(empty($this->CI->session->userdata(base_url().'_logged_in')) && empty($cookie_username))
		{
			$curent_url = !empty($_SERVER['PATH_INFO']) ? base_url($_SERVER['PATH_INFO']) : '';
			$curent_url = urlencode($curent_url);
			redirect(base_url('admin/login?redirect_to='.$curent_url));
		}else{
			if(!empty($_COOKIE[base_url().'_username']) || !empty($base_url.'_username'))
			{
				$data['username'] = @$_COOKIE[base_url().'_username'];
				$data['password'] = @$_COOKIE[base_url().'_password'];
				$data['remember_me'] = @$_COOKIE[base_url().'_remember_me'];
				if(empty($data['username']))
				{
					$data['username'] = @$_COOKIE[$base_url.'_username'];
					$data['password'] = @$_COOKIE[$base_url.'_password'];
					$data['remember_me'] = @$_COOKIE[$base_url.'_remember_me'];
				}
				$this->set_cookie($data);
				$user = $this->CI->db->query('SELECT * FROM user WHERE username = ? LIMIT 1',@$data['username'])->row_array();
				if(!empty($user))
				{
					if(decrypt($data['password'], $user['password']))
					{
						$url = @$_GET['redirect_to'];
						if(!empty($url))
						{
							$url = urldecode($url);
						}else{
							$url = 'admin/index';
						}
						$role = $this->CI->db->query('SELECT level,title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
						if(!empty($role))
						{
							$user['role'] = @$role['title'];
							$user['level'] = @$role['level'];
						}else{
							$user['role'] = 'user';
						}
						$this->CI->session->set_userdata(base_url().'_logged_in', $user);
						$this->save_ip($user['id']);
					}
				}
			}
		}
	}

	public function set_cookie($data = array(), $time = 0)
	{
		if(!empty($data))
		{
			if(empty($time))
			{
				$time = time()+600*600*240*300;
			}
			if(is_array($data))
			{
				foreach ($data as $key => $value)
				{
					set_cookie(base_url().'_'.$key, $value, $time);
				}
			}
		}
	}

	public function delete_cookie()
	{
		if(!empty($_COOKIE))
		{
			foreach ($_COOKIE as $key => $value)
			{
				delete_cookie($key);
			}
		}
	}

	public function save_ip($user_id = 0, $status = 1)
	{
		$user_login = array(
      'user_id' => $user_id,
      'ip'      => ip(),
      'browser' => @$_SERVER['HTTP_USER_AGENT'],
      'status'  => $status
    );
    $this->CI->db->insert('user_login', $user_login);
    if($status == 0)
    {
    	$last_id = $this->CI->db->insert_id();
    	$this->CI->db->insert('user_login_failed', ['user_login_id'=>$last_id,'username'=>@$_POST['username'],'password'=>@$_POST['password']]);
    }
	}

	public function login()
	{
		$data = $this->CI->input->post();
		$failed_login = @intval($this->CI->session->userdata(base_url().'_failed_login'));
		if($failed_login > 4)
		{
			$this->set_esg('msg', array('status'=>'danger','msg'=>'Mohon Maaf Anda sudah 5x gagal login, silahkan tunggu 30 menit untuk mencoba lagi, atau gunakan browser lainnya, atau <a class="btn btn-sm btn-primary" href="'.base_url('admin/user/notrobot').'">Buktikan Anda Bukan Robot</a>'));
		}else{
			if(!empty($data))
			{
				$user = $this->CI->db->query('SELECT * FROM user WHERE username = ? LIMIT 1',@$data['username'])->row_array();
				if(!empty($user))
				{
					if(decrypt($data['password'], $user['password']))
					{
						$url = @$_GET['redirect_to'];
						if(!empty($url))
						{
							$url = urldecode($url);
						}else{
							$url = 'admin/index';
						}
						if(!empty($data['remember_me']))
						{
							$this->set_cookie($data);
						}
						$role = $this->CI->db->query('SELECT level,title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
						if(!empty($role))
						{
							$user['role'] = @$role['title'];
							$user['level'] = @$role['level'];
						}else{
							$user['role'] = 'user';
						}
						$this->CI->session->set_userdata(base_url().'_logged_in', $user);
						$this->save_ip($user['id']);
						redirect($url);
					}else{
						$this->set_esg('msg', array('status'=>'danger','msg'=>'Password Salah'));
						$failed_login++;
						$this->save_ip(0,0);
						$this->CI->session->set_userdata(base_url().'_failed_login', $failed_login);
					}
				}else{
					$this->set_esg('msg', array('status'=>'danger','msg'=>'Username tidak dikenali'));
					$failed_login++;
					$this->save_ip(0,0);
					$this->CI->session->set_userdata(base_url().'_failed_login', $failed_login);
				}
			}else{
				if(!empty($_COOKIE))
				{
					$data = $_COOKIE;
					$base_url = str_replace('.', '_', base_url());
					$cookie_username = @$_COOKIE[base_url().'_username'];
					if(empty($cookie_username))
					{
						$cookie_username = @$_COOKIE[$base_url.'_username'];
					}
					$cookie_password = @$_COOKIE[base_url().'_password'];
					if(empty($cookie_password))
					{
						$cookie_password = @$_COOKIE[$base_url.'_password'];
					}
					$user = $this->CI->db->query('SELECT * FROM user WHERE username = ? LIMIT 1',$cookie_username)->row_array();
					if(!empty($user))
					{
						if(empty($_COOKIE[base_url().'_role']) || empty($_COOKIE[$base_url.'_role']))
						{
							$decrypt = decrypt($cookie_password, $user['password']);
						}else{
							$decrypt = $cookie_password == $user['password'];
						}
						if($decrypt)
						{
							$url = @$_GET['redirect_to'];
							if(!empty($url))
							{
								$url = urldecode($url);
							}else{
								$url = 'admin/index';
							}
							$role = $this->CI->db->query('SELECT level,title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
							if(!empty($role))
							{
								$user['role'] = @$role['title'];
								$user['level'] = @$role['level'];
							}else{
								$user['role'] = 'user';
							}
							$this->CI->session->set_userdata(base_url().'_logged_in', $user);
							$this->set_cookie($user);
							$this->save_ip($user['id']);
							redirect($url);
						}
					}
				}
			}
		}
		return false;
	}

	public function logout()
	{
		$this->delete_cookie();
		$this->CI->session->sess_destroy();
    redirect(base_url('admin/index'));
	}

	public function get_esg($index = '')
	{
		$data   = $this->CI->config->item('esg');
		$output = $data;
		if(!empty($index))
		{
			$output = @$data[$index];
		}
		return $output;
	}

	public function check_cache()
	{
		if(!is_dir(FCPATH.'images/cache'))
		{
			mkdir(FCPATH.'images/cache',0775);
		}
	}

	public function get_config($name = '')
  {
		$data = array();
		if(!empty($name))
		{
			// $value = $this->CI->db->query('SELECT value FROM config WHERE name = ?', $name)->row_array();
			$value = $this->CI->db->get_where('config', ['name'=>$name])->row_array();
			if(!empty($value))
			{
				$data = json_decode($value['value'], 1);
			}
		}
		return $data;
	}

	public function extra_css()
	{
		$data = $this->CI->config->item('esg');
		$data = @$data['extra_css'];
		if(!empty($data))
		{
			if(is_array($data))
			{
				foreach ($data as $key => $value)
				{
					echo '<link rel="stylesheet" href="'.$value.'">'."\n";
				}
			}else{
				echo '<link rel="stylesheet" href="'.$value.'">'."\n";
			}
		}
	}
	public function extra_js()
	{
		// $data = $this->CI->config->item('esg');
		$data = $this->get_esg('extra_js');
		if(!empty($data))
		{
			$data = $data[0];
			if(is_array($data))
			{
				foreach ($data as $key => $value)
				{
					echo '<script src="'.$value.'"></script>'."\n";
				}
			}else{
				echo '<script src="'.@$data.'"></script>'."\n";
			}
		}
	}
	public function script()
	{
		// $data = $this->CI->config->item('esg');
		$data = $this->get_esg('script');
		if(!empty($data))
		{
			if(is_array($data))
			{
				foreach ($data as $key => $value)
				{
					echo '<script type="text/javascript">'."\n".''.$value."\n".'</script>'."\n";
				}
			}else{
				echo '<script type="text/javascript">'."\n".''.$data."\n".'</script>'."\n";
			}
		}
	}
}