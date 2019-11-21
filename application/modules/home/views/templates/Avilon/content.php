<?php 
if(!empty($home['content']))
{
  $i = 1;
  foreach ($home['content'] as $key => $value) 
  {
    $bg = ($i%2==0) ? '':'section-bg';
    $position = ($i%2==0) ? 'left':'right';
    $fade = ($i%2==0) ? 'Right':'Left';
    ?>
    <section id="advanced-features">
      <div class="features-row <?php echo $bg; ?>">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-<?php echo $position;?> wow fadeIn<?php echo ucfirst($position)?>" src="<?php echo image_module('content', $value);?>" alt="">
              <div class="wow fadeIn<?php echo $fade;?>">
                <a href="<?php echo content_link($value['slug']) ?>"><h2><?php echo $value['title'] ?></h2></a>
                <?php echo $value['content'] ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
    $i++;    
  }
}