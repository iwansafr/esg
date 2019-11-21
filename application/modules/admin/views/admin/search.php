<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo '<h4>Content</h4>';
$this->load->view('content/list');
echo '<h4>Category</h4>';
$this->load->view('content/cat_list');
echo '<h4>Tag</h4>';
$this->load->view('content/tag');
echo '<h4>Menu</h4>';
$this->load->view('menu/list');
echo '<h4>Menu Position</h4>';
$this->load->view('menu/pos_list');