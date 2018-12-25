<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($home['menu_bottom']))
{
	?>
	<nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
	  <a href="#intro" class="scrollto">Home</a>
	  <a href="#about" class="scrollto">About</a>
	  <a href="#">Privacy Policy</a>
	  <a href="#">Terms of Use</a>
		<?php
    foreach ($home['menu_bottom'] as $key => $value)
    {
      ?>
      <a href="<?php echo menu_link($value['link']) ?>"><?php echo $value['title'] ?></a>
      <?php
    }
    ?>
	</nav>
	<?php
}