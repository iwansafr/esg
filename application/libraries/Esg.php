<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Esg extends CI_Model
{

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
		$this->config->set_item('esg', $output);
	}

	public function check_login()
	{
		if(empty($this->session->userdata(base_url().'_logged_in')))
		{
			$curent_url = base_url($_SERVER['PATH_INFO']);
			$curent_url = urlencode($curent_url);
			redirect(base_url('admin/login?redirect_to='.$curent_url));
		}
	}

	public function set_cookie($data = array(), $time = 0)
	{
		if(!empty($data))
		{
			if(empty($time))
			{
				$time = time()+60*60*24*30;
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

	public function login()
	{
		$data = $this->input->post();
		if(!empty($data))
		{
			$user = $this->db->query('SELECT * FROM user WHERE username = ? LIMIT 1',@$data['username'])->row_array();
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
					$role = $this->db->query('SELECT title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
					if(!empty($role))
					{
						$user['role'] = @$role['title'];
					}else{
						$user['role'] = 'user';
					}
					$this->session->set_userdata(base_url().'_logged_in', $user);
					redirect($url);
				}else{
					$this->set_esg('msg', array('status'=>'danger','msg'=>'wrong password'));
				}
			}else{
				$this->set_esg('msg', array('status'=>'danger','msg'=>'username is not valid'));
			}
		}else{
			if(!empty($_COOKIE))
			{
				$data = $_COOKIE;
				$user = $this->db->query('SELECT * FROM user WHERE username = ? LIMIT 1',@$data[base_url().'_username'])->row_array();
				if(!empty($user))
				{
					if(decrypt($data[base_url().'_password'], $user['password']))
					{
						$url = @$_GET['redirect_to'];
						if(!empty($url))
						{
							$url = urldecode($url);
						}else{
							$url = 'admin/index';
						}
						$role = $this->db->query('SELECT title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
						if(!empty($role))
						{
							$user['role'] = @$role;
						}else{
							$user['role'] = 'user';
						}
						$this->session->set_userdata(base_url().'_logged_in', $user);
						redirect($url);
					}
				}
			}
		}
		return false;
	}

	public function logout()
	{
		$this->delete_cookie();
		$this->session->sess_destroy();
    redirect(base_url('admin/index'));
	}

	public function get_esg($index = '')
	{
		$data   = $this->config->item('esg');
		$output = $data;
		if(!empty($index))
		{
			$output = @$data[$index];
		}
		return $output;
	}

	public function get_config($name = '')
  	{
		$data = array();
		if(!empty($name))
		{
			$value = $this->db->query('SELECT value FROM config WHERE name = ?', $name)->row_array();
			if(!empty($value))
			{
				$data = json_decode($value['value'], 1);
			}
		}
		return $data;
	}

	public function extra_css()
	{
		$data = $this->config->item('esg');
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
		$data = $this->config->item('esg');
		$data = $this->get_esg('extra_js');
		if(!empty($data))
		{
			if(is_array($data))
			{
				foreach ($data as $key => $value)
				{
					echo '<script src="'.$value.'"></script>'."\n";
				}
			}else{
				echo '<script src="'.$data.'"></script>'."\n";
			}
		}
	}
}