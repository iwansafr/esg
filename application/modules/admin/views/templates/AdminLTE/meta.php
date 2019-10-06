<?php defined('BASEPATH') OR exit('No direct script access allowed');
$meta = $this->esg->get_esg('meta');
$template = $this->esg->get_esg('templates')['admin_template'];
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php echo $meta['title'] ?></title>
<meta name="description" content="<?php echo $meta['description'] ?>">
<meta name="keywords" content="<?php echo $meta['keyword'] ?>">
<meta name="developer" content="esoftgreat.com">
<meta name="author" content="esoftgreat">
<meta name="ROBOTS" content="all, index, follow">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo @$meta['icon']; ?>">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/bootstrap/css/bootstrap-tagsinput.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/font-awesome-5/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/dist/css/style.css">
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/assets/summernote/summernote.css">
<script src="<?php echo base_url().'templates/AdminLTE/assets/ckeditor/'; ?>ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo base_url('templates/'.$template); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php
echo $this->esg->extra_css();
?>
<script type="text/javascript">
	var _ID = <?php echo @intval($_GET['id'])?>;
</script>
<script type="text/javascript">
	var _URL = '<?php echo base_url() ?>';
</script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



<meta name="url" content="<?php echo base_url($this->esg->get_esg('navigation')['string']) ?>">
<meta name="og:title" content="<?php echo $meta['title'] ?>"/>
<meta name="og:type" content="site"/>
<meta name="og:url" content="<?php echo base_url($this->esg->get_esg('navigation')['string']) ?>"/>
<meta name="og:image" content="<?php echo @$meta['icon'] ?>"/>
<meta name="og:site_name" content="<?php echo $meta['title'] ?>"/>
<meta name="og:description" content="<?php echo $meta['description'] ?>"/>

<meta content="<?php echo @$meta['icon'] ?>" property="og:image"/>
<meta content="<?php echo $meta['title'] ?>" property="og:title"/>
<meta content="<?php echo $meta['description'] ?>" property="og:description"/>
<meta content="<?php echo @$meta['icon'] ?>" itemprop='url'/>

<link itemprop="thumbnailUrl" href="<?php echo @$meta['icon'] ?>">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="<?php echo @$meta['icon'] ?>"> </span>

