<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($link_template))
{
	?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/magnific-popup.css" type="text/css" />
	<link href="<?php echo base_url();?>/templates/Avilon/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE'); ?>/assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $link_template;?>/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php
}else{
	msg('template not found');
}