<?php
if(!empty($home['content_slider']))
{
  $category = @$home['content_slider'][0]['category'];
  ?>
  <div id="slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
      foreach ($home['content_slider'] as $key => $value)
      {
        echo '<li data-target="#slider" data-slide-to="'.$value['id'].'" ></li>';
      }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php
      $i = 1;
      foreach ($home['content_slider'] as $key => $value)
      {
        $class = ($i == 1) ? 'active' : '';
        ?>
        <div class="carousel-item <?php echo $class ?>">
          <img class="slider d-block w-100" src="<?php echo image_module('content', $value) ?>" alt="Slide" >
          <div class="carousel-caption">
            <a href="<?php echo content_link($value['slug']) ?>" class="white"><h4><?php echo $value['title'] ?></h4></a>
            <p class="sm-title white d-none d-md-block">posted by <?php echo $value['author'] ?> | <?php echo content_date($value['created']) ?> | <?php echo @$category['title'] ?></p>
          </div>
        </div>
        <?php
        $i++;
      }
      ?>

    </div>
    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php
}