<?php defined('BASEPATH') OR exit('No direct script access allowed');

$get_id = $this->input->get('id');
// $form = new zea();

$this->zea->init('edit');
$this->zea->setTable('content_cat');

$this->zea->setId($get_id);
$this->zea->setHeading('Category');

$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id', 'Parent');

$this->zea->tableOptions('par_id', 'content_cat','id','title');

$this->zea->addInput('title','text');

$slug_type = !empty($get_id) ? 'text' : 'hidden';

$this->zea->addInput('slug', $slug_type);

$this->zea->addInput('image', 'upload');
$this->zea->setAccept('image', '.jpeg,.png,.jpg');

$this->zea->addInput('icon','text');

$this->zea->addInput('description', 'textarea');

$this->zea->addInput('publish', 'checkbox');
echo '<div class="row">';
?>

<div class="col-md-3">
  <?php
  if(!empty($get_id))
  {
    ?>
    <a href="<?php echo base_url('admin/menu/edit/?type=cat&type_id='.$get_id.'&t='.urlencode(encrypt(time()))) ?>"><button class="pull-right btn btn-default"><span><i class="fa fa-plus-circle"></i></span> add to menu</button></a>
    <?php
  }
  $this->zea->form();
  ?>
</div>
<?php
$form = new zea();

$form->setTable('content_cat', 'id', 'DESC');
$form->init('roll');
$form->setHeading('<a href="'.base_url('admin/content/category').'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> new category</button></a>');
$form->search();

$form->setField(array('title'));

$form->addInput('par_id','dropdown');
$form->setLabel('par_id','parent');
$form->tableOptions('par_id','content_cat','id','title');
$form->setAttribute('par_id','disabled');

$form->addInput('title','plaintext');

$form->addInput('id','link');
$form->setLink('id',base_url('admin/content/category/list'),'id');
// $form->setPlaintext('id','<button class="btn btn-default"><i class="fa fa-search"></i>  content</button>');
$form->setPlaintext('id','<i class="fa fa-search"></i>  content');
$form->setLabel('id','Content');

$form->addInput('image','thumbnail');
$form->setImage('image','content_cat');

$form->addInput('slug','link');
$form->setLabel('slug','add menu');
$form->setLink('slug',base_url('admin/menu/edit'),'slug');
$form->setExtLink('slug', '&type=cat&t='.urlencode(encrypt(time())));
$form->setPlaintext('slug','<i class="fa fa-plus-circle"></i>  add to menu');

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
echo '</div>';