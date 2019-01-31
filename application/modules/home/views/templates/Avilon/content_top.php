<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_top']))
{
  $category = @$home['content_top'][0]['category'];
  ?>
  <section id="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-4">
          <div class="section-header wow fadeIn" data-wow-duration="1s">
            <a href="<?php echo content_cat_link(@$category['slug']) ?>"><h3 class="section-title"><?php echo $category['title'] ?></h3></a>
            <span class="section-divider"></span>
          </div>
        </div>
        <div class="col-lg-4 col-md-5 features-img">
          <?php $image = !empty($category['image']) ? $category['id'].'/'.$category['image'] : ''; ?>
          <img src="<?php echo image_module('content_cat', $image); ?>" alt="" class="wow fadeInLeft">
        </div>
        <div class="col-lg-8 col-md-7 ">
          <div class="row">
            <?php 
            $i = 0;
            foreach ($home['content_top'] as $key => $value) 
            {
              ?>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.<?php echo $i; ?>s">
                <div class="icon"><i class="fa <?php echo @$value['icon'] ?>"></i></div>
                <h4 class="title"><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'];?></a></h4>
                <p class="description"><?php echo $value['description'] ?></p>
              </div>
              <?php
              $i++;
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}