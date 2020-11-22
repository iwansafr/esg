<?php defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->input->get('id');
$success_changed_id = false;
if(!empty($_POST['id']) && $id != $_POST['id'])
{
	$exist = $this->db->get_where('content',['id'=>$_POST['id']])->row_array();
	if(!empty($exist))
	{
		msg('id is exist','danger');
		die();
	}else{
		$success_changed_id = true;
	}
	// pr($_POST);
	// $id = $_POST['id'];
	// redirect(base_url('admin/content/edit/?id='.$id));
}
$this->zea->init('edit');
$this->zea->setTable('content');

$this->zea->setId($id);

$this->zea->setHeading('Content');

$this->zea->addInput('cat_ids','multiselect');
$this->zea->setLabel('cat_ids', 'Category');
$this->zea->setMultiSelect('cat_ids','content_cat','id,par_id,title');
$cat_id = @intval($_GET['cat_id']);
if(!empty($cat_id))
{
	$this->zea->setSelected('cat_ids',$cat_id);
}

if(is_root())
{
	$this->zea->addInput('id','text');
	$this->zea->setType('id','number');
}
$this->zea->addInput('title', 'text');

$this->zea->addInput('author','static');
$this->zea->setValue('author',$this->session->userdata[base_url().'_logged_in']['username']);

$this->zea->addInput('image','upload');
$this->zea->setAccept('image', '.jpg,.jpeg,.png');

$this->zea->addInput('image_link','text');
$this->zea->setImage('image_link', 'content',' image_link');
$this->zea->addInput('icon','text');
$this->zea->startCollapse('image', 'Image Properties');
$this->zea->endCollapse('icon');
$this->zea->setCollapse('image',TRUE);

$this->zea->addInput('images','gallery');
$this->zea->setAccept('images', '.jpg,.jpeg,.png');
$this->zea->setAttribute('images','multiple');
$this->zea->addInput('videos','textarea');
$this->zea->setHelp('videos','pisah link youtube dengan (,) (koma) jika link lebih dari satu');
$this->zea->addInput('document','uploads');
$this->zea->setAccept('document', '.doc,.docx,.xls,.xlsx,.pdf,.ppt,.pptx');
$this->zea->setAttribute('document','multiple');
$this->zea->startCollapse('images', 'Gallery');
$this->zea->endCollapse('document');
$this->zea->setCollapse('images',TRUE);

$this->zea->addInput('keyword','textarea');
$this->zea->setLabel('keyword','Meta Keyword');

$slug_type = !empty($id) ? 'text' : 'static';

$this->zea->addInput('slug', $slug_type);

$this->zea->addInput('description','textarea');
$this->zea->setLabel('description','Meta Description');
$this->zea->addInput('intro','textarea');
$this->zea->addInput('par_id','dropdown');
$this->zea->setLabel('par_id','parent');
if(!empty($id))
{
	$this->zea->tableOptions('par_id','content','id','title',' par_id = 0 AND id != '.$id);
}else{
	$this->zea->tableOptions('par_id','content','id','title',' par_id = 0');
}
$active_template = $this->esg->get_esg('templates')['public_template'];
$tpl_options = ['0'=>'None'];
foreach(glob(FCPATH.'application/modules/home/views/templates/'.$active_template.'/content/detail_*.php') as $file)
{
	$file = explode('/',$file);
	$file = end($file);
	$file = str_replace('.php', '', $file);
	$tpl_options[$file] = $file;
}
if(!empty($tpl_options))
{
	$this->zea->addInput('tpl','dropdown');
	$this->zea->setOptions('tpl',$tpl_options);
}
$this->zea->addInput('source','textarea');
$this->zea->setAttribute('source',['style'=>'background: black;color:white;','placeholder'=>'<p>your script</p>']);
$this->zea->startCollapse('keyword', 'meta');
$this->zea->endCollapse('source');
$this->zea->setCollapse('keyword',TRUE);


$this->zea->addInput('content','textarea');
// $this->zea->setElementId('content','textckesditor');
$this->zea->setElementId('content','summernote');
$this->zea->setRequired(array('title','content','cat_ids'));


$this->zea->addInput('tag_ids', 'text');
$this->zea->setLabel('tag_ids', 'Tag : ');
$this->zea->setAttribute('tag_ids', array('data-role'=>'tagsinput','placeholder'=>'separate with coma'));
$this->zea->startCollapse('tag_ids', 'Tag');
$this->zea->endCollapse('tag_ids');
$this->zea->setCollapse('tag_ids', TRUE);
if(!empty($id))
{
  $this->zea->setValue('tag_ids', $tag_name);
}

$this->zea->addInput('publish','checkbox');


$this->zea->form();
if($success_changed_id)
{
	redirect(base_url('admin/content/edit?id='.$_POST['id']));
}