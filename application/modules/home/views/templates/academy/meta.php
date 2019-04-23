<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title -->
<title><?php echo @$meta['title'] ?> - <?php echo @$description ?></title>

<!-- Favicon -->
<link rel="icon" href="<?php echo $image ?>">

<!-- Core Stylesheet -->
<link rel="stylesheet" href="<?php echo $link_template?>/style.css">

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