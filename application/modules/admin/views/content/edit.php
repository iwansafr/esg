<?php defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->input->get('id');

$this->zea->init('edit');
$this->zea->setTable('content');

$this->zea->setId($id);

$this->zea->setHeading('Content');

$this->zea->addInput('cat_ids','multiselect');
$this->zea->setLabel('cat_ids', 'Category');
$this->zea->setMultiSelect('cat_ids','content_cat','id,par_id,title');


$this->zea->addInput('title', 'text');

$this->zea->addInput('author','hidden');
$this->zea->setValue('author',$this->session->userdata[base_url().'_logged_in']['username']);

$this->zea->addInput('image','upload');
$this->zea->setAccept('image', '.jpg,.jpeg,.png');

$this->zea->addInput('image_link','text');
$this->zea->addInput('icon','text');
$this->zea->startCollapse('image_link', 'Image Link');
$this->zea->endCollapse('icon');
$this->zea->setCollapse('image_link',TRUE);

$this->zea->addInput('images','gallery');
$this->zea->setAccept('images', '.jpg,.jpeg,.png');
$this->zea->setAttribute('images','multiple');
$this->zea->startCollapse('images', 'Gallery');
$this->zea->endCollapse('images');
$this->zea->setCollapse('images',TRUE);


$this->zea->addInput('keyword','textarea');
$this->zea->setLabel('keyword','Meta Keyword');

$slug_type = !empty($id) ? 'text' : 'hidden';

$this->zea->addInput('slug', $slug_type);

$this->zea->addInput('description','textarea');
$this->zea->setLabel('description','Meta Description');
$this->zea->startCollapse('keyword', 'meta');
$this->zea->endCollapse('description');
$this->zea->setCollapse('keyword',TRUE);

$this->zea->addInput('intro','textarea');

$this->zea->addInput('content','textarea');
$this->zea->setElementId('content','textckeditor');
$this->zea->setRequired(array('title','content','cat_ids'));


$this->zea->addInput('tag_ids', 'text');
$this->zea->setLabel('tag_ids', 'Tag : ');
$this->zea->setAttribute('tag_ids', array('data-role'=>'tagsinput','placeholder'=>'separate with coma'));
$this->zea->startCollapse('tag_ids', 'Tag');
$this->zea->endCollapse('tag_ids');
if(!empty($id))
{
  $this->zea->setValue('tag_ids', $tag_name);
}

$this->zea->addInput('publish','checkbox');

$this->zea->form();