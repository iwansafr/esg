<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light menu" style="background-color: #263238!important;">
  <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo image_module('config/logo', @$logo['image']) ?>" class="img-responsive" width="<?php echo $logo['width'] ?>"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
    if(!empty($home['menu_top']))
    {
      ?>
      <ul class="navbar-nav mr-auto">
        <?php
        foreach ($home['menu_top'] as $key => $value)
        {
          if(empty($value['child']))
          {
            ?>
            <li class="nav-item">
              <a href="<?php echo menu_link($value['link']) ?>" class="nav-link"><?php echo $value['title'] ?></a>
            </li>
            <?php
          }else{
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_<?php echo $value['id'];?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $value['title'] ?>
              </a>
              <div class="dropdown-menu" aria-laveledby="navbarDropdown_<?php echo $value['id'];?>">
                <?php
                foreach ($value['child'] as $ckey => $cvalue)
                {
                  ?>
                  <a href="<?php echo menu_link($cvalue['link']) ?>" class="dropdown-item"><?php echo $cvalue['title'] ?></a>
                  <?php
                }
                ?>
              </div>
            </li>
            <?php
          }
        }
        ?>
      </ul>
      <?php
    }
    ?>
    <form action="<?php echo base_url('search') ?>" method="get">
      <div class="input-group input-group-sm">
        <input type="text" name="keyword" class="form-control pull-right" placeholder="Search" value="">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
		</form>
  </div>
</nav>