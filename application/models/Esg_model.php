<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Esg_model extends CI_Model
{
	var $templates = array();
	var $esg_data  = array();

	public function __construct()
	{
		parent::__construct();
	}
	public function init()
	{
		if(!$this->db->field_exists('par_id','content'))
		{
			$this->load->dbforge();
			$fields = array(
        'par_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'default' => '0',
                'after' => 'cat_ids'
        ),
			);
			$this->dbforge->add_column('content',$fields);
		}
		if(!$this->db->field_exists('tpl','content'))
		{
			$this->load->dbforge();
			$fields = array(
        'tpl' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => '0',
                'after' => 'par_id'
        ),
			);
			$this->dbforge->add_column('content',$fields);
		}
		if(!$this->db->field_exists('videos','content'))
		{
			$this->load->dbforge();
			$fields = array(
        'videos' => array(
                'type' => 'TEXT',
                'after' => 'images'
        ),
			);
			$this->dbforge->add_column('content',$fields);
		}
		$this->navigation();
		// $this->set_meta();
		// $this->js();
		$this->templates = $this->esg->get_config('templates');
		$this->esg->set_esg('templates',$this->templates);
		$this->esg_data = $this->esg->get_esg();
	}
	public function js()
	{
		$this->esg->set_esg('extra_js',base_url('templates/AdminLTE/assets/dist/js/script.js'));
	}

	public function set_meta($data = array())
	{
		if(empty($data) || !is_array($data))
		{
			$data = array(
						'title' => 'esoftgreat',
						'keyword' => 'software development',
						'description' => 'software development and it consultant',
						'developer' => 'esoftgreat',
						'author' => 'esoftgreat',
						'email' => 'iwan@esoftgreat.com , iwansafr@gmail.com',
						'phone' => '6285640510460',
						'icon' => base_url('images/icon.png'),
					);
		}
		$this->esg->set_esg('meta', $data);
	}

	public function navigation()
	{
		$uri = array();
		$uri['string'] = $this->uri->uri_string();
		$uri['array'] = explode('/',$uri['string']);
		$this->esg->set_esg('navigation',$uri);
	}
	public function set_nav_title($title = '')
	{
		if(!empty($title))
		{
			$current_nav = $this->esg->get_esg('navigation');
			if(!empty($current_nav))
			{
				$title = slug($title);
				$last_index = count($current_nav['array'])-1;
				$current_nav['array'][$last_index] = $title;
				$string = implode('/',$current_nav['array']);
				$current_nav['string'] = $string;
				$this->esg->set_esg('navigation',$current_nav);
			}
		}
	}
}