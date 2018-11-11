<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->esg->check_login();
$this->load->view('templates'.DIRECTORY_SEPARATOR.$this->esg_model->templates['admin_template'].DIRECTORY_SEPARATOR.'index', $this->esg_model->templates);