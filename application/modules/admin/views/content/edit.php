<?php defined('BASEPATH') OR exit('No direct script access allowed');

// $this->session->__set('link_js', base_url().'templates/admin/js/bootstrap-tagsinput.js');

$form = new zea();

$id = $this->input->get('id');

if(!empty($id))
{
  ?>
  <a href="<?php echo base_url('admin/content_add_menu/'.$id) ?>"><button class="pull-right btn btn-sm btn-success"><span><i class="fa fa-plus-circle"></i></span> add to menu</button></a>
  <?php
}
$form->init('edit');
$form->setTable('content');

$form->setId($id);

$form->setHeading('Content');

$form->addInput('cat_ids','multiselect');
$form->setLabel('cat_ids', 'Category');
$form->setMultiSelect('cat_ids','content_cat','id,par_id,title');


$form->addInput('title', 'text');

$form->addInput('author','hidden');
$form->setValue('author',$this->session->userdata[base_url().'_logged_in']['username']);

$form->addInput('image','upload');
$form->setAccept('image', '.jpeg,.png');

$form->addInput('image_link','text');
$form->startCollapse('image_link', 'add image link');
$form->endCollapse('image_link');

$form->addInput('images','gallery');
$form->setAccept('images', '.jpeg,.png');
$form->setAttribute('images','multiple');
$form->startCollapse('images', 'Gallery');
$form->endCollapse('images');

$form->addInput('icon','text');

$form->addInput('keyword','textarea');
$form->setLabel('keyword','Meta Keyword');

$slug_type = !empty($id) ? 'text' : 'hidden';

$form->addInput('slug', $slug_type);

$form->addInput('description','textarea');
$form->setLabel('description','Meta Description');
$form->startCollapse('keyword', 'meta');
$form->endCollapse('description');

$form->addInput('intro','textarea');

$form->addInput('content','textarea');
$form->setElementId('content','textckeditor');
$form->setRequired(array('title','content','cat_ids'));


$form->addInput('tag_ids', 'text');
$form->setLabel('tag_ids', 'Tag : ');
$form->setAttribute('tag_ids', array('data-role'=>'tagsinput','placeholder'=>'separate with coma'));
$form->startCollapse('tag_ids', 'Tag');
$form->endCollapse('tag_ids');
if(!empty($id))
{
  if(empty($_POST['tag_ids']))
  {
    // $tag_data = $this->data_model->get_one('content','tag_ids', ' WHERE id = '.$id);
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
    $tag_name = implode($tag_name, ',');
  }else{
    $tag_name = $_POST['tag_ids'];
  }
  $form->setValue('tag_ids', $tag_name);
}

$form->addInput('publish','checkbox');

$form->form();


$last_id = $form->get_insert_id();

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
      $check_slug = $check_slug['slug'];
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
      $form->set_data('content', $last_id, $post);
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
      $form->set_data('content', $id, $post);
    }
  }
}
