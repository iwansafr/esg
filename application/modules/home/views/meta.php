<?php
$this->esg->check_cache();
if(!empty($site['use_cache']))
{
	$this->output->cache(60);
}
$link = $navigation['string'];

$module = '';
if(!empty($navigation['array'][1]))
{
	if($navigation['array'][0] == 'tag')
	{
		$module = 'content_tag';
	}else{
		$module = 'content_cat';
	}
}else{
	$module = 'content';
}
if($mod['content'] == 'home/index')
{
	$image = image_module('config/site', @$meta['icon']);
}else{
	if($module == 'content_tag')
	{
		$image = image_module($module,$meta['image'], 1);
	}else{
		$image = image_module($module,$meta);
	}
}
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo @$meta['title'] ?> - <?php echo @$meta['description'] ?></title>
<link rel="icon" href="<?php echo $image ?>">

<meta name="description" content="<?php echo @$meta['description'] ?>">
<meta name="keywords" content="<?php echo @$meta['keyword'] ?> | esoftgreat">
<meta name="developer" content="esoftgreat">
<meta name="author" content="admin">
<meta name="ROBOTS" content="all, index, follow">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $image; ?>">

<meta name="url" content="<?php echo $link ?>">
<meta name="og:title" content="<?php echo $meta['title'] ?>"/>
<meta name="og:type" content="site"/>
<meta name="og:url" content="<?php echo $link ?>"/>
<meta name="og:image" content="<?php echo $image ?>"/>
<meta name="og:site_name" content="<?php echo $meta['title'] ?>"/>
<meta name="og:description" content="<?php echo $meta['description'] ?>"/>
<meta content="<?php echo $image ?>" property="og:image"/>
<meta content="<?php echo $meta['title'] ?>" property="og:title"/>
<meta content="<?php echo $meta['description'] ?>" property="og:description"/>
<meta content="<?php echo $image ?>" itemprop='url'/>
<link href="<?php echo $image; ?>" rel="icon">
<link href="<?php echo $image; ?>" rel="apple-touch-icon">
<?php
$this->load->view('templates'.DIRECTORY_SEPARATOR.$templates['public_template'].DIRECTORY_SEPARATOR.'meta');
?>
<script type="text/javascript">
  var _URL = '<?php echo base_url() ?>';
</script>
<?php $this->load->view('style') ?>
<link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE') ?>/assets/dist/css/style.css">
<link itemprop="thumbnailUrl" href="<?php echo $image ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo $image ?>"> </span>