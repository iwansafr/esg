<?php
$link = base_url($this->esg->get_esg('navigation')['string']);
$meta = $this->esg->get_esg('meta');

$module = '';
$description = @$meta['description'];
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
	if($module == 'content_tag')
	{
		$image = image_module($module,$meta['image'], 1);
	}else{
		$image = image_module($module,$meta);
	}
	$description = @$this->esg->get_esg('site')['title'];
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo @$meta['title'] ?> | <?php echo @$description ?></title>
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
<!-- Bootstrap core CSS -->
<link href="<?php echo $link_template;?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template -->
<link href="<?php echo $link_template;?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $link_template;?>/assets/css/style.css">




<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
  var _URL = '<?php echo base_url() ?>';
</script>
<?php $this->load->view('style') ?>
<link itemprop="thumbnailUrl" href="<?php echo $image ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo $image ?>"> </span>