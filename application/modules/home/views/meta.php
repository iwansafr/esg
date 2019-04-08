<?php
$this->esg->check_cache();
if(!empty($site['use_cache']))
{
	$this->output->cache(60);
}
$data['link'] = $navigation['string'];
$ata['meta'] = $meta;
if(@$_SERVER['SERVER_NAME'] == 'localhost')
{
	$data['link_template'] = base_url().'templates/'.$templates['public_template'];
}else{
	$data['link_template'] = 'https://templates.esoftgreat.com/'.$templates['public_template'];
}

$data['module'] = '';
$data['description'] = @$meta['description'];
if(!empty($navigation['array'][1]))
{
	if($navigation['array'][0] == 'tag')
	{
		$data['module'] = 'content_tag';
	}else{
		$data['module'] = 'content_cat';
	}
}else{
	$data['module'] = 'content';
}
if($mod['content'] == 'home/index')
{
	$data['image'] = image_module('config/site', $meta['icon']);
}else{
	if($data['module'] == 'content_tag')
	{
		$data['image'] = image_module($data['module'],$meta['image'], 1);
	}else{
		$data['image'] = image_module($data['module'],$meta);
	}
	$data['description'] = @$site['title'];
}
$this->load->view('templates'.DIRECTORY_SEPARATOR.$templates['public_template'].DIRECTORY_SEPARATOR.'meta', $data);
?>
<script type="text/javascript">
  var _URL = '<?php echo base_url() ?>';
</script>
<?php $this->load->view('style') ?>
<link itemprop="thumbnailUrl" href="<?php echo $data['image'] ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo $data['image'] ?>"> </span>