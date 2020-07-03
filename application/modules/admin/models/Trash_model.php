<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trash_model extends CI_Model
{

	public function restore($id = 0)
	{
		if(!empty($id))
		{
			$id = @intval($id);
			$data = $this->db->get_where('trash', ['id'=>$id])->row_array();
			if(!empty($data))
			{
				$content = json_decode($data['table_content'],1);
				$this->db->trans_start();
				$this->db->insert($data['table_title'],$content);
        $this->db->delete('trash',['id'=>$id]);
				$this->db->trans_complete();
				if ($this->db->trans_status() === TRUE)
				{
					$dir = FCPATH.'images/modules/'.$data['table_title'].'/'.$data['table_id'].'/';
	        $trash_dir = FCPATH.'images/modules/trash/'.$data['table_title'].'/'.$data['table_id'].'/';
	        if(!is_dir($trash_dir))
	        {
	        	$dir = FCPATH.'images/modules/'.$data['table_title'].'/'.$content['name'].'/';
	        	$trash_dir = FCPATH.'images/modules/trash/'.$data['table_title'].'/'.$content['name'].'/';
	        	if(!is_dir($dir))
		        {
		        	mkdir($dir,0777,1);
		        }
	        }else{
		        if(!is_dir($dir))
		        {
		        	mkdir($dir,0777,1);
		        }
	        }
	        foreach(glob($trash_dir.'*') as $file)
					{
						$name_file = explode('/', $file);
						$name_file = end($name_file);
						@copy($file,$dir.'/'.$name_file);
					}
	        recursive_rmdir($trash_dir);
	        return ['status'=>true,'data'=>$data];
				}else{
					return ['status'=>false,'data'=>[]];
				}
			}
		}
	}

	public function detail($id = 0)
	{
		$id = @intval($id);
		if(!empty($id))
		{
			$data = $this->db->get_where('trash',['id'=>$id])->row_array();
			if(!empty($data))
			{
				$data['table_content'] = json_decode($data['table_content'],1);
				return ['status'=>true,'data'=>$data];
			}
		}
		return ['status'=>false,'data'=>[]];
	}
}