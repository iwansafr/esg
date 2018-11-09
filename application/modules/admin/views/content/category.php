<?php defined('BASEPATH') OR exit('No direct script access allowed');

$get_id = $this->input->get('id');
$form = new zea();

$form->init('edit');
$form->setTable('content_cat');

$form->setId($get_id);
$form->setHeading('Category');

$form->addInput('par_id','dropdown');
$form->setLabel('par_id', 'Parent');

$form->tableOptions('par_id', 'content_cat','id','title');

$form->addInput('title','text');

$slug_type = !empty($get_id) ? 'text' : 'hidden';

$form->addInput('slug', $slug_type);

$form->addInput('image', 'upload');
$form->setAccept('image', '.jpeg,.png,.jpg');

$form->addInput('icon','text');

$form->addInput('description', 'textarea');

$form->addInput('publish', 'checkbox');
?>
<div class="col-md-3">
  <?php
  if(!empty($get_id))
  {
    ?>
    <a href="<?php echo base_url('admin/menu/edit/?c_id='.$get_id.'&t='.urlencode(encrypt(time()))) ?>"><button class="pull-right btn btn-default"><span><i class="fa fa-plus-circle"></i></span> add to menu</button></a>
    <?php
  }
  $form->form();
  ?>
</div>
<?php

$last_id = $form->get_insert_id();
if(!empty($last_id))
{
  if(!empty($_POST))
  {
    $post = array();

    if(empty($_POST['slug']))
    {
      $post['slug'] = slug($this->input->post('title', TRUE));
      $check_slug   = $this->db->query('SELECT slug FROM content_cat WHERE slug = ? LIMIT 1', $post['slug'])->row_array();
      $check_slug   = @$check_slug['slug'];

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
    $check_slug = $this->db->query('SELECT slug FROM content_cat WHERE id = ? AND slug = ? LIMIT 1', array($get_id,$this->input->post('slug')))->row_array();
    $check_slug = $check_slug['slug'];
    if(empty($check_slug))
    {
      $check_slug = slug($this->input->post('title'));
      $check_slug = $this->db->query('SELECT slug FROM content_cat WHERE slug = ? LIMIT 1',$check_slug)->row_array();
      $check_slug = $check_slug['slug'];
      if(empty($check_slug))
      {
        $check_slug = slug($this->input->post('title'));
      }else{
        $uniqe_id   = $get_id;
      }
    }
    if(!empty($check_slug))
    {
      $array_slug   = explode('-', $check_slug);
      $array_slug[] = $uniqe_id;
      $slug         = implode('-', $array_slug);
      $post['slug'] = slug($slug);
      $form->set_data('content_cat', $get_id, $post);
    }
  }
}
$form = new zea();

$form->setTable('content_cat', 'id', 'DESC');
$form->init('roll');
$form->setHeading('<a href="'.base_url('admin/content/category').'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new category</button></a>');
$form->search();

$form->setField(array('title'));

// $form->addInput('par_id','plaintext');
$form->addInput('par_id','dropdown');
$form->setLabel('par_id','parent');
$form->tableOptions('par_id','content_cat','id','title');
$form->setAttribute('par_id','disabled');

$form->addInput('title','plaintext');

$form->addInput('id','link');
$form->setLink('id',base_url('admin/content/list'),'id');
// $form->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$form->setPlaintext('id','<i class="fa fa-search"></i>  content');
$form->setLabel('id','Content');

$form->addInput('image','thumbnail');
$form->setImage('image','content_cat');

$form->addInput('created','plaintext');

$form->setEditLink('category?id=');

$form->setDelete(true);
$form->setEdit(TRUE);

?>
<div class="col-md-9">
  <?php
  $form->form();
  ?>
</div>
<?php