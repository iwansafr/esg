<?php 
if(!empty($home['content_team']))
{
  $category = @$home['content_team'][0]['category'];
  ?>
  <div class="container">
    <div class="section-header">
      <h3 class="section-title"><?php echo $category['title'] ?></h3>
      <span class="section-divider"></span>
      <p class="section-description"><?php echo @$category['description'] ?></p>
    </div>
    <div class="row wow fadeInUp">
      <?php
      foreach($home['content_team'] AS $key => $value)
      {
        ?>
        <div class="col-lg-3 col-md-6">
          <div class="member">
            <div class="pic"><img src="<?php echo image_module('content', $value);?>" alt=""></div>
            <h4><?php echo $value['title'] ?></h4>
            <?php 
            echo html_entity_decode($value['content']);
            ?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>

  </div>
  <?php
}