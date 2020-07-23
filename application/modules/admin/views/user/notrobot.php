<!DOCTYPE html>
<html>
<head>
  <?php $site = $this->esg->get_esg('site');?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo @$site['site']['title'] ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/')?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/')?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/')?>Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/') ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('templates/AdminLTE/assets/') ?>iCheck/square/blue.css">

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
<body class="hold-transition login-page" style="background: #d2d6de;">
  <?php
  $msg  = $this->esg->get_esg('msg');
  $data = $this->input->post();
  ?>
<div class="login-box">
  <div class="login-logo">
    <?php 
    if(@$site['logo']['display'] == 'title')
    {
      echo '<h1>'.@$site['logo']['title'].'</h1>';
    }else{
      ?>
      <img src="<?php echo image_module('config','logo/'.$site['logo']['image']) ?>" height="50">
      <?php
    }
    ?>

  </div>
  <div class="login-box-body" style="background: #929090; color: white;">
    <h1>
      <label for="" id="label1"></label> + <label for="" id="label2"></label> = 
    </h1>
    <div class="form-group has-feedback">
      <input id="hasil" type="number" name="hasil" class="form-control" placeholder="hasil" required>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('templates/AdminLTE/assets/')?>jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('templates/AdminLTE/assets/')?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('templates/AdminLTE/assets/') ?>iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  window.onload = function() {
    var input = document.getElementById("hasil").focus();
  };
  function reset(){
    $('#label1').html(Math.floor(Math.random() * 11));
    $('#label2').html(Math.floor(Math.random() * 11));
    $('#hasil').val("");
  }
  reset();
  $('#submit').on('click',function(e){
    var a = parseInt($('#label1').html());
    var b = parseInt($('#label2').html());
    var c = parseInt($('#hasil').val());
    console.log(a);
    console.log(b);
    console.log(c);
    console.log(a+b);
    if(c == a+b){
      alert('Selamat Anda Benar');
      window.location.href="<?php echo base_url('admin/logout');?>";
    }else{
      alert('jawaban anda salah, coba lagi');
      reset();
    }
  });
</script>
</body>
</html>
