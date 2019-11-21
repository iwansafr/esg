<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php 
  $title = !empty($msg) ? $msg : '404 page not found';
  ?>
  <title>esoftgreat | <?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/')?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/')?>font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/') ?>dist/css/AdminLTE.min.css">

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('images/icon.png'); ?>">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background: black;">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url('images/logo.png') ?>" height="50">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background: black;">
    <h1><?php echo $title ?></h1>
    <center>
      <a href="<?php echo base_url() ?>"><button class="btn btn-bg btn-warning"> <i class="fa fa-home"></i> back to home</button></a>
    </center>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
