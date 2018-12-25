<?php
$link = base_url($this->esg->get_esg('navigation')['string']);
$meta = $this->esg->get_esg('meta');
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
	$image = image_module('config/site', $meta['icon']);
}else{
	$image = image_module($module, $meta);
}
?>
<meta charset="utf-8">
<title><?php echo @$meta['title'] ?> | <?php echo @$meta['description'] ?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
<link href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>lib/animate/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">

<link href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>css/style.css" rel="stylesheet">

<script type="text/javascript">
  var _URL = '<?php echo base_url() ?>';
</script>

<link itemprop="thumbnailUrl" href="<?php echo $image ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo $image ?>"> </span>