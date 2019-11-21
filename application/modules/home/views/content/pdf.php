<?php defined('BASEPATH') OR exit('No direct script access allowed');
// header("Content-Type: application/pdf");
// header('Content-Disposition:inline; filename="testing.pdf"');
pr($this->esg->get_esg());
$this->load->view('detail');