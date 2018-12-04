<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light menu">
  <a class="navbar-brand" href=""><img src="<?php echo image_module('config/logo', @$logo['image']) ?>" class="img-responsive" width="<?php echo $logo['width'] ?>"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
    if(!empty($home['menu_top']))
    {
      ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            MenuS
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="list.php">List</a>
            <a class="dropdown-item" href="list-grid.php">List Grid</a>
            <a class="dropdown-item" href="single.php">Single</a>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="">Disabled</a>
        </li>
      </ul>
      <!-- <ul class="navbar-nav mr-auto"> -->
        <?php
        // menu($home['menu_top'], 'nav-item')
        ?>
      <!-- </ul> -->
      <?php
    }
    ?>
    <form action="" method="get">
      <div class="input-group input-group-sm">
        <input type="text" name="keyword" class="form-control pull-right" placeholder="Search" value="">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
		</form>
  </div>
</nav>