<!DOCTYPE html>
<html>
<head>
  <?php
  $user = $this->session->userdata(base_url().'_logged_in');
  $this->load->view('templates/'.$admin_template.'/meta');
  ?>
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('header', compact('user',$user)); ?>
  <aside class="main-sidebar">
    <?php $this->load->view('sidebar', compact('user',$user));?>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <?php $this->load->view('navigation') ?>
    </section>
    <section class="content">
      <?php
      // $content = $this->esg_model->esg_data['navigation']['string'];
      // $content = $content == 'admin' ? 'home' : $content;
      $mod['name'] = $this->router->fetch_class();
      $mod['task'] = $this->router->fetch_method();
      $content  = $mod['name'].'/'.$mod['task'];
      $content = $content == 'admin/index' ? 'templates'.DIRECTORY_SEPARATOR.$admin_template.DIRECTORY_SEPARATOR.'home' :$content;
      $this->load->view($content);
      ?>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2015-<?php echo date('Y'); ?> <a href="https://www.esoftgreat.com">esoftgreat</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        
      </div>
      <div class="tab-pane active" id="control-sidebar-settings-tab">
        <form method="post">
          <?php $this->load->view('config/templates') ?>
        </form>
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('js') ?>
</body>
</html>
