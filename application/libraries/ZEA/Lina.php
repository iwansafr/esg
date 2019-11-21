<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lina
{
	private $CI;
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->config->item('esg');
		$this->CI->load->helper('html');
		$this->CI->load->helper('form');
		$this->CI->load->library('pagination');
		$this->CI->load->library('Zea');
		$this->CI->zea->setUrl();
	}

	var $data = [];

	public function setData($data = [])
	{
		$this->data = $data;
	}
	public function init($text = '')
	{
		$this->CI->zea->init($text);
	}


	public function setEdit($edit = false)
	{
		$this->CI->zea->setEdit($edit);
	}

	public function setDelete($delete = false)
	{
		$this->CI->zea->setDelete($delete);
	}

	public function addInput($field = '', $type = '')
	{
		$this->CI->zea->addInput($field,$type);
	}

	public function setId($id = 0)
	{
		$this->CI->zea->setId($id);
	}

	public function form()
	{
		if($this->CI->zea->init == 'roll')
		{
			
		}
	}

}