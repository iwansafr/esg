<div class="row">
  <?php if (!empty($home['content_facilities'])): ?>
    <div class="col-md-8">
      <?php if (!empty($home['content_facilities'])): ?>
        <center>
          <?php if (!empty($home['content_facilities']['0']['category']['title'])): ?>
            <div class="fancy-title title-dotted-border">
              <h4 style="text-align: center;"><?php echo $home['content_facilities'][0]['category']['title'] ?></h4>
            </div>
          <?php endif ?>
        </center>
        <div class="fslider" data-easing="easeInQuad">
          <div class="flexslider">
            <div class="slider-wrap">
              <?php foreach ($home['content_facilities'] as $key => $value): ?>
                <div class="slide" data-thumb="<?php echo image_module('content',$value) ?>">
                  <a href="<?php echo content_link($value['slug']) ?>">
                    <img src="<?php echo image_module('content',$value) ?>" alt="<?php echo $value['title'] ?>" style="object-fit: cover; height: 250px;">
                    <div class="flex-caption slider-caption-bg"><?php echo $value['title'] ?></div>
                  </a>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
    <div class="col-md-4">
      <?php $this->load->view('content_contact') ?>
    </div>
  <?php endif ?>
</div>