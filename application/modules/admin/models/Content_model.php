<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->model('config_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
	}

	public function load()
	{
		$q = $this->db->field_exists('source','content');
		if(!$q){
			$this->db->query('ALTER TABLE `content` ADD `source` TEXT NOT NULL AFTER `content`');
		}
	}

	public function category_slug()
	{
		$last_id = $this->zea->get_insert_id();
		if(!empty($last_id))
		{
		  if(!empty($_POST))
		  {
		    $post = array();

		    if(empty($_POST['slug']))
		    {
		      $post['slug'] = slug($this->input->post('title', TRUE));
		      $check_slug   = $this->db->query('SELECT slug FROM content_cat WHERE slug = ? LIMIT 1', $post['slug'])->row_array();
		      $check_slug   = @$check_slug['slug'];

		      if($check_slug == $post['slug'])
		      {
		        $array_slug   = explode('-', $check_slug);
		        $array_slug[] = $last_id;
		        $slug         = implode('-', $array_slug);
		        $post['slug'] = slug($slug);
		      }
		    }
		    $this->zea->set_data('content_cat', $last_id, $post);
		  }
		}

		if(!empty($get_id))
		{
		  if(!empty($_POST))
		  {
		    $post       = array();
		    $uniqe_id   = '';
		    $check_slug = $this->db->query('SELECT slug FROM content_cat WHERE id = ? AND slug = ? LIMIT 1', array($get_id,$this->input->post('slug')))->row_array();
		    $check_slug = $check_slug['slug'];
		    if(empty($check_slug))
		    {
		      $check_slug = slug($this->input->post('title'));
		      $check_slug = $this->db->query('SELECT slug FROM content_cat WHERE slug = ? LIMIT 1',$check_slug)->row_array();
		      $check_slug = $check_slug['slug'];
		      if(empty($check_slug))
		      {
		        $check_slug = slug($this->input->post('title'));
		      }else{
		        $uniqe_id   = $get_id;
		      }
		    }
		    if(!empty($check_slug))
		    {
		      $array_slug   = explode('-', $check_slug);
		      $array_slug[] = $uniqe_id;
		      $slug         = implode('-', $array_slug);
		      $post['slug'] = slug($slug);
		      $this->zea->set_data('content_cat', $get_id, $post);
		    }
		  }
		}
	}

	public function content_tag()
	{
		$id = $this->input->get('id');
		$tag_name = '';
		if(!empty($id))
		{
			if(empty($_POST['tag_ids']))
		  {
		    $tag_data = $this->db->query('SELECT tag_ids FROM content WHERE id = ? LIMIT 1', $id)->row_array();
		    $tag_data = $tag_data['tag_ids'];
		    $tag_data = explode(',',$tag_data);
		    $tag_name = array();
		    foreach ($tag_data as $key => $value)
		    {
		      $tmp = array();
		      $tmp = $this->db->query('SELECT title FROM content_tag WHERE id = ? LIMIT 1', @intval($value))->row_array();
		      $tag_name[] = @$tmp['title'];
		    }
		    $tag_name = implode(',',$tag_name);
		  }else{
		    $tag_name = $_POST['tag_ids'];
		  }
		}
		return $tag_name;
	}

	public function content_save()
	{
		$last_id = $this->zea->get_insert_id();
		$id = $this->input->get('id');
		if(!empty($last_id) || !empty($id))
		{
		  $last_id = !empty($id) ? $id : $last_id;
		  if(!empty($_POST))
		  {
		    $post = array();
		    if(empty($_POST['keyword']))
		    {
		      $post['keyword'] = strip_tags($_POST['title']);
		    }
		    if(empty($_POST['description']))
		    {
		      $post['description'] = strip_tags($_POST['content']);
		    }
		    if(empty($_POST['intro']))
		    {
		      $post['intro'] = substr(strip_tags($_POST['content']), 0,200);
		    }
		    if(!empty($_POST['tag_ids']))
		    {
		      $post['tag_ids'] = $this->esg->set_tag();
		    }
		    if(empty($_POST['slug']))
		    {
		      $post['slug'] = slug($this->input->post('title', TRUE));
		      $check_slug   = $this->db->query('SELECT slug FROM content WHERE slug = ? LIMIT 1',@$post['slug'])->row_array();
		      $check_slug = !empty($check_slug['slug']) ? $check_slug : '';
		      if($check_slug == $post['slug'])
		      {
		        $array_slug   = explode('-', $check_slug);
		        $array_slug[] = $last_id;
		        $slug         = implode('-', $array_slug);
		        $post['slug'] = slug($slug);
		      }
		    }
		    if(!empty($post))
		    {
		      $this->zea->set_data('content', $last_id, $post);
		      $subscriber_config = $this->esg->get_config('subscriber');
		      if(!empty($subscriber_config['broadcast']))
		      {
		      	$this->config_model->subscriber_feed('new article from '.base_url().' <a href="'.base_url($post['slug'].'.html').'">'.$_POST['title'].'</a>');
		      }
		    }
		  }
		}
		if(!empty($id))
		{
		  if(!empty($_POST))
		  {
		    $post       = array();
		    if(!empty($_POST['tag_ids']))
		    {
		      $post['tag_ids'] = $this->esg->set_tag();
		    }
		    $uniqe_id   = '';
		    $check_slug = $this->db->query('SELECT slug FROM content WHERE id = ? AND slug = ? LIMIT 1', array($id,$this->input->post('slug')))->row_array();
		    $check_slug = $check_slug['slug'];
		    if(empty($check_slug))
		    {
		      $check_slug = slug($this->input->post('title'));
		      $check_slug = $this->db->query('SELECT slug FROM content WHERE slug = ? LIMIT 1',$check_slug)->row_array();
		      $check_slug = $check_slug['slug'];
		      if(empty($check_slug))
		      {
		        $check_slug = slug($this->input->post('title'));
		      }else{
		        $uniqe_id   = $id;
		      }
		    }

		    $array_slug   = explode('-', $check_slug);
		    $array_slug[] = $uniqe_id;
		    $slug         = implode('-', $array_slug);
		    $post['slug'] = slug($slug);
		    if(!empty($post))
		    {
		      $this->zea->set_data('content', $id, $post);
		    }
		  }
		}
	}

}