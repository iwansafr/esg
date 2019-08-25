<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function get_menu($id = 0)
	{
		$data = array();
		if(!empty($id))
		{
			$data = $this->db->query('SELECT * FROM admin_menu WHERE id = ? LIMIT 1', $id)->row_array();
		}
		return $data;
	}

	public function menu_parent()
	{
		$id    = $this->input->get('id');
		$p_id  = $this->input->get('p_id');
		$data  = array('0'=>'None');
		$q     = 'SELECT id,title FROM admin_menu';
		$bind  = array();
		$ext   = '';

		if(!empty($id) || !empty($p_id))
		{
			if(empty($p_id))
			{
				$q = 'SELECT id,title FROM admin_menu WHERE id != ?'.$ext;
				$id = array($id);
				$bind = array_merge($id,$bind);
			}
			if(empty($id) || (!empty($id) && !empty($p_id)))
			{
				$q = 'SELECT id,title FROM admin_menu WHERE id = ?'.$ext;
				$p_id = array($p_id);
				$bind = array_merge($p_id,$bind);
				$data = array();
			}
		}
		$tmp_data = $this->db->query($q, $bind)->result_array();
		if(!empty($tmp_data))
		{
			$tmp_data = assoc($tmp_data);
			if(!empty($data))
			{
				$data = array_merge($data, $tmp_data);
			}else{
				$data = $tmp_data;
			}
		}

		return $data;
	}

	public function get_parent()
	{
		$data = array('status'=>FALSE,'msg'=>'error');
		$id = @intval($_POST['id']);
		if(empty($id))
		{
			$tmp = $this->db->get('admin_menu')->result_array();
		}else{
			$tmp = $this->db->get_where('admin_menu','id != '.$id)->result_array();
		}

		if(!empty($tmp))
		{
			$tmp_data = array();
			foreach ($p_tmp as $key => $value)
			{
				foreach ($tmp as $tkey => $tvalue)
				{
					if($value['id'] == $tvalue['position_id'])
					{
						$tmp_data[$value['id']][] = $tvalue;
					}
				}
			}
			$data = array('status'=>TRUE,'msg'=>'success','data'=>$tmp_data);
		}

		$data = json_encode($data);
		return $data;
	}

	public function selected_parent()
	{
		$data = array('status'=>FALSE,'msg'=>'error');
		$id = @intval($_POST['id']);
		if(!empty($id))
		{
			$admin_menu = $this->db->get_where('admin_menu','id = '.$id)->row_array();
			$data = array('status'=>TRUE,'msg'=>'success','data'=>$admin_menu);
		}

		$data = json_encode($data);
		return $data;
	}

	public function del_menu($id = 0)
	{
		if(!empty($id))
		{
			$this->db->select('id');
			$data = $this->db->get_where('admin_menu','par_id = '.$id)->result_array();
			if(!empty($data))
			{
				$ids = array();
				foreach ($data as $key => $value) 
				{
					call_user_func(array('admin_menu_model', __FUNCTION__), $value['id']);
					$ids[] = $value['id'];
				}
				$this->zea->del_data('admin_menu', $ids);
			}	
		}
	}

}
