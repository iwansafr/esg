<?php 
$table = array('content_cat'=>'category','content_tag'=>'tag','content'=>'article','content'=>'article');
if(!empty($home['widget_right']))
{
  pr($home['widget_right']);
  ?>
  <div class="card my-3">
    <div class="card-header main-color">
    	<?php echo $table[$home['widget_right']['table']] ?>
    </div>
    <ul class="list-group list-group-flush">
      <?php foreach ($home['widget_right'] as $key => $value): ?>
        <li class="list-group-item">
    			<a class="<?php echo content_type_link($home['widget_right']['table'], $value) ?>" href=""><?php echo $value ?></a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
  <?php
}