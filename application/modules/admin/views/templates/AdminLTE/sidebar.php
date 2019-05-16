<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo image_module('user', $user['id'].'/'.$user['image']) ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $user['username']?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <form action="<?php echo base_url('admin/search');?>" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="keyword" class="form-control" id="any_search" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <?php
    $menu = $this->esg->get_esg('sidebar_menu');
    if(!empty($menu))
    {
      foreach ($menu as $key => $value)
      {
        if(!empty($value['list']))
        {
          ?>
          <li class="treeview">
            <a href="#">
              <i class="fa <?php echo $value['icon'] ?>"></i> <span><?php echo $value['title'] ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php
              foreach ($value['list'] as $vkey => $vvalue)
              {
                ?>
                <li><a href="<?php echo base_url('admin'.$vvalue['link']) ?>"><i class="fa <?php echo $vvalue['icon'] ?>"></i> <?php echo $vvalue['title'] ?></a></li>
                <?php
              }?>
            </ul>
          </li>
          <?php
        }else{
          ?>
          <!-- <li class="treeview"> -->
          <li>
            <a href="<?php echo base_url('admin'.$value['link']) ?>">
              <i class="fa <?php echo $value['icon'] ?>"></i> <span><?php echo $value['title'] ?></span>
            </a>
          </li>
          <?php
        }
      }
    }
    ?>
  </ul>
</section>