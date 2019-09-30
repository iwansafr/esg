<?php
if(!empty($home['content_photo']))
{
  $category = @$home['content_photo'][0]['category'];
  ?>
  <section id="gallery">
    <div class="container-fluid">
      <div class="section-header">
        <h3 class="section-title"><?php echo $category['title'] ?></h3>
        <span class="section-divider"></span>
        <p class="section-description"><?php echo @$category['description'] ?></p>
      </div>
      <div class="row no-gutters">
        <?php
        foreach($home['content_photo'] AS $key => $value)
        {
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo image_module('content', $value);?>" class="gallery-popup">
                <img src="<?php echo image_module('content', $value);?>" alt="<?php echo $value['title'] ?>">
              </a>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
  <?php 
}