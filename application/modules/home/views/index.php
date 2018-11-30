<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('templates'.DIRECTORY_SEPARATOR.$this->home_model->templates['public_template'].DIRECTORY_SEPARATOR.'index', $this->home_model->templates);