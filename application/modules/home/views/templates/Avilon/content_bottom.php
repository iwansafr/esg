<?php 
if(!empty($home['content_bottom']))
{
  $category = @$home['content_bottom'][0]['category'];
  ?>
  <section id="more-features" class="section-bg">
    <div class="container">
      <div class="section-header">
        <a href="<?php echo content_cat_link(@$category['slug']) ?>"><h3 class="section-title"><?php echo $category['title'] ?></h3></a>
        <span class="section-divider"></span>
        <p class="section-description"><?php echo @$category['description'] ?></p>
      </div>
      <div class="row">
        <?php
        $i = 1;
        foreach ($home['content_bottom'] as $key => $value) 
        {
          $fade = ($i%2==0) ? 'Right':'Left';
          ?>
          <div class="col-lg-6">
            <div class="box wow fadeIn<?php echo $fade;?>">
              <div class="icon"><i class="fa <?php echo @$value['icon'] ?>"></i></div>
              <h4 class="title"><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h4>
              <p class="description"><?php echo $value['description'] ?></p>
            </div>
          </div>
          <?php 
          $i++;
        }
        ?>
      </div>
    </div>
  </section>
  <?php
}