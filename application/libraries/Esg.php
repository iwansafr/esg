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

	function set_tag($table = 'content_tag')
	{
    $post['tag_ids'] = $_POST['tag_ids'];
    $post['tag_ids'] = explode(',', $post['tag_ids']);
    $tag_ids = array();
    foreach ($post['tag_ids'] as $key => $value)
    {
      $tag_exist = $this->db->query('SELECT title FROM '.$table.' WHERE title = ? LIMIT 1',$value)->row_array();
      $tag_exist = $tag_exist['title'];
      if(empty($tag_exist))
      {
        $this->db->insert($table, array('title'=>$value));
      }
      $tag_id = $this->db->query('SELECT id FROM '.$table.' WHERE title = ? LIMIT 1',$value)->row_array();
      $tag_id = $tag_id['id'];
      if(!empty($tag_id))
      {
      	$total = $this->db->query("SELECT count(id) AS total FROM content WHERE tag_ids LIKE '%,{$tag_id},%'")->row_array();
      	if(!empty($total))
      	{
      		$total = $total['total'];
      	}else{
      		$total = 1;
      	}
      	$this->db->update($table, array('total'=>$total), 'id = '.$tag_id);
        $tag_ids[] = $tag_id;
      }
    }
    $post['tag_ids'] = ','.implode($tag_ids,',').',';
    return $post['tag_ids'];
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

	public function save_ip($user_id = 0, $status = 1)
	{
		$user_login = array(
      'user_id' => $user_id,
      'ip'      => ip(),
      'browser' => @$_SERVER['HTTP_USER_AGENT'],
      'status'  => $status
    );
    $this->db->insert('user_login', $user_login);
	}

	public function login()
	{
		$data = $this->input->post();
		$failed_login = @intval($this->session->userdata(base_url().'_failed_login'));
		if($failed_login > 4)
		{
			$this->set_esg('msg', array('status'=>'danger','msg'=>'you have failed login 5 time, wait for 30 minute forward and try again'));
		}else{
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
						$role = $this->db->query('SELECT level,title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
						if(!empty($role))
						{
							$user['role'] = @$role['title'];
							$user['level'] = @$role['level'];
						}else{
							$user['role'] = 'user';
						}
						$this->session->set_userdata(base_url().'_logged_in', $user);
						$this->save_ip($user['id']);
						redirect($url);
					}else{
						$this->set_esg('msg', array('status'=>'danger','msg'=>'wrong password'));
						$failed_login++;
						$this->save_ip(0);
						$this->session->set_userdata(base_url().'_failed_login', $failed_login);
					}
				}else{
					$this->set_esg('msg', array('status'=>'danger','msg'=>'username is not valid'));
					$failed_login++;
					$this->save_ip(0);
					$this->session->set_userdata(base_url().'_failed_login', $failed_login);
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
							$role = $this->db->query('SELECT level,title FROM user_role WHERE id = ? LIMIT 1', @$user['user_role_id'])->row_array();
							if(!empty($role))
							{
								$user['role'] = @$role['title'];
								$user['level'] = @$role['level'];
							}else{
								$user['role'] = 'user';
							}
							$this->session->set_userdata(base_url().'_logged_in', $user);
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