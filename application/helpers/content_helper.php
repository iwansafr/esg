<?php defined('BASEPATH') OR exit('No direct script access allowed');
function content_link($id = '', $title = '')
{
  $output = base_url($id);
  if(!empty($id) && is_numeric($id))
  {
    $output = base_url('content/'.$id.'/').url_title($title).'.html';
  }else if(!empty($id) && !is_numeric($id))
  {
    $output = base_url($id).'.html';
  }
  return $output;
}

function content_cat_link($id = '', $title = '', $spc = '')
{
	$output = base_url();
  if(!empty($id) && is_numeric($id))
  {
    $output = base_url('content/category/'.$id.'/').url_title($title).'.html';
  }else if(!empty($id) && !is_numeric($id)){
    $output = base_url('category/'.$id).'.html';
  }else{
    $output = base_url('content').'/'.$spc;
  }
  return $output;
}

function content_tag_link($id = '', $title = '')
{
  $output = base_url();
  if(!empty($id) && is_numeric($id))
  {
    $output = base_url('content/tag/'.$id.'/').url_title($title).'.html';
  }else if(!empty($id) && !is_numeric($id)){
    $output = base_url('tag/'.url_title($id)).'.html';
  }
  return $output;
}

function content_type_link($table = 'content', $value = array())
{
  switch($table)
  {
    case 'content_cat':
      $link = content_cat_link($value['slug']);
    break;
    case 'content_tag':
      $link = content_tag_link($value['title']);
    break;
    default:
      $link = content_link($value['slug']);
    break;
  }
  return $link;
}