<?php
?>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#">Hot News</a>
  </li>
  <?php
  if(!empty($home['content_hot']))
  {
  	foreach ($home['content_hot'] as $key => $value)
  	{
  		?>
		  <li class="nav-item">
		  	<marquee><a class="nav-link" href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></marquee>
		  </li>
  		<?php
      break;
  	}
  }
  ?>
</ul>