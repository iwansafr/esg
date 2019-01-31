<?php
if(!empty($home['content_brand']))
{
  ?>
  <section id="clients">
    <div class="container">
      <div class="row wow fadeInUp">
        <?php
        foreach ($home['content_brand'] as $key => $value) 
        {
          ?>
          <div class="col-md-4">
            <!-- <img src="<?php echo image_module('content', $value['id'].'/'.$value['image'], $value['image_link']) ?>" alt=""> -->
            <img src="<?php echo image_module('content', $value) ?>" alt="">
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
  <?php
}