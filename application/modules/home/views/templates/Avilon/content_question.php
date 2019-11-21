<?php
if(!empty($home['content_question']))
{
  $category = @$home['content_question'][0]['category'];
  ?>
  <section id="faq">
    <div class="container">
      <div class="section-header">
        <h3 class="section-title"><?php echo $category['title'] ?></h3>
        <span class="section-divider"></span>
        <p class="section-description"><?php echo @$category['description'] ?></p>
      </div>
      
      <ul id="faq-list" class="wow fadeInUp">
        <?php
        $i = 1;
        foreach($home['content_question'] AS $key => $value)
        {
          ?>
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq<?php echo $i;?>"><?php echo $value['title'] ?> <i class="ion-android-remove"></i></a>
            <div id="faq<?php echo $i;?>" class="collapse" data-parent="#faq-list">
              <p>
                <?php echo $value['description'] ?>
              </p>
            </div>
          </li>
          <?php
          $i++;
        }
        ?>
      </ul>
    </div>
  </section>
  <?php
}