<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_top']))
{
  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-4">
        <div class="section-header wow fadeIn" data-wow-duration="1s">
          <h3 class="section-title">Featured</h3>
          <span class="section-divider"></span>
        </div>
      </div>
      <div class="col-lg-4 col-md-5 features-img">
        <img src="<?php echo image_module('content'); ?>" alt="" class="wow fadeInLeft">
      </div>
      <div class="col-lg-8 col-md-7 ">
        <div class="row">
          <?php 
          foreach ($home['content_top'] as $key => $value) 
          {
            ?>
            <div class="col-lg-6 col-md-6 box wow fadeInRight">
              <div class="icon"><i class="fa <?php echo $value['icon'] ?>"></i></div>
              <h4 class="title"><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'];?></a></h4>
              <p class="description"><?php echo $value['description'] ?></p>
            </div>
            <?php
          }
          ?>
          <div class="col-lg-6 col-md-6 box wow fadeInRight">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident clarida perendo.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
            <div class="icon"><i class="ion-ios-flask-outline"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata noble dynala mark.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
            <div class="icon"><i class="ion-social-buffer-outline"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur teleca starter sinode park ledo.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum dinoun trade capsule.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php
}