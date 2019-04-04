<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->esg->check_login();
$this->esg->check_cache();
$this->output->cache(60);
$this->load->view('templates'.DIRECTORY_SEPARATOR.$this->esg->get_esg('templates')['admin_template'].DIRECTORY_SEPARATOR.'index', $this->esg->get_esg('templates'));