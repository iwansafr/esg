<?php
if(!empty($home['content_video']))
{
  $category = @$home['content_video'][0]['category'];
  ?>
  <section id="team" class="section-bg">
    <div class="container">
      <div class="section-header">
        <h3 class="section-title"><?php echo $category['title'] ?></h3>
        <span class="section-divider"></span>
        <p class="section-description"><?php echo @$category['description'] ?></p>
      </div>
      <div class="row wow fadeInUp">
        <?php
        foreach($home['content_video'] AS $key => $value)
        {
          $image_src = image_module('content', $value);
          ?>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <div class="image">
                  <a href="#team">
                    <img src="<?php echo $image_src; ?>" class="img-responsive image-thumbnail image" style="object-fit: cover; width: 255px;height: 255px;" data-toggle="modal" data-target="#img_<?php echo $value['id']?>">
                  </a>
                </div>

                <div class="modal fade" id="img_<?php echo $value['id']?>" tabindex="-1" role="dialog" aria-labelledby="img_<?php echo $value['id']?>">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="img_title_<?php echo $value['id']?>"><?php echo $value['title'];?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body" style="text-align: center;">
                        <?php echo $value['content'] ?>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h4><?php echo $value['title'] ?></h4>
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