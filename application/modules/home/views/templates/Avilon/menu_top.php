<?php 
if($mod['content'] != 'home/index')
{
  ?>
  <style type="text/css">
    #header{
      background: linear-gradient(45deg, rgba(29, 224, 153, 0.8), rgba(29, 200, 205, 0.8));
    }
  </style>
  <?php
}?>

<div id="logo" class="pull-left">
  <a href="<?php echo base_url() ?>"><img src="<?php echo image_module('config/logo', @$logo['image']) ?>" class="img-responsive" style="max-width: <?php echo @$logo['width'] ?>px;"></a>
</div>
<nav id="nav-menu-container">
  <?php
  if(!empty($home['menu_top']))
  {
    ?>
    <ul class="nav-menu">
      <?php
      foreach ($home['menu_top'] as $key => $value)
      {
        if(empty($value['child']))
        {
          ?>
          <li>
            <a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a>
          </li>
          <?php
        }else{
          ?>
          <li class="menu-has-children">
            <a href="#">
              <?php echo @$value['title'] ?>
            </a>
            <ul>
              <?php
              foreach ($value['child'] as $ckey => $cvalue)
              {
                if(empty($cvalue['child']))
                {
                  ?>
                  <li>
                    <a href="<?php echo menu_link($cvalue['link']) ?>"><?php echo $cvalue['title'] ?></a>
                  </li>
                  <?php
                }else{
                  ?>
                  <li class="menu-has-children">
                    <a href="#">
                      <?php echo @$cvalue['title'] ?>
                    </a>
                    <ul>
                      <?php
                      foreach ($cvalue['child'] as $cckey => $ccvalue)
                      {
                        ?>
                        <li><a href="<?php echo menu_link($ccvalue['link']) ?>"><?php echo @$ccvalue['title'] ?></a></li>
                        <?php
                      }
                      ?>
                    </ul>
                  </li>
                  <?php
                }
              }
              ?>
            </ul>
          </li>
          <?php
        }
      }
      ?>
    </ul>
    <?php
  }
  ?>
</nav>