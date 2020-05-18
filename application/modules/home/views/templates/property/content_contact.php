<?php if (!empty($home['content_contact'])): ?>
  <center>
    <?php if (!empty($home['content_contact']['0']['category']['title'])): ?>
      <div class="fancy-title title-dotted-border">
        <h4 style="text-align: center;"><?php echo $home['content_contact'][0]['category']['title'] ?></h4>
      </div>
    <?php endif ?>
    <?php if (!empty($home['content_contact'])): ?>
      <?php foreach ($home['content_contact'] as $key => $value): ?>
        <img src="<?php echo image_module('content',$value) ?>">
        <?php echo $value['content'] ?>
      <?php endforeach ?>
    <?php endif ?>
  </center>
<?php endif ?>