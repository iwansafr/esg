<?php 
if(!empty($home['content_banner']))
{
  ?>
    <?php 
    $i = 0;
    foreach ($home['content_banner'] as $key => $value) 
    {
      if($i == 0)
      {
        ?>
        <style type="text/css">
          #call-to-action {
            overflow: hidden;
            background: linear-gradient(rgba(29, 200, 205, 0.65), rgba(29, 205, 89, 0.2)), url(<?php echo image_module('content', $value) ?>) fixed center center;
            background-size: cover;
            padding: 80px 0;
          }
        </style>
        <?php
      }?>
      <section id="call-to-action">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title"><?php echo $value['title'] ?></h3>
              <p class="cta-text"> <?php echo $value['description'] ?></p>
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
              <a class="cta-btn align-middle" href="<?php echo content_link($value['slug']) ?>">See Detail</a>
            </div>
          </div>
        </div>
      </section>
      <?php
      $i++;
    }
    ?>
  <?php
}