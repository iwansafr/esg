<?php defined('BASEPATH') OR exit('No direct script access allowed');

$get_id = $this->input->get('id');
$cat_id = $this->input->get('cat_id');

$form = new zea();

$form->init('edit');
$form->setTable('content_cat');

$form->setId($get_id);
if(!empty($get_id))
{
  ?>
  <a href="<?php echo base_url('admin/content_cat_add_menu/'.$get_id) ?>"><button class="pull-right btn btn-sm btn-success"><span><i class="fa fa-plus-circle"></i></span> add to menu</button></a>
  <?php
}
if(!empty($cat_id))
{
  ?>
  <a href="<?php echo base_url('admin/content_cat_list/').'?id='.$cat_id ?>"><button class="pull-right btn btn-sm btn-default"><span><i class="fa fa-list"></i></span> Back To List</button></a>
  <hr>
  <?php
}
$form->setHeading('Category');

// $form->setField(array('id','par_id','title'));

$form->addInput('par_id','dropdown');
$form->setLabel('par_id', 'Parent');
if(!empty($cat_id))
{
  $cat = $this->db->query('SELECT * FROM content_cat WHERE id = ? LIMIT 1',$cat_id);
  $form->setOptions('par_id',array($cat['id']=>$cat['title']));
}else{
  $form->tableOptions('par_id', 'content_cat','id','title');
}

$form->addInput('title','text');

$slug_type = !empty($get_id) ? 'text' : 'hidden';

$form->addInput('slug', $slug_type);

$form->addInput('image', 'upload');
$form->setAccept('image', '.jpeg,.png,.jpg');

$form->addInput('icon','text');

$form->addInput('description', 'textarea');

$form->addInput('publish', 'checkbox');

$form->form();

$last_id = $form->get_insert_id();
if(!empty($last_id))
{
  if(!empty($_POST))
  {
    $post = array();

    if(empty($_POST['slug']))
    {
      $post['slug'] = slug($this->input->post('title', TRUE));
      $check_slug   = $this->db->query('SELECT slug FROM product WHERE slug = ? LIMIT 1', $post['slug']);

      if($check_slug == $post['slug'])
      {
        $array_slug   = explode('-', $check_slug);
        $array_slug[] = $last_id;
        $slug         = implode('-', $array_slug);
        $post['slug'] = slug($slug);
      }
    }
    $form->set_data('content_cat', $last_id, $post);
  }
}

if(!empty($get_id))
{
  if(!empty($_POST))
  {
    $post       = array();
    $uniqe_id   = '';
    $check_slug = $this->db->query('SELECT slug FROM content_cat WHERE id = ? AND slug = ? LIMIT 1', array($get_id,$this->input->post('slug')));
    if(empty($check_slug))
    {
      $check_slug = slug($this->input->post('title'));
      $check_slug = $this->db->query('SELECT slug FROM content_cat WHERE slug = ? LIMIT 1',$check_slug);
      if(empty($check_slug))
      {
        $check_slug = slug($this->input->post('title'));
      }else{
        $uniqe_id   = $get_id;
      }
    }

    $array_slug   = explode('-', $check_slug);
    $array_slug[] = $uniqe_id;
    $slug         = implode('-', $array_slug);
    $post['slug'] = slug($slug);
    $form->set_data('content_cat', $get_id, $post);
  }
}