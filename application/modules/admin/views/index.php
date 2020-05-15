<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->esg->check_login();
// pr($_COOKIE);
// pr($this->esg->get_esg());die();
$this->load->view('templates'.DIRECTORY_SEPARATOR.$this->esg->get_esg('templates')['admin_template'].DIRECTORY_SEPARATOR.'index', $this->esg->get_esg());