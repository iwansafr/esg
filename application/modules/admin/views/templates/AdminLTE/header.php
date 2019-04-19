<?php defined('BASEPATH') OR exit('No direct script access allowed');
$message = $this->esg->get_esg('message');
?>
<header class="main-header">
  <a href="<?php echo base_url('admin') ?>" class="logo">
    <span class="logo-mini"><img src="<?php echo image_module('config', 'site/'.@$this->esg->get_esg('site')['site']['image']); ?>" height="50"></span>
    <span class="logo-lg"><img src="<?php echo image_module('config', 'logo/'.@$this->esg->get_esg('site')['logo']['image']); ?>" height="40"></span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <span class="label label-success"><?php echo !empty(@intval($message['total'])) ? $message['total'] : '';?></span>
          </a>
          <ul class="dropdown-menu">
            <?php if (@intval($message['total']) > 0): ?>
              <li class="header">You have <?php echo $message['total'] ?> messages</li>
              <li>
            <?php else: ?>
              <li class="header">you dont have new message</li>
            <?php endif ?>
            <?php if (!empty($message['list'])): ?>
              <ul class="menu">
                <?php foreach ($message['list'] as $l_key => $l_value): ?>
                  <li>
                    <a href="<?php echo base_url('admin/message/detail/'.$l_value['id']) ?>">
                      <div class="pull-left">
                        <img src="<?php echo $meta['icon'] ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $l_value['name'] ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $l_value['created'] ?></small>
                      </h4>
                      <p><?php echo $l_value['subject'] ?></p>
                    </a>
                  </li>
                <?php endforeach ?>
              </ul>
            <?php endif ?>
            </li>
            <li class="footer"><a href="<?php echo base_url('admin/message') ?>">See All Messages</a></li>
          </ul>
        </li>
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You dont have notifications</li>
            <li>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag"></i>
          </a>
          <ul class="dropdown-menu">
            <li class="header">you dont have task</li>
            <li>
            </li>
            <li class="footer">
              <a href="#">View all tasks</a>
            </li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo image_module('user', $user['id'].'/'.$user['image']) ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['username'] ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo image_module('user', $user['id'].'/'.$user['image']) ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $user['username'] ?> - <?php echo $user['role'] ?>
                <small>Member since <?php echo content_date($user['created']) ?></small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url('admin/user/edit/?id='.$user['id']) ?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-cogs"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>